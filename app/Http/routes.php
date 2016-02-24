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

Route::get(		'/', 					'WelcomeController@index' 	);
Route::get(		'home', 				'HomeController@index'		);

Route::get(		'repartos', 			'RepartoController@index'	);
Route::get(		'repartos/create', 		'RepartoController@create'	);
Route::post(	'repartos/create', 		'RepartoController@store'	);
Route::get(		'repartos/edit/{id}', 	'RepartoController@edit'	);
Route::post(	'repartos/edit/{id}', 	'RepartoController@update'	);
Route::get(		'repartos/delete/{id}', 'RepartoController@destroy'	);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
