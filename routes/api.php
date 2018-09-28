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

//Category list
Route::get('categories', 'CategoryController@index');

//Delete category
Route::delete('category/{category_id}', 'CategoryController@destroy');

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

//Admin package list
Route::get('packages', 'PackageController@showAdminPackages');

//Delete package
Route::delete('package/{package_id}', 'PackageController@destroy');

//Show specific package
Route::get('package/{package_id}', 'PackageController@show');

//Create new package
Route::post('package', 'PackageController@store');

//Show packages products
Route::get('packages/products', 'PackagesProductController@index');

//Show packages products
Route::get('package/{package_id}/products', 'PackagesProductController@show');

//Show products for packages
Route::get('packages/{package_id}/products', 'ProductController@PackageProductList');

//Delete package
Route::delete('package/product/{package_product_id}', 'PackagesProductController@destroy');

//Create new package
Route::post('package/product', 'PackagesProductController@store');

//Create new package
Route::put('package/product', 'PackagesProductController@update');

//Update package
Route::put('package', 'PackageController@store');

//Product stocks
Route::get('stocks', 'StockController@index');

//Update stock
Route::put('stock', 'StockController@update');