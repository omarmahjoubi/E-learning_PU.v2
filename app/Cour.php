<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cour extends Model
{
	public $timestamps = false;
	protected $fillable = [
		'name', 'url', 'auteur_id','theme_id'] ;


  /*  public function __construct($name,$url,$auteur,$theme) {
   

    	$this->name=$name ;
    	$this->url=$url ;
    	$this->auteur=$auteur ;
    	$this->theme=$theme ;



    } */
	public function extract_by_id($id) {
		return Cour::find($id) ;
	}

	public function lister() {
		return Cour::all();
	}
	
	public function efface($id) {
		Cour::destroy($id) ;
	}
	
	public function creer($name,$url,$auteur_id,$theme_id) {
		$this->name=$name ;
		$this->url=$url ;
		$this->auteur_id=$auteur_id ;
		$this->theme_id=$theme_id ;
	}
}
