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
});
