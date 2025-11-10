<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApplyController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\TwelveDataController;


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


Route::controller(ContactController::class)->group(function () {
    Route::post('/contact-us', 'store');
});

Route::controller(ApplyController::class)->group(function () {
    Route::post('/apply', 'store');
});

Route::get('/realtime-price', [TwelveDataController::class, 'getPrice']);