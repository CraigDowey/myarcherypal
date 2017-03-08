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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/welcome', 'Controller');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource('/home', 'HomeController');

Route::resource('/edit-user', 'UsersController');

Route::resource('/new-round', 'ScoresController');

Route::group(['middleware'=>'admin'] ,function(){

    Route::get('/admin', function(){

        return view('admin.index');

    });

    Route::resource('admin/users', 'AdminUsersController');
    Route::resource('admin/scores', 'AdminScoresController');
    Route::resource('admin', 'AdminController');

});