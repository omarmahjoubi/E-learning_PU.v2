<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use App\Http\Requests;

class UserController extends Controller
{
    protected $model_user;

    public function __construct(User $user)
    {
        $this->model_user = $user;
    }
    function extraire($id)
    {
        $this->model_user = $this->model_user->extract_by_id($id);
        return view("user.editer_user", ['user' => $this->model_user]);

    }

    function info($id) {
        $this->model_user = $this->model_user->extract_by_id($id);
        return view("user.user_info", ['user' => $this->model_user]);

    }

    public function update(Request $request, $id)
    {
        $this->model_user = $this->model_user->extract_by_id($id);
        $nom = $request->input('nom');
        $prenom = $request->input('prenom');
        $pseudo = $request->input('pseudo');
        $email = $request->input('email');
        $telephone = $request->input('telephone');
        $sexe = $request->input('sexe');
        $this->model_user->modifier($pseudo,$nom,$prenom,$email,$telephone,$sexe);
        $msg = "votre profil a bien été modifié";
        //   return redirect('/theme/lister')->with('msg_modif', $msg);
        return \Redirect::route('lister_info', $id)->with('msg_modif', $msg);

    }
    
    public function lister_cour_suivi($id) {
        $this->model_user = $this->model_user->extract_by_id($id) ;
        $liste_themes = $this->model_user->themes ;
        $taille = count($liste_themes) ;
        $i=0 ;
        $nb_tour = 0;
        $max =3 ;
        $liste_themes_res =[];
        while ($i < $taille) {
            $liste_themes_inter = [];
            if (($i % 3 == 0) && ($i != 0)) { // pour organiser les themes en colonnes de 3 dans la vue
                $nb_tour++;
                $max = 3 + $nb_tour * 3;
            }

            if ($max > $taille) { // pour ne pas depasser la taille du tableau
                $max = $taille;
            }

            for ($j = $i; $j < $max; $j++) {
                array_push($liste_themes_inter, $liste_themes[$j]);

            }

            array_push($liste_themes_res, $liste_themes_inter);
            $i += 3;
        }
        return view('user.liste_themes_suivi',['liste_themes' => $liste_themes_res]) ;
        
    }
    
    
    
    
}
