<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', 'IndexController@index')->name('index');

Route::get('/product/{product}', 'ProductController@show')->name('product.show');

Route::get('/shopping_cart/add_item/{product}', 'ShoppingCartController@addItem');

Route::get('/checkout', 'ShoppingCartController@checkout')->middleware('auth');
Route::get('/shoppingCart', 'ShoppingCartController@index')->middleware('auth')->name('shopping_cart.index');
Route::get('/shopping_cart/remove/{product}', 'ShoppingCartController@removeProduct')->middleware('auth');
Route::get('/shopping_cart/paid', 'ShoppingCartController@paid')->middleware('auth');

Route::get('/seller/{sellerAccount}', 'SellerAccountController@show')->name('seller_account.show');

Route::get('/category/{category}', 'CategoryController@show')->name('category.show');

Route::get('/sellerAccount', 'SellerAccountController@index')->middleware(\App\Http\Middleware\CheckSeller::class);
