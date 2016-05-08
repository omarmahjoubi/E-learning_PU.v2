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
        'pseudo', 'email', 'password', 'nom' , 'prenom' , 'sexe' , 'telephone'
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
    
    public function lister() {
        return User::all() ;
    }
    
    public function themes() {
        return $this->belongsToMany('App\Theme') ;
    }

    public function modifier($pseudo,$nom,$prenom,$email,$telephone,$sexe) {
        $this->nom = $nom;
        $this->prenom = $prenom ;
        $this->pseudo = $pseudo ;
        $this->email = $email ;
        $this->telephone = $telephone ;
        $this->sexe = $sexe ;
        $this->save() ;
    }
}
