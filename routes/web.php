<?php

use App\Http\Controllers\CompanyController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth', 'onboarded']], function () {

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['prefix' => '/company'], function () {

        Route::get('/welcome', [CompanyController::class, 'welcome'])->name('company.welcome');
        Route::get('/join', [CompanyController::class, 'join'])->name('company.join');
        Route::get('/onboard', [CompanyController::class, 'onboard'])->name('company.onboard');

        Route::post('/create', [CompanyController::class, 'create'])->name('company.create');

    });

});