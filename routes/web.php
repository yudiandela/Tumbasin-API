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

// Authentication Route
Auth::routes(['verify' => true]);

// Show Index page
Route::get('/', 'RootController')->name('root.index');

Route::middleware(['auth', 'verified'])->group(function () {
    // Show Dashboard page
    Route::get('dashboard', 'DashboardController')->name('dashboard.index');

    // CRUD Brand
    Route::resource('brand', 'BrandController')->except(['show']);

    // CRUD Category
    Route::resource('category', 'CategoryController')->except(['show']);

    // CRUD Product
    Route::get('product/top-seller', 'ProductController@topSeller')->name('product.topseller');
    Route::resource('product', 'ProductController');

    // Order Route
    Route::resource('order', 'OrderController')->except(['edit', 'update', 'show']);
    Route::get('order/status/{status}', 'OrderController@getStatus')->name('order.getByStatus');
    Route::put('order/status/{id}/change', 'OrderController@changeStatus')->name('order.change.status');
    Route::patch('order/status/{id}/change', 'OrderController@changeStatus');
    Route::get('order/product/{order}', 'OrderController@showByProduct')->name('order.showByProduct');
    Route::get('order/order-number/{id}', 'OrderController@byOrderNumber')->name('order.byOrderNumber');
});

