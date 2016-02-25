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
    Route::get('/', 'HomeController@index');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('home', 'HomeController@index');

    // Search related
    Route::get('search/{keyword}', 'HomeController@searchProducts');

    // Product detail
    Route::get('product/{product}', 'ProductsController@productDetails');

    // Pages related
    Route::get('news', 'ProductsController@showPages');
    Route::get('pages/{page}', 'ProductsController@pageDetails');

    // Other user's products
    Route::get('user/{user}', 'ProfileController@showProducts');

    // Category related
    Route::get('category/{category}', 'HomeController@showCategory');
    Route::get('categories', 'HomeController@showAllCategories');
    Route::get('category/{category}/{status}', 'HomeController@showCategoryWithStatus');

    /*
     * Cooperatives routes
     */
    Route::get('cooperatives', 'HomeController@showCooperatives');

    /*
     * Pricing routes
     */
    Route::get('pricing', 'HomeController@showPricing');
    
    // About page
    Route::get('about', 'HomeController@showAboutPage');
});

// Routes that needed authenticated logged in users only
Route::group(['middleware' => ['web','auth'] ], function () {
    /*
     * Profile routes
     */
    Route::get('profile', 'ProfileController@index');
    Route::post('profile', 'ProfileController@updateProfile');

    Route::get('profile/products', 'ProfileController@myProducts');

    /**
     * Products routes
     */
    // Create related
    Route::get('products/create', 'ProductsController@create');
    Route::post('products/create', 'ProductsController@saveNewProduct');

    // Edit related
    Route::get('product/{product}/edit', 'ProductsController@editProduct');
    Route::post('product/{product}/edit', 'ProductsController@updateProduct');

    // Upload related
    Route::get('products/upload', function () {
        return ['status' => 'success'];
    });
    Route::post('products/upload', 'ProductsController@upload');
});

// Manage routes
Route::group(['middleware' => ['web', 'auth', 'role:administrator']], function () {
    Route::get('manage','ManageController@index');

    /**
     * Products manage routes
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
    // Search related
    Route::get('manage/products/search', 'ManageController@searchProducts');
    Route::get('manage/products/search/{keyword}', 'ManageController@searchProductsURL');

    /**
     * Categories manage routes
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
     * Users manage routes
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

    /*
     * Site configurations routes
     */
    Route::get('manage/site', 'ManageController@showSiteConfigs');
    Route::post('manage/site', 'ManageController@saveSiteConfigs');

    /*
     * Database migration
     */
    Route::get('manage/migrate', 'ManageController@migrate');
    Route::get('manage/migrate/rollback', 'ManageController@rollback');

    /*
     * Pages routes
     */
    Route::get('manage/pages', 'ManageController@showPages');
    Route::get('manage/pages/add', 'ManageController@createPage');
    Route::post('manage/pages/add', 'ManageController@saveNewPage');
    Route::get('manage/pages/{page}', 'ManageController@editPage');
    Route::post('manage/pages/{page}', 'ManageController@savePage');
    Route::delete('manage/pages/{page}', 'ManageController@deletePage');

    Route::get('pricing/add', 'HomeController@showCreatePricing');
    Route::post('pricing/add', 'HomeController@createPricing');
    Route::get('pricing/edit/{pricing}', 'HomeController@showEditPricing');
    Route::post('pricing/edit/{pricing}', 'HomeController@updatePricing');
    Route::delete('pricing/{pricing}', 'HomeController@deletePricing');

    // About page
    Route::get('about/edit', 'ManageController@editAboutPage');
    Route::patch('about/edit', 'ManageController@updateAboutPage');
});
