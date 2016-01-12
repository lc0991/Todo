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

Route::get('/', function() {return redirect()->route('listListes');});

Route::get('/listes', [
    'middleware' => 'auth',
    'as'=>'listListes',
    'uses'=>'ListesController@listListes'
]);

Route::post('/listes/create_liste', [
    'middleware' => 'auth',
    'as'=>'createListe',
    'uses'=>'ListesController@createListe'
]);

Route::post('/listes/update_liste', [
    'middleware' => 'auth',
    'as'=>'updateListe',
    'uses'=>'ListesController@updateListe'
]);

Route::get('/liste/{id_liste}/taches', [
    'middleware' => 'auth',
    'as'=>'listTaches',
    'uses'=>'TachesController@listTaches'
]);

Route::post('/liste/taches/create_tache', [
    'middleware' => 'auth',
    'as'=>'createTache',
    'uses'=>'TachesController@createTache'
]);

Route::post('/liste/taches/update_tache', [
    'middleware' => 'auth',
    'as'=>'updateTache',
    'uses'=>'TachesController@updateTache'
]);

Route::post('/update_password', [
    'middleware' => 'auth',
    'as'=>'updatePassword',
    'uses'=>'PasswordController@updatePassword'
]);

Route::get('/about', [
    'middleware' => 'auth',
    'as'=>'showAbout',
    'uses'=>'AboutController@showAbout'
]);

Route::get('/login', function() {return view('login/login');});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', [
    'as'=>'login',
    'uses'=>'Auth\AuthController@postLogin'
]);
Route::get('auth/logout', [
    'as'=>'logout',
    'uses'=>'Auth\AuthController@getLogout']
);

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', [
    'as'=>'register',
    'uses'=>'Auth\AuthController@postRegister'
]);

// Ajout car la redirection ne se fait pas tout le temps...
Route::get('/home', function() {return redirect()->route('listListes');});