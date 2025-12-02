<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriAsetController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AsetController;

// -------------------
// HALAMAN AWAL
// -------------------

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ketua', function () {
    return view('ketua');
});

Route::get('/anggota', function () {
    return view('anggota');
});

// -------------------
// DASHBOARD
// -------------------

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// -------------------
// RESOURCE CONTROLLER
// -------------------

Route::resource('kategoriAset', KategoriAsetController::class);
Route::resource('products', ProductController::class);
Route::resource('aset', AsetController::class);
Route::resource('warga', WargaController::class);

// -------------------
// AUTH
// -------------------

Route::get('/login',  [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

// -------------------
// SLUG PAGE CONTROLLER
// -------------------

Route::get('/{slug}', [PageController::class, 'show'])->where('slug', '.*');
