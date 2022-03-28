<?php

//Authors: Manuela Herrera López

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

//Route::get('/', 'App\Http\Controllers\User\HomeController@index')->name("user.home.index");
Route::get('/', 'App\Http\Controllers\User\LiquorController@index')->name("user.home.index");
// Auth needed

//Admin
Route::middleware('admin')->group(function () {
    Route::get('/admin', 'App\Http\Controllers\Admin\HomeController@index')->name('admin.home.index');
});

//User

Route::middleware('auth')->group(function () {
    //Wishlists
    Route::get('/wishlists', 'App\Http\Controllers\User\WishlistController@index')->name("user.wishlist.index");
    Route::get('/wishlists/create', 'App\Http\Controllers\User\WishlistController@create')->name("user.wishlist.create");
    Route::post('/wishlists/save', 'App\Http\Controllers\User\WishlistController@save')->name("user.wishlist.save");
    Route::get('/wishlists/{id}', 'App\Http\Controllers\User\WishlistController@show')->name("user.wishlist.show");
    Route::delete('/wishlists/delete/{id}', 'App\Http\Controllers\User\WishlistController@delete')->name("user.wishlist.delete");
    Route::post('/wishlist/add/{id}', 'App\Http\Controllers\User\WishlistController@addItem')->name('user.wishlist.add');

    //liquors
    Route::get('/liquors', 'App\Http\Controllers\User\LiquorController@index')->name("user.liquor.index");
    Route::get('/liquors/{id}', 'App\Http\Controllers\User\LiquorController@show')->name("user.liquor.show");

    //Cart
    Route::post('/cart/add/{id}', 'App\Http\Controllers\User\ShoppingCartController@add')->name("user.shoppingCart.add");
    Route::get('/cart', 'App\Http\Controllers\User\ShoppingCartController@index')->name("user.shoppingCart.index");
    Route::get('/cart/purchase', 'App\Http\Controllers\User\ShoppingCartController@purchase')->name('user.shoppingCart.purchase');
    Route::get('/cart/delete', 'App\Http\Controllers\User\ShoppingCartController@delete')->name('user.shoppingCart.delete');
});

Route::get('locale/{locale}', 'App\Http\Controllers\LocalizationController@locale')->name('locale');
