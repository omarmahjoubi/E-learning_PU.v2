<?php

namespace App;

use App\Cour ;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    public $timestamps = false;
    protected $fillable = [ 'name','description' ] ;

    public function inserer($name , $description) {
        $this->name = $name ;
        $this->description = $description ;
        $this->save() ;
    }

    public function lister() {
        return Theme::all();
    }

    public function cours() {
        return $this->hasMany('App\Cour') ;
    }
    
    public function effacer($id) {
        Theme::destroy($id) ;
    }
}
