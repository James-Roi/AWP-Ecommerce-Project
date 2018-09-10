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

Route::get('/', function () {
    return view('index');
});

Route::get('/shop', function () {
    return view('shop.main');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/dashboard/products', function () {
    return view('admin.product.index');
});

Route::get('/dashboard/product/{product_id}', function () {
    return view('admin.product.edit');
});