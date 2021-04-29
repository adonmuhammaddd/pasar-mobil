<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', ['uses'=>'DashboardController@index'])->name('dashboard');


Route::group([
    // 'middleware' => 'api',
    'prefix' => 'auth'
], function($router) {
    Route::get('login', 'AuthController@login')->name('login');
    Route::post('login', 'AuthController@authenticate');
    Route::post('logout', 'AuthController@logout')->name('logout');
});


Route::group([
    // 'middleware' => 'api',
    'prefix' => 'auth'
], function($router) {
    
});

Route::group([
    // 'middleware' => 'api',
    'prefix' => 'customer'
], function($router) {
    Route::get('/', 'CustomerController@index')->name('customer');
    Route::post('add-customer', 'CustomerController@store')->name('add-customer');
});

Route::group([
    // 'middleware' => 'api',
    'prefix' => 'car'
], function($router) {
    Route::get('/', 'CarController@index')->name('car');
    Route::post('add-car', 'CarController@store')->name('add-car');
    Route::get('category-box', 'CarController@categoryBox')->name('category-box');
});

Route::group([
    // 'middleware' => 'api',
    'prefix' => 'category'
], function($router) {
    Route::get('/', 'CategoryController@index')->name('category');
    Route::post('add-category', 'CategoryController@store')->name('add-category');
});

Route::group([
    // 'middleware' => 'api',
    'prefix' => 'stock'
], function($router) {
    Route::get('/', 'StockController@index')->name('stock');
    Route::post('add-category', 'StockController@store')->name('add-category');
});
