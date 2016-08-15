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

Route::auth();

Route::get('/', function () {
	if (Auth::guest()) return view('auth.login');
	return redirect('/home');
});

Route::group(['middleware'=>'auth'],function(){
	
	Route::get('/home',function(){
		return view('home.index');
	});
	
	Route::resource('users','UserController',['except'=>'show']);
	
});
