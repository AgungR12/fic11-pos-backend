<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\DescriptionController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\GalleryController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PricingController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\ReservasiController;
use App\Http\Controllers\Api\SocialMediaController;
use App\Http\Controllers\Api\SpecialController;
use App\Http\Controllers\Api\SuperiorityController;
use App\Http\Controllers\Api\WorkingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//post login
Route::post('login', [AuthController::class, 'login']);

// post logout
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// api resource product
Route::apiResource('products', ProductController::class)->middleware('auth:sanctum');

// api resource order
Route::apiResource('orders', OrderController::class)->middleware('auth:sanctum');

// api resource pricing
Route::apiResource('pricing', PricingController::class);

// api resource description
Route::apiResource('desc', DescriptionController::class);

// api resource comments
Route::apiResource('comment', CustomerController::class);

// api resource profile
Route::apiResource('profile', ProfileController::class);

// api resource working
Route::apiResource('working', WorkingController::class);

// api resource superiority
Route::apiResource('superiority', SuperiorityController::class);

// api resource menu
Route::apiResource('menu', ProductController::class);

// api resource special package
Route::apiResource('special', SpecialController::class);

// api resource events
Route::apiResource('event', EventController::class);

// api resource reservasi
Route::apiResource('reservasi', ReservasiController::class);

// api resource gallery
Route::apiResource('gallery', GalleryController::class);

// api resource employee
Route::apiResource('employee', EmployeeController::class);

// api resource social media
Route::apiResource('social', SocialMediaController::class);

