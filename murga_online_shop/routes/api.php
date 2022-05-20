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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/liquors', 'App\Http\Controllers\Api\LiquorApi@index')->name("api.liquor.index");

Route::get('/liquors/{id}', 'App\Http\Controllers\Api\LiquorApi@show')->name("api.liquor.show");
