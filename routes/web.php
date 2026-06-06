<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

// 1. MEW CAMERA Subdomain Group
Route::domain(env('MEW_CAMERA_DOMAIN', 'mewcamera.gymmap.shop'))->group(function () {
    Route::get('/', function () {
        return view('mew_landing');
    });
    Route::post('/booking', [BookingController::class, 'store'])->name('mew.booking.store');
});

// 2. PRE CAMERA Subdomain Group
Route::domain(env('PRE_CAMERA_DOMAIN', 'precamera.gymmap.shop'))->group(function () {
    Route::get('/', function () {
        return view('landing');
    });
    Route::post('/booking', [BookingController::class, 'store'])->name('pre.booking.store');
});

// Fallback / Localhost direct routes
Route::get('/', function () {
    return view('landing');
});
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

// Admin panel routes (shared across domains)
Route::prefix('admin')->group(function () {
    Route::get('/login', [BookingController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [BookingController::class, 'login'])->name('admin.login.submit');
    Route::get('/bookings', [BookingController::class, 'index'])->name('admin.bookings');
    Route::post('/bookings/{id}/status', [BookingController::class, 'updateStatus'])->name('admin.bookings.status');
    Route::delete('/bookings/{id}', [BookingController::class, 'destroy'])->name('admin.bookings.delete');
    Route::get('/logout', [BookingController::class, 'logout'])->name('admin.logout');
});
