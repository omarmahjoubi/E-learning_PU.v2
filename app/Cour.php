<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cour extends Model
{
	public $timestamps = false;
	protected $fillable = [
		'name', 'url', 'auteur','theme'] ;


  /*  public function __construct($name,$url,$auteur,$theme) {
   

    	$this->name=$name ;
    	$this->url=$url ;
    	$this->auteur=$auteur ;
    	$this->theme=$theme ;



    } */
	public function creer($name,$url,$auteur,$theme) {
		$this->name=$name ;
		$this->url=$url ;
		$this->auteur=$auteur ;
		$this->theme=$theme ;
	}
}
