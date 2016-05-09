<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use App\Cour;
use App\Auteur;
use App\User;
use Illuminate\Support\Facades\Redirect ;


use App\Http\Requests;

class ThemeController extends Controller
{
    protected $model_theme;

    public function __construct(Theme $theme)
    {
        $this->model_theme = $theme;
    }

    public function inserer(Request $request,$admin_id)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $url_img = $request->input('url_img');
        $this->model_theme->inserer($name, $description, $url_img);
        $msg = "le théme $name a bien été ajouté au catalogue de théme";
        return \Redirect::route('lister_themes', $admin_id)->with('msg_modif', $msg);
    }


    public function lister_cours($name)
    {
        $theme_id = Theme::where('name', $name)->first(array('id'));  // il faut déterminer l'id fu themes pour ensuite
        $liste_cours = Theme::find($theme_id['id'])->cours;// pouvoir extraire les cours qui lui sont associés
        // ajout du nom de l'auteur a l'objet cours
        foreach ($liste_cours as $cour) {
            /*     $cour_id = Cour::where('name',$cour->name)->first(array('id')) ;
                 $cour= Cour::find($cour_id['id']) ; */
            $auteur_name = $cour->auteur->name;
            $cour->auteur_name = $auteur_name;
        }
        return view('cours.lister_cours', ['li_cours' => $liste_cours, 'nom_theme' => $name]);
    }

    public function lister($id)
    {
        $temp = $this->model_theme->lister();
        $taille = count($temp);
        $i = 0;
        $nb_tour = 0;
        $max = 3;
        $liste_themes = [];
        $user = User::find($id);
        $liste_id = [];
        foreach ($user->themes as $theme) {
            for ($k = 0; $k < $taille; $k++) {

                if ($theme->getId() == $temp[$k]->getId()) {
                    array_push($liste_id, $theme->getId());
                }
            }
        }

            while ($i < count($temp)) {
                $liste_themes_inter = [];
                if (($i % 3 == 0) && ($i != 0)) { // pour organiser les themes en colonnes de 3 dans la vue
                    $nb_tour++;
                    $max = 3 + $nb_tour * 3;
                }

                if ($max > $taille) { // pour ne pas depasser la taille du tableau
                    $max = $taille;
                }

                for ($j = $i; $j < $max; $j++) {
                    array_push($liste_themes_inter, $temp[$j]);

                }

                array_push($liste_themes, $liste_themes_inter);
                $i += 3;
            }

            return view('theme.lister_theme', ['li_themes' => $liste_themes, "liste_id" => $liste_id]);
        }

        public
        function extraire($id)
        {
            $this->model_theme = $this->model_theme->extract_by_id($id);
            return view("theme.editer_theme", ['theme' => $this->model_theme]);

        }

        public function update(Request $request, $id,$admin_id)
        {
            $this->model_theme = $this->model_theme->extract_by_id($id);
            $name = $request->input('name');
            $description = $request->input('description');
            $url_img = $request->input('url_img');
            $this->model_theme->modifier($name, $description, $url_img);
            $msg = "le théme $name a bien été modifié ";
         //   return redirect('/theme/lister')->with('msg_modif', $msg);
            return \Redirect::route('lister_themes', $admin_id)->with('msg_modif', $msg);
           
        }

        public
        function liste_home()
        {
            $liste_themes = $this->model_theme->lister_new();
            return view('welcome', ['li_themes' => $liste_themes]);
        }

        public function effacer($id)
        {
            $this->model_theme->effacer($id);
            return back();
        }
    }
