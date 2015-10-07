<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array(
	'as' => 'home',
	'uses' => 'MemberController@home'
));
Route::match(array('GET', 'POST'), '/add', array(
	'as' => 'home_add',
	'uses' => 'MemberController@add'
));
Route::match(array('GET', 'POST'),'/edit/{id}', array(
	'as' => 'home_edit',
	'uses' => 'MemberController@edit'
));
Route::get('/delete/{id}', array(
	'as' => 'home_delete',
	'uses' => 'MemberController@delete'
));


/*Route::get('/', function(){
	return View::make('hello');
});*/