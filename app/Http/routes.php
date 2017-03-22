<?php

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

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
    Route::resource('admin/users', 'AdminUsersController');
    Route::resource('admin/scores', 'AdminScoresController');
});