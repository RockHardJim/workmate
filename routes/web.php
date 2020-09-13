<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\CompanyController;
use App\Http\Middleware\AssetIsPrivate;
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

    Route::group(['prefix' => '/bounties'], function () {

        Route::get('/', App\Http\Livewire\Bounties\AllComponent::class);
        Route::get('/active', App\Http\Livewire\Bounties\ActiveComponent::class);
        Route::get('/create', App\Http\Livewire\Bounties\CreateComponent::class);

    });

    Route::group(['prefix' => '/company'], function () {

        Route::get('/settings', App\Http\Livewire\Companies\SettingsComponent::class);
        Route::post('/settings', App\Http\Livewire\Companies\SettingsComponent::class);

    });

    Route::get('/asset/{encryptedPath}', [AssetController::class, 'stream'])->middleware(AssetIsPrivate::class)->name('asset.stream');
});
