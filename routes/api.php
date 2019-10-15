<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::name('api.')->group(function () {
    // CRUD brand
    Route::resource('brand', 'Api\BrandController')->except(['create', 'edit']);

    // CRUD Category
    Route::resource('category', 'Api\CategoryController')->except(['create', 'edit']);

    // CRUD product
    Route::get('product/best-selling', 'Api\ProductController@getBestSelling')->name('product.bestSelling');
    Route::resource('product', 'Api\ProductController')->except(['create', 'edit']);

    // Order Route
    Route::get('order', 'Api\OrderController@index')->name('order');
    Route::get('order/status/{status}', 'Api\OrderController@getStatus')->name('order.getByStatus');
    Route::get('order/product/{order}', 'Api\OrderController@showByProduct')->name('order.showByProduct');
});
