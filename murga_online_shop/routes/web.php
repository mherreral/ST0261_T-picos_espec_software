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

    Route::get(
        '/admin',
        'App\Http\Controllers\Admin\HomeController@index'
    )->name('admin.home.index');

    Route::get(
        '/admin/customer',
        'App\Http\Controllers\Admin\CustomerController@index'
    )->name("admin.customer.index");

    Route::get(
        '/admin/customer/setadmin',
        'App\Http\Controllers\Admin\CustomerController@setAdmin'
    )->name("admin.customer.setAdmin");

    Route::get(
        '/admin/customer/delete',
        'App\Http\Controllers\Admin\CustomerController@delete'
    )->name("admin.customer.delete");

    Route::post(
        '/admin/customer/save',
        'App\Http\Controllers\Admin\CustomerController@save'
    )->name("admin.customer.save");

    Route::get(
        '/admin/customer/{id}',
        'App\Http\Controllers\Admin\CustomerController@show'
    )->name("admin.customer.show");
});

//User

Route::middleware('auth')->group(function () {
    Route::get('/wishlists', 'App\Http\Controllers\User\WishlistController@index')->name("user.wishlist.index");
    Route::get('/wishlists/create', 'App\Http\Controllers\User\WishlistController@create')->name("user.wishlist.create");
    Route::post('/wishlists/save', 'App\Http\Controllers\User\WishlistController@save')->name("user.wishlist.save");
    Route::get('/wishlists/{id}', 'App\Http\Controllers\User\WishlistController@show')->name("user.wishlist.show");
    Route::delete('/wishlists/delete/{id}', 'App\Http\Controllers\User\WishlistController@delete')->name("user.wishlist.delete");
    Route::get('/liquors', 'App\Http\Controllers\User\LiquorController@index')->name("user.liquor.index");
    Route::get('/liquors/{id}', 'App\Http\Controllers\User\LiquorController@show')->name("user.liquor.show");
    Route::post('/wishlist/add/{id}', 'App\Http\Controllers\User\WishlistController@addItem')->name('user.wishlist.add');
    Route::get('/search', 'App\Http\Controllers\User\LiquorController@search')->name("user.liquor.search");
});

Route::get('locale/{locale}', 'App\Http\Controllers\LocalizationController@locale')->name('locale');
