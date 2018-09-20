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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Products List
Route::get('products', 'ProductController@index');

//Show specific product
Route::get('product/{product_id}', 'ProductController@show');

//Create new product
Route::post('product', 'ProductController@store');

//Update product
Route::put('product', 'ProductController@store');

//Delete product
Route::delete('product/{product_id}', 'ProductController@destroy');

//Categories list
Route::get('categories', 'CategoryController@index');

//Show specific category
Route::get('category/{category_id}', 'CategoryController@show');

//Create new product
Route::post('category', 'CategoryController@store');

//Update product
Route::put('category', 'CategoryController@store');

//Show Category
Route::get(
    'products/{category}/relationships/category',
    [
        'uses' => 'ProductRelationshipController@category',
        'as' => 'products.relationships.category',
    ]
);

//Shop product list
Route::get('shop/products', 'ProductController@ShopProducts');

//Admin product list
Route::get('dashboard/products', 'ProductController@ProductList');