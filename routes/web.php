<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SsoController;

// Halaman utama tester yang menampilkan tombol login
Route::get('/', function () {
    return view('auth.login');
})->name('login');

// Jalur rute pemicu redirect dan callback penangkap data
Route::get('/auth/sso/redirect', [SsoController::class, 'redirect'])->name('sso.redirect');
Route::get('/auth/sso/callback', [SsoController::class, 'callback']);
