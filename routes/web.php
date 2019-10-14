<?php

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

Auth::routes();

Route::get('/', 'DashboardController')->name('dashboard.index');

// CRUD Category
Route::resource('category', 'CategoryController');

// CRUD brand
Route::resource('brand', 'BrandController');

// CRUD product
Route::get('product/best-selling', 'ProductController@getBestSelling')->name('product.bestSelling');
Route::resource('product', 'ProductController');

// Order Route
Route::get('order', 'OrderController@index')->name('order.index');
Route::get('order/status/{status}', 'OrderController@getStatus')->name('order.getStatus');
Route::get('order/product/{order}', 'OrderController@showByProduct')->name('order.showByProduct');
