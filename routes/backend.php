<?php

use App\Http\Controllers\Web\Backend\ApplyController;
use App\Http\Controllers\Web\Backend\ContactUsController;
use App\Http\Controllers\Web\Backend\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


Route::controller(ContactUsController::class)->group(function () {
    Route::get('/contact-us', 'index')->name('admin.contact_us.index');
    Route::delete('/contact-us/{id}', 'destroy')->name('admin.contact_us.destroy');
});

Route::controller(ApplyController::class)->group(function () {
    Route::get('/apply', 'index')->name('admin.apply_user.index');
    Route::delete('/apply/{id}', 'destroy')->name('admin.apply_user.destroy');
});