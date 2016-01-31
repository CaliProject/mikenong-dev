<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
    Route::get('/', 'HomeController@index');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});

// Routes that needed authenticated logged in users only
Route::group(['middleware' => ['web','auth'] ], function () {
    Route::get('/profile', 'ProfileController@index');
    Route::get('/products/create', 'ProductsController@create');
});

Route::group(['middleware' => ['web', 'auth', 'role:administrator']], function () {
    Route::get('manage','ManageController@index');
    Route::get('manage/products', 'ManageController@showProducts');
    Route::get('manage/categories', 'ManageController@showCategories');
    Route::get('manage/users', 'ManageController@showUsers');
});
