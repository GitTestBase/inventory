<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
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

Route::middleware('guest')->get('/', function () {
    return view('login');
})->name('login');

Route::post('login-check',[AuthController::class,'login'])->name('login-check');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard',[AuthController::class,'dashboard'])->name('dashboard');

    Route::get('/product',[ProductController::class,'index'])->name('product');
    Route::post('/add-prod',[ProductController::class,'add_product'])->name('add-prod');


    Route::get('/category',[ProductController::class,'index'])->name('category');

});