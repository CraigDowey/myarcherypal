<?php

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource('/welcome', 'Controller');

Route::get('/leader-board','LeaderController@index');

Route::resource('/home', 'HomeController');

Route::resource('/edit-user', 'UsersController');

Route::resource('/new-round', 'ScoresController');

Route::group(['middleware'=>'admin'] ,function(){
    Route::get('/admin', function(){
        return view('admin.index');
    });
    Route::resource('admin', 'AdminController@index');
    Route::resource('admin/users', 'AdminUsersController');
    Route::resource('admin/scores', 'AdminScoresController');
});