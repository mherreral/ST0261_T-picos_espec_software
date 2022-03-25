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

Route::get('locale/{locale}', 'App\Http\Controllers\LocalizationController@locale')->name('locale');
