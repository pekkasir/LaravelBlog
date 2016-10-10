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

Route::get('/contact', [
    'uses' => 'PostController@getContact',
    'as' => 'contact'
]);

Route::group([
  'prefix' => '/admin'  
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
});