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


// Admin products
Route::get('/dashboard/products', function () {
    return view('admin.product.index');
});

Route::get('/dashboard/product/{product_id}', function () {
    return view('admin.product.save');
});

Route::get('/dashboard/product/add', function () {
    return view('admin.product.add');
});
//Admin products end

//Admin Category

Route::get('/dashboard/categories', function () {
    return view('admin.category.index');
});

Route::get('/dashboard/category/{category_id}', function () {
    return view('admin.category.save');
});

Route::get('/dashboard/category/add', function () {
    return view('admin.category.add');
});

//Admin Category End

//Admin Package

Route::get('/dashboard/packages', function () {
    return view('admin.package.index');
});

Route::get('/dashboard/package/{package_id}', function () {
    return view('admin.package.save');
});

//Admin Package End