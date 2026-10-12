<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\guestController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\ReservasiController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', [adminController::class, 'index'])->name('admin.dashboard');

Route::get('/guest', [guestController::class, 'index']);

Route::resource('pelanggan', PelangganController::class);

Route::resource('paket', PaketController::class);

Route::resource('reservasi', ReservasiController::class);
