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
	return redirect('/clients');
});

Route::group(['middleware'=>'auth'],function(){
	
	Route::get('/home',function(){
		return view('home.index');
	});
	Route::resource('clients','ClientController');
	Route::resource('clients.books','BookController',['only'=>['create','store','update']]);
	Route::resource('clients.books.details','BookDetailController',['only'=>['store']]);
	Route::resource('clients.books.payments','BookPaymentDetailController',['only'=>['create','store']]);

});

Route::group(['middleware'=>['auth','role:administrator']],function(){
	Route::resource('book-types','BookTypeController',['except'=>['show']]);
	Route::resource('users','UserController',['except'=>['show']]);
	Route::resource('permissions','PermissionController',['except'=>['show']]);
	Route::resource('roles','RoleController',['except'=>['show']]);
});
	
	
