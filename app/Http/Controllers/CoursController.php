<?php

namespace App\Http\Controllers;

use App\Cour;
use App\Auteur ;
use App\Theme ;
use Illuminate\Http\Request;

use App\Http\Requests;

class CoursController extends Controller
{
     private $model_cour;

    public function __construct(Cour $cours) // Ioc du model dans le controlleur
    {
        $this->model_cour = $cours ;
    }


    public function inserer(Request $request)
    {
        $name = $request->input('name');
        $url = $request->input('url');
        if (Auteur::where('name',$request->input('auteur'))->count() == 0 ) {   
            $auteur = new Auteur ;
            $auteur->creer($request->input('auteur'));
            $auteur->save() ;
        }
        $auteur_id = Auteur::where('name',$request->input('auteur'))->first(array('id')) ;
        $theme_id = Theme::where('name',$request->input('theme'))->first(array('id')) ;
        $this->model_cour->creer($name, $url, $auteur_id['id'], $theme_id['id']);
        $this->model_cour->save();
        $message = "Le cours $name a bien été ajouté au catalogue de cours";
        // return json_encode($liste_cours,JSON_FORCE_OBJECT); web service : retourner un objet JSON
        return redirect('/theme/lister_cours/'.$request->input('theme'))->with('msg_ajout' , $message);
    }

    public function display($url)
    {
        return response()->file(base_path() . '/public/pdf/' . $url);
    }

    public function extraire($id)
    {

        $model_cour = $this->model_cour->extract_by_id($id) ;
        $id_theme = $model_cour->theme->id ;
        $nom_auteur = $model_cour->auteur->name;
        $chemin = base_path() . '/public/pdf' . $model_cour->url;
        $liste_auteurs = Auteur::all() ;
        $liste_theme = Theme::all() ;
        return view('cours.editer_cours', ['cours' => $model_cour , 'nom_auteur' => $nom_auteur , 'id_theme' => $id_theme ,
            'li_auteurs' => $liste_auteurs , 'li_themes' => $liste_theme], ['chemin' => $chemin]);
    }


    public function lister()
    {

        $liste_cours =$this->model_cour->lister() ;
        $model_theme = new Theme ;
        $liste_theme = $model_theme->lister() ;
        return view('cours.lister_cours', ['li_cours' => $liste_cours , 'li_themes' => $liste_theme]);
    }

    /*
        public function insert1() { //autre méthode pour insérer en utilisant le Mass Assignment
            $model_cour =  Cour::create(['name' => 'fake' , 'url' => '/fake1' , 'auteur' => 'ffffff' , 'theme' => 'factis']) ;
        }
                    */
    public function update(Request $request, $id)
    {
        $model_cour =$this->model_cour->extract_by_id($id);
        $ancien_nom = $model_cour->name ;
        $nv_nom  = $request->input('name');
        $model_cour->name = $nv_nom;
        $auteur_id =  Auteur::where('name',$request->input('auteur'))->first(array('id'));
        $theme_id =  Theme::where('name',$request->input('theme'))->first(array('id')) ;
        $model_cour->auteur_id = $auteur_id['id'] ;
        $model_cour->theme_id = $theme_id['id'] ;
        $model_cour->url =  $request->input('url');
        $model_cour->save();
        $message = "les modifications opérées sur le cours $nv_nom ont bien ete prises en compte" ;
        $liste_cours = $this->model_cour->lister() ;
        return redirect('/theme/lister_cours/'.$request->input('theme'))->with('msg_modif' , $message) ;
    }

    /* public function delete($name) {
        $model_cour = Cour::where('name',$name) ;
        $model_cour->delete() ;	}
    */
    public function delete($id)
    { //autre methode pour supprimer si on connait la clé primaire du tuple
        $theme_name = Cour::find($id)->theme->name ;
        $this->model_cour->efface($id) ;
        return redirect('theme/lister_cours/'.$theme_name);
    }


}
