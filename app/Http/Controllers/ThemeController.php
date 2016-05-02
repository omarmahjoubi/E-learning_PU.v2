<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme ;
use App\Cour;
use App\Auteur ;


use App\Http\Requests;

class ThemeController extends Controller
{
    protected $model_theme ;

    public function __construct(Theme $theme)
    {
        $this->model_theme = $theme ;
    }

    public function lister_cours($name) {
        $theme_id = Theme::where('name',$name)->first(array('id')) ;  // il faut déterminer l'id fu themes pour ensuite
        $liste_cours = Theme::find($theme_id['id'])->cours ;// pouvoir extraire les cours qui lui sont associés
        // ajout du nom de l'auteur a l'objet cours
        foreach ($liste_cours as $cour) {
       /*     $cour_id = Cour::where('name',$cour->name)->first(array('id')) ;
            $cour= Cour::find($cour_id['id']) ; */
            $auteur_name = $cour->auteur->name ;
            $cour->auteur_name = $auteur_name ;
        }
        return view('cours.lister_cours', ['li_cours' => $liste_cours , 'nom_theme' => $name ]) ;
    }
    
    public function lister() {
        $liste_themes = $this->model_theme->lister() ;
        return view('theme.lister_themes' , ['li_themes' => $liste_themes]) ;
    }
}
