<?php

namespace App;

use App\Cour ;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    public $timestamps = false;
    
    public function lister() {
        return Theme::all();
    }

    public function cours() {
        return $this->hasMany('App\Cour') ;
    }
}
