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
    Route::resource('brand', 'Api\BrandController')->only(['index', 'show']);

    // CRUD Category
    Route::resource('category', 'Api\CategoryController')->only(['index', 'show']);

    // CRUD product
    Route::get('product/top-seller', 'Api\ProductController@topSeller')->name('product.topSeller');
    Route::resource('product', 'Api\ProductController')->only(['index', 'show']);

    // Order Route
    Route::get('order', 'Api\OrderController@index')->name('order');
    Route::get('order/status/{status}', 'Api\OrderController@getStatus')->name('order.getByStatus');
    Route::get('order/product/{order}', 'Api\OrderController@showByProduct')->name('order.showByProduct');
});
