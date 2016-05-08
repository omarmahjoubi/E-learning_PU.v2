<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use App\Http\Requests;

class AdminController extends Controller
{
    protected $model_user ;
    
    public function __construct(User $user)
    {
        $this->model_user = $user;
    }
    
    public function lister() {
        $this->model_user = $this->model_user->lister() ;
        return view('user.lister_user' , [ 'liste_user' => $this->model_user] ) ;
    }
    
}
