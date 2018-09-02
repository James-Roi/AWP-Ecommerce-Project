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
Route::patch('product', 'ProductController@store');

//Delete product
Route::delete('product/{product_id}', 'ProductController@destroy');

//Categories list
Route::get('categories', 'CategoryController@index');

//Show Category
Route::get(
    'products/{category}/relationships/category',
    [
        'uses' => 'ProductRelationshipController@category',
        'as' => 'products.relationships.category',
    ]
);

//Shop products list
Route::get('shop/products', 'ProductController@ShopProducts');

//