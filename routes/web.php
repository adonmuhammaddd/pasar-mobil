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

Route::get('login', 'AuthController@login')->name('login');
Route::post('login', 'AuthController@authenticate');
Route::post('logout', 'AuthController@logout')->name('logout');

Route::get('customer', 'CustomerController@index')->name('customer');
Route::post('add-customer', 'CustomerController@store')->name('add-customer');

Route::get('car', 'CarController@index')->name('car');
Route::post('add-car', 'CarController@store')->name('add-car');

Route::get('category', 'CategoryController@index')->name('category');
Route::post('add-category', 'CategoryController@store')->name('add-category');