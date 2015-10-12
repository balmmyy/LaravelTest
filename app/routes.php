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

Route::get('/', 'MemberController@getAll');

Route::get('/{item}', 'MemberController@get');

Route::post('/add', 'MemberController@add');

Route::put('/edit/{item}', 'MemberController@edit');

Route::delete('/delete/{item}','MemberController@delete');


/*Route::get('/', function(){
	return View::make('hello');
});*/
