<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/',[HomeController::class,'index'])->name('home.index');
Route::get('/{id}/add',[CartController::class,'addtoCart'])->name('card.add');
Route::get('/cart',[CartController::class,'showToCard'])->name('card.show');
Route::get('/{id}/delete',[CartController::class,'delete'])->name('cart.delete');
Route::get('/{id}/decrease',[CartController::class,'decrease'])->name('cart.decrease');
Route::get('/checkout',[CartController::class,'checkOut'])->name('cart.checkout');
Route::post('/checkout',[CartController::class,'createOrder'])->name('cart.createOrder');
Route::get('/remove',[CartController::class,'removeAll'])->name('cart.remove');
