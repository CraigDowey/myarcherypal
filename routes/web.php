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
Auth::routes();

Route::get('logout', 'Auth\LoginController@logout');

Route::get('/', function () {

    return view('welcome');

});

Route::get('user/home', 'HomeController@index');

Route::get('/leader-board','LeaderController@index');

Route::resource('user/home', 'HomeController');

Route::resource('user/edit-user', 'UsersController');

Route::resource('user/new-round', 'ScoresController');

Route::group(['middleware'=>'admin'] ,function(){

    Route::get('/admin', function(){

        return view('admin.index');

    });

    Route::resource('admin', 'AdminController@index');

    Route::resource('admin/users', 'AdminUsersController', ['names' => [

        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'edit' => 'admin.users.edit',

    ]]);

    Route::resource('admin/scores', 'AdminScoresController', ['names' => [

        'index' => 'admin.scores.index',
        'edit' => 'admin.scores.edit',

    ]]);
});