<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\guestController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DetailLayananController;

// Halaman Guest
Route::get('/', [guestController::class, 'index'])
    ->name('guest.home');

Route::get('/contact', function () {
    return view('guest.contact');
})->name('guest.contact');

Route::get('/guest', [guestController::class, 'index'])
    ->name('guest.dashboard');

// Login
Route::get('/auth', [AuthController::class, 'index'])
    ->name('auth.index');

Route::post('/auth', [AuthController::class, 'login'])
    ->name('auth.login');

    Route::get('/register', function () {
    return view('guest.register');
})->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.store');

    // Forgot Password
Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])
    ->name('password.request');

Route::post('/forgot-password', [AuthController::class, 'resetPassword'])
    ->name('password.update');

    // Reset Password
Route::get('/reset-password/{token}', [AuthController::class, 'resetPassword'])
    ->name('password.reset');

Route::post('/reset-password', [AuthController::class, 'updatePassword'])
    ->name('password.update');


// Route khusus Admin
Route::middleware(['auth', 'checkrole:Admin'])->group(function () {

    Route::get('/admin', [adminController::class, 'index'])
        ->name('admin.dashboard');

    Route::resource('pelanggan', PelangganController::class);
    Route::resource('paket', PaketController::class);
    Route::resource('reservasi', ReservasiController::class);
    Route::resource('user', UserController::class);
    Route::resource('detail-layanan', DetailLayananController::class);

});

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('auth.logout');


