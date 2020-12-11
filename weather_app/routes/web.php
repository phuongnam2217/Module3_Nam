<?php

use App\Http\Controllers\NewController;
use App\Http\Controllers\WeatherController;
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
Route::get('/weather',[WeatherController::class,'index'])->name('weather.index');
Route::get('/weather/{city}',[WeatherController::class,'changeCity'])->name('weather.change');

Route::get('/news',[NewController::class,'index']);
