<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme ;


use App\Http\Requests;

class ThemeController extends Controller
{
    protected $model_theme ;

    public function __construct(Theme $theme)
    {
        $this->model_theme = $theme ;
    }

    public function lister_cours($name) {
        $theme_id = Theme::where('name',$name)->first(array('id')) ;
        $liste_cours = Theme::find($theme_id['id'])->cours ;
        return view('theme.lister_cours', ['li_cours' => $liste_cours]) ;
    }
}
