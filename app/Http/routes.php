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

// Route::auth();




Route::group(['prefix' => 'admgym'],function(){
	
	Route::get('/', function () {
		if (Auth::guard('web')->guest()) {
			return redirect()->route('admgym.auth.login');	
		} else {
			return redirect()->route('admgym.members.index');
		}
	});

	Route::group(['prefix' => 'auth'],function(){

		Route::get('login','Admin\Auth\AuthAdminController@getLogin')->name('admgym.auth.login');
		Route::post('login','Admin\Auth\AuthAdminController@postLogin')->name('admgym.auth.postlogin');

	});


	Route::resource('members','Admin\Member\MemberController');
	Route::resource('members.memberships','Admin\Membership\MembershipController',['only'=>['create','store','update']]);
	Route::resource('members.memberships.assistances','Admin\Membership\MembershipAssistanceDetailController',['only'=>['store']]);
	Route::resource('members.memberships.payments','Admin\Membership\MembershipPaymentDetailController',['only'=>['create','store']]);

	Route::group(['prefix'=>'memberships'],function(){
		Route::resource('divisions','Membership\DivisionController',['except'=>['show']]);
		Route::resource('types','Membership\MembershipTypeController',['except'=>['show']]);
	});

	Route::group(['middleware'=>['auth','role:administrator']],function(){
		
		Route::resource('users','UserController',['except'=>['show']]);
		Route::resource('permissions','PermissionController',['except'=>['show']]);
		Route::resource('roles','RoleController',['except'=>['show']]);

		Route::group(['prefix'=>'registers'],function(){
			Route::resource('user-access','RegisterLog\UserAccessLogController',['only'=>['index']]);
		});
	});

});
