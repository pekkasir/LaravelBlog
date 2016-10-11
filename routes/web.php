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

Route::get('/', [
    'uses' => 'PostController@getBlogIndex',
    'as' => 'frontend.index'
]);

Route::get('/blog/{id}', [
    'uses' => 'PostController@getSinglePost',
    'as' => 'single'
]);

Route::get('/login', [
    'uses' => 'AdminController@getloginForm',
    'as' => 'login.form'
]);

Route::post('/login', [
    'uses' => 'AdminController@postLogin',
    'as' => 'login.admin'
]);

Route::get('/contact', [
    'uses' => 'PostController@getContact',
    'as' => 'contact'
]);

Route::post('/contact/sendMsg', [
    'uses' => 'PostController@postSendMsg',
    'as' => 'sendMsg'
]);

Route::group([
    'prefix' => '/admin',
    'middleware' => 'auth'
], function() {
    Route::get('/', [
        'uses' => 'AdminController@getIndex',
        'as' => 'admin.index'
    ]);
    
    Route::get('/create', [
        'uses' => 'AdminController@getCreate',
        'as' => 'admin.create'
    ]);
    
    Route::post('/create', [
        'uses' => 'AdminController@postCreate',
        'as' => 'admin.create'
    ]);
    
    Route::get('/{id}/edit', [
        'uses' => 'AdminController@getEditPost',
        'as' => "admin.edit.form"
    ]);
    
    Route::post('/edit', [
        'uses' => "AdminController@postEditPost", 
        'as' => "admin.edit"
    ]);
    
    Route::get('/{id}/delete', [
        'uses' => 'AdminController@getDeletePost',
        'as' => 'admin.delete'
    ]);
    
    Route::get('/logout', [
        'uses' => 'AdminController@getLogout',
        'as' => 'admin.logout'
    ]);
});