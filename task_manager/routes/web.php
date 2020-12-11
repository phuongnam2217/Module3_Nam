<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
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
Route::get('login',[\App\Http\Controllers\AuthController::class,'showFormLogin'])->name('login');
Route::post('login',[\App\Http\Controllers\AuthController::class,'login'])->name('auth.login');

Route::middleware(['auth','locate'])->prefix('admin')->group(function (){

    Route::get('/locale/{language}',[\App\Http\Controllers\LangController::class,'setLocale'])->name('setLocale');

    Route::get('/',function (){
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::get('logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('auth.logout');
    Route::prefix('users')->group(function (){
        Route::get('/',[UserController::class,'index'])->name('users.index');
        Route::get('/create',[UserController::class,'create'])->name('users.create');
        Route::post('/create',[UserController::class,'store'])->name('users.store');
        Route::get('/{id}/show',[UserController::class,'show'])->name('users.show');
        Route::get('/{id}/edit',[UserController::class,'edit'])->name('users.edit');
        Route::post('/{id}/edit',[UserController::class,'update'])->name('users.update');
        Route::get('/{id}/delete',[UserController::class,'destroy'])->name('users.destroy');
        Route::post('/search',[UserController::class,'search'])->name('users.search');
    });
    Route::prefix('categories')->group(function (){
        Route::get('/',[CategoryController::class,'index'])->name('categories.index');
        Route::get('/create',[CategoryController::class,'create'])->name('categories.create');
    });

    Route::prefix('posts')->group(function (){
        Route::get('/',[PostController::class,'index'])->name('posts.index');
    });

    Route::prefix('/customers')->group(function (){
        Route::get('/',[CustomerController::class,'index'])->name('customers.index');
        Route::get('/create',[CustomerController::class,'create'])->name('customers.create');
        Route::post('/create',[CustomerController::class,'store'])->name('customers.store');
        Route::get('/{id}/edit',[CustomerController::class,'edit'])->name('customers.edit');
        Route::post('/{id}/edit',[CustomerController::class,'update'])->name('customers.update');
        Route::get('/{id}/delete',[CustomerController::class,'delete'])->name('customers.delete');
    });
});
//Route::resource('users',TaskController::class)->middleware(['auth']);
//Route::get('logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('auth.logout')->middleware(['auth']);
