<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// for testing populate orders database
Route::get('orders/populate', 'API\OrderController@getShopifyOrders');

// for testing populate orders database
Route::get('products/populate', 'API\ProductController@getShopifyProducts');

// for testing populate orders database
Route::get('customers/populate', 'API\CustomerController@getShopifyCustomers');



Route::get('orders/avg-value-all', 'API\OrderController@avgValueAll');

Route::get('orders/avg-value/{email}', 'API\OrderController@avgValue');

Route::get('orders/avg-value-variant/{variant}', 'API\OrderController@avgValueVariant');
