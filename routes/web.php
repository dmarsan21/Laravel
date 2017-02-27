<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('job', function(){
// 	dispatch(new App\Jobs\SendEmail);
// 	return "Listo...";
// });


// DB::listen(function($query){
// 	echo "<pre>{$query->sql}</pre>";
// });

Route::get('roles', function(){
	return \App\Role::with('user')->get();
});

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);

Route::get('saludos/{nombre?}', ['as' => 'saludos', 'uses' => 'PagesController@saludo'])->where('nombre',"[A-Za-z]+");

Route::resource('mensajes', 'MessagesController');
Route::resource('usuarios', 'UsersController');

Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');