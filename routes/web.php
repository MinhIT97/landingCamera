<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

// Landing Page
Route::get('/', function () {
    return view('landing');
});

// API endpoint to store bookings from form
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

// Admin panel routes
Route::get('/admin/login', [BookingController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [BookingController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/bookings', [BookingController::class, 'index'])->name('admin.bookings');
Route::post('/admin/bookings/{id}/status', [BookingController::class, 'updateStatus'])->name('admin.bookings.status');
Route::delete('/admin/bookings/{id}', [BookingController::class, 'destroy'])->name('admin.bookings.delete');
Route::get('/admin/logout', [BookingController::class, 'logout'])->name('admin.logout');
