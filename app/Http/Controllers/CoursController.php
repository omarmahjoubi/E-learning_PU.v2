<?php

namespace App\Http\Controllers;

use App\Cour;
use Illuminate\Http\Request;

use App\Http\Requests;

class CoursController extends Controller
{
    private $model_cour;


    public function insert(Request $request)
    {
        $name = $request->input('name');
        $url = $request->input('url');
        $auteur = $request->input('auteur');
        $theme = $request->input('theme');
        $model_cour = new Cour;
        $model_cour->creer($name, $url, $auteur, $theme);
        $model_cour->save();
        $message = "Le cours a bien ete ajoute au catalogue de cours";
        $liste_cours = Cour::all();
        return view('cours.lister_cours', ['li_cours' => $liste_cours, 'msg_ajout' => $message]);
    }

    public function display($url)
    {
        return response()->file(base_path() . '/public/pdf/' . $url);
    }

    public function extraire($id)
    {
        $model_cour = Cour::find($id);
        $chemin = base_path() . '/public/pdf' . $model_cour->url;
        return view('cours.editer_cours', ['cours' => $model_cour], ['chemin' => $chemin]);
    }


    public function lister()
    {
        $liste_cours = Cour::all();
        return view('cours.lister_cours', ['li_cours' => $liste_cours]);
    }

    /*
        public function insert1() { //autre méthode pour insérer en utilisant le Mass Assignment
            $model_cour =  Cour::create(['name' => 'fake' , 'url' => '/fake1' , 'auteur' => 'ffffff' , 'theme' => 'factis']) ;
        }
                    */
    public function update(Request $request, $id)
    {
        $model_cour = Cour::find($id);
        $ancien_nom= $model_cour->name ;
        $nv_nom  = $request->input('name');
        $model_cour->name = $nv_nom;
        $model_cour->auteur =  $request->input('auteur');
        $model_cour->theme =  $request->input('theme');
        $model_cour->url =  $request->input('url');
        $model_cour->save();
        $message = 'les modifications ont bien ete prises en compte' ;
        $liste_cours = Cour::all();
        return view('cours.lister_cours', ['li_cours' => $liste_cours, 'msg_modif' => $message]);

    }

    /* public function delete($name) {
        $model_cour = Cour::where('name',$name) ;
        $model_cour->delete() ;	}
    */
    public function delete($id)
    { //autre methode pour supprimer si on connait la clé primaire du tuple
        $model_cour = Cour::destroy($id);
        return redirect('cours/lister');
    }


}
