<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\guestController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

// Halaman Guest
Route::get('/', function () {
    return view('guest.dashboard');
})->name('guest.home');

Route::get('/contact', function () {
    return view('guest.contact');
})->name('guest.contact');

// Dashboard Admin
Route::get('/admin', [adminController::class, 'index'])
    ->name('admin.dashboard');

// Halaman Guest alternatif
Route::get('/guest', [guestController::class, 'index'])
    ->name('guest.dashboard');

// CRUD
Route::resource('pelanggan', PelangganController::class);
Route::resource('paket', PaketController::class);
Route::resource('reservasi', ReservasiController::class);
Route::resource('user', UserController::class);

// Login
Route::get('/auth', [AuthController::class, 'index'])
    ->name('auth.index');

Route::post('/auth', [AuthController::class, 'login'])
    ->name('auth.login');
