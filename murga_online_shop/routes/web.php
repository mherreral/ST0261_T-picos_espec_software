<?php

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

Route::get('/', 'App\Http\Controllers\User\HomeController@index')->name("user.home.index");

// Auth needed

//Admin
Route::middleware('admin')->group(function () {
    Route::get('/admin', 'App\Http\Controllers\Admin\HomeController@index')->name('admin.home.index');
});

//User

Route::middleware('auth')->group(function () {
    Route::get('/wishlists', 'App\Http\Controllers\User\WishlistController@index')->name("user.wishlist.index");
    Route::get('/wishlists/create', 'App\Http\Controllers\User\WishlistController@create')->name("user.wishlist.create");
    Route::post('/wishlists/save', 'App\Http\Controllers\User\WishlistController@save')->name("user.wishlist.save");
    Route::get('/wishlists/{id}', 'App\Http\Controllers\User\WishlistController@show')->name("user.wishlist.show");
    Route::delete('/wishlists/delete/{id}', 'App\Http\Controllers\User\WishlistController@delete')->name("user.wishlist.delete");
    Route::get('/liquor/add', 'App\HttpÇontrollers\User\WishlistController@addItem')->name('user.wishlist.add');
});

Route::get('locale/{locale}', 'App\Http\Controllers\LocalizationController@locale')->name('locale');
