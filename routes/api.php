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

Route::post('/login', 'App\Http\Controllers\Api\AuthController@login')->name('login');
Route::post('/register', 'App\Http\Controllers\Api\AuthController@register');

Route::group(['prefix' => 'user', 'middleware' => ['auth:sanctum']], static function(){
    Route::post('/location', 'App\Http\Controllers\Api\UserController@location');
    Route::get('/location', 'App\Http\Controllers\Api\UserController@location');

    Route::post('/profile', 'App\Http\Controllers\Api\UserController@profile');
    Route::get('/profile', 'App\Http\Controllers\Api\UserController@profile');

    Route::get('/wallet', 'App\Http\Controllers\Api\UserController@wallet');

});

Route::group(['prefix' => 'platform', 'middleware' => ['auth:sanctum']], static function(){


});