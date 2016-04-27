<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/test', function() {
	return view("cours.ajout_cours") ;
}) ;


Route::group(['middleware' => 'admin'], function () {
	Route::post('cours/traiter_ajout_cours','CoursController@insert') ;
	Route::get('/cours/ajouter', function() {
		return view("cours.ajout_cours") ;
	}) ;
	Route::get('/cours/supprimer/{id}','CoursController@delete') ;
	Route::get('/cours/editer/{id}','CoursController@extraire') ;
	Route::post('/cours/modifier/{id}','CoursController@update') ;

}) ;



Route::group(['middleware' => 'auth'], function () {
	Route::get('/cours/lister', 'CoursController@lister');
	Route::get('/cours/lister/{msg}', 'CoursController@lister');
	Route::get('/cours/afficher/{url}','CoursController@display') ;

});
