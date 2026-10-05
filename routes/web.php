<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\guestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', [adminController::class, 'index'])->name('admin.dashboard');

Route::get('/guest', [guestController::class, 'index']);
