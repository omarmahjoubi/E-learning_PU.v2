<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme ;
use App\Auteur ;

use App\Http\Requests;

class AjoutController extends Controller
{
    /* ce controlleur sert a obtenir la listes des themes et des auteurs pour
    les afficher dans le formulaire */

    protected $model_theme;
    protected $model_auteur;

    public function __construct(Theme $theme , Auteur $auteur) // Ioc du model dans le controlleur
    {
        $this->model_theme = $theme ;
        $this->model_auteur = $auteur ;
    }

    public function lister() {
        $liste_themes = $this->model_theme->lister() ;
        $liste_auteurs = $this->model_auteur->lister() ;
        return view("cours.ajout_cours", [ 'li_themes' => $liste_themes , 'li_auteurs' => $liste_auteurs]) ;
    }
}
