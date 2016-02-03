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
    Route::get('/product/{product}', 'ProductsController@productDetails');
});

// Routes that needed authenticated logged in users only
Route::group(['middleware' => ['web','auth'] ], function () {
    Route::get('/profile', 'ProfileController@index');
    Route::get('/products/create', 'ProductsController@create');
});

// Manage routes
Route::group(['middleware' => ['web', 'auth', 'role:administrator']], function () {
    Route::get('manage','ManageController@index');

    /**
     * Products manage route
     */
    Route::get('manage/products', 'ManageController@showProducts');
    // Add new related
    Route::get('manage/product/add', 'ManageController@addProduct');
    Route::post('manage/product/add', 'ManageController@saveNewProduct');
    // Edit related
    Route::get('manage/product/{product}', 'ManageController@editProduct');
    Route::post('manage/product/{product}', 'ManageController@updateProduct');
    // Delete related
    Route::delete('manage/product/{product}', 'ManageController@deleteProduct');

    /**
     * Categories manage route
     */
    Route::get('manage/categories', 'ManageController@showCategories');
    // Add new related
    Route::get('manage/category/add', 'ManageController@addCategory');
    Route::post('manage/category/add', 'ManageController@saveNewCategory');
    // Edit related
    Route::get('manage/category/{category}', 'ManageController@editCategory');
    Route::post('manage/category/{category}', 'ManageController@updateCategory');
    // Delete related
    Route::delete('manage/category/{category}', 'ManageController@deleteCategory');

    /**
     * Users manage route
     */
    Route::get('manage/users', 'ManageController@showUsers');
    // Search related
    Route::get('manage/users/search', 'ManageController@searchUsers');
    Route::get('manage/users/search/{keyword}', 'ManageController@searchUsersURL');
    // Edit related
    Route::get('manage/user/{user}', 'ManageController@editUser');
    Route::post('manage/user/{user}', 'ManageController@updateUser');
    // Delete related
    Route::delete('manage/user/{user}', 'ManageController@deleteUser');
});
