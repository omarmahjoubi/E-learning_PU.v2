<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use App\User;
use App\Http\Requests;

class SuivreThemeController extends Controller
{
    protected $model_theme;
    protected $model_user;
    public function __construct(Theme $theme,User $user)
    {
        $this->model_theme = $theme;
        $this->model_user = $user;
    }

    public function suivreTheme($user_id,$theme_id) {
        $this->model_theme = $this->model_theme->extract_by_id($theme_id) ;
        $this->model_theme->users()->attach($user_id) ;
        $name = $this->model_theme->getName() ;
        $msg_suivi = "Vous etes désormais abonné au théme $name " ;
        $this->model_user = $this->model_user->extract_by_id($user_id) ;
        $themes_id =[] ;
        foreach ($this->model_user->themes as $theme) {
            array_push($themes_id,$theme->getId()) ;
        }
        return back()->with('msg_suivi',$msg_suivi) ;
    }

    public function annulerSuivi($user_id,$theme_id) {
        $this->model_user = $this->model_user->extract_by_id($user_id) ;
        $this->model_user->themes()->detach($theme_id) ;
        $theme = $this->model_theme->extract_by_id($theme_id) ;
        $name = $theme->getName() ;
        $msg = "Vous ne suivez plus le théme $name" ;
        return back()->with('msg', $msg) ;
    }
}
