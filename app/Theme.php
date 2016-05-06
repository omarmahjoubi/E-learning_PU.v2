<?php

namespace App;

use App\Cour ;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    public $timestamps = false;
    protected $fillable = [ 'name','description', 'url_img' ] ;

    public function inserer($name , $description , $url_img ) {
        $this->name = $name ;
        $this->description = $description ;
        $this->url_img = $url_img ;
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
