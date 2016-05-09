<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'sexe' , 'telephone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function extract_by_id($id) {
        return User::find($id) ;
    }

    public function getName() {
        return $this->name ;
    }

    
    public function lister() {
        return User::all() ;
    }
    
    public function themes() {
        return $this->belongsToMany('App\Theme') ;
    }

    public function modifier($name,$email,$telephone,$sexe) {
        $this->name = $name;
        $this->email = $email ;
        $this->telephone = $telephone ;
        $this->sexe = $sexe ;
        $this->save() ;
    }

    public function supprimer($id) {
        User::destroy($id) ;
    }
}
