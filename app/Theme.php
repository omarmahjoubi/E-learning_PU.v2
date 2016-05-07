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

    public function getName() {
        return $this->name ;
    }
    
    public function getId(){
        return $this->id ;
    }

    public function lister() {
        return Theme::all();
    }

    public function extract_by_id($id) {
        return Theme::find($id) ;
    }
    
    public function modifier($name,$description,$url_img) {
        $this->name = $name ;
        $this->description = $description ;
        $this->url_img = $url_img ;
        $this->save() ;
    }

    public function cours() {
        return $this->hasMany('App\Cour') ;
    }
    
    public function effacer($id) {
        Theme::destroy($id) ;
    }

    public function users() {
        return $this->belongsToMany('App\User') ;
    }
}
