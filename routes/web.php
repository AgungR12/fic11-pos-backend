<?php

// use App\Http\Controllers\Api\PricingController;

use App\Http\Controllers\CheffController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WorkingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DescriptionController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\SpecialPackageController;
use App\Http\Controllers\SuperiorityController;
use App\Http\Controllers\SuperiorityEventController;
use App\Http\Controllers\WorkController;

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
    Route::resource('profile', ProfileController::class);
    Route::resource('comments', CustomerController::class);
    Route::resource('description', DescriptionController::class);
    Route::resource('pricing', PricingController::class);
    Route::resource('working', WorkingController::class);

    // Admin

    // Staff

    // Products
    Route::resource('products', ProductController::class);
    Route::get('/products/{id}', [ProductController::class, 'deleteProduct']);
    Route::get('/product/foods', [ProductController::class, 'indexFood'])->name('food');
    Route::get('/product/drinks', [ProductController::class, 'indexDrink'])->name('drink');
    Route::get('/product/snacks', [ProductController::class, 'indexSnack'])->name('snack');

    // Orders
    Route::resource('order', OrderController::class);

    // Events
    Route::resource('event', EventController::class);

    //Reservasi
    Route::resource('reservasi', ReservasiController::class);

    //Employee
    Route::resource('employee', EmployeController::class);

    //Work
    Route::resource('work', WorkController::class);

    // Gallery
    Route::resource('gallery', GalleryController::class);

    // Social Media
    Route::resource('social', SocialMediaController::class);

    // Special Package
    Route::resource('special', SpecialPackageController::class);

    // Superiority
    Route::resource('superiority', SuperiorityController::class);
    // Superiority
    Route::resource('superiorityEvent', SuperiorityEventController::class);

});
