<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.auth.auth-login');
});

Route::middleware(['auth'])->group(function(){
    Route::get('home', function(){
        return view('pages.dashboard.dashboard');
    })->name('home');
    Route::resource('user', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('order', OrderController::class);
    // Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('/products/{id}', [ProductController::class, 'deleteProduct']);
});
