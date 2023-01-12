<?php

use App\Http\Controllers\TemperatureController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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



Route::get('fetch', [TemperatureController::class, 'fetchData'])
    ->name('fetchingdata');
Route::get('/', [TemperatureController::class, 'getTemperatureDaily'])
    ->name('home');
Route::get('/crud', [TemperatureController::class, 'crud'])
    ->name('crud');
Route::post('/crud', [TemperatureController::class, 'savecrud'])
    ->name('savecrud');
Route::get('/deletecrud/{id}', [TemperatureController::class, 'deletecrud'])
    ->name('deletecrud');

