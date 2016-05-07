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

Route::get('/', "ThemeController@liste_home");
Route::auth();

Route::get('/home', 'HomeController@index');




Route::group(['middleware' => 'admin'], function () {
	Route::post('cours/traiter_ajout_cours','CoursController@inserer') ;
	Route::get('/cours/ajouter',"AjoutController@lister") ;
	Route::get('/cours/supprimer/{id}','CoursController@delete') ;
	Route::get('/cours/editer/{id}','CoursController@extraire') ;
	Route::post('/cours/modifier/{id}','CoursController@update') ;
	Route::get('/theme/supprimer/{id}','ThemeController@effacer') ;
	Route::get('/theme/ajouter', function() {
		return view("theme.ajout_theme") ;
	}) ;
	Route::post('theme/traiter_ajout_theme','ThemeController@inserer') ;
	Route::get('/theme/editer/{id}','ThemeController@extraire') ;
	Route::post('/theme/modifier/{id}','ThemeController@update') ;

}) ;



Route::group(['middleware' => 'auth'], function () {
	Route::get('/cours/lister', 'CoursController@lister');
	Route::get('/cours/lister/{msg}', 'CoursController@lister');
	Route::get('/cours/afficher/{url}','CoursController@display') ;
    Route::get('/theme/lister_cours/{name}' , 'ThemeController@lister_cours') ;
	Route::get('/theme/lister/{id}','ThemeController@lister') ;
	Route::get('/suivre_theme/{user_id}/{theme_id}' , 'SuivreThemeController@suivreTheme') ;
	Route::get('/annuler_suivi_theme/{user_id}/{theme_id}','SuivreThemeController@annulerSuivi') ;
	
});
