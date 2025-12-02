<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\kategoriAsetController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\wargaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('welcome'); });
    
Route::get('/ketua', function () {
    return view('ketua');
});

Route::get('/anggota', function () {
    return view('anggota');
});

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('kategoriAset', kategoriAsetController::class);
Route::resource('products', \App\Http\Controllers\ProductController::class);


/////////
Route::get('/bina', [DashboardController::class, 'index']);
Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);
// Catch-all: try to load views/pages/{slug}.blade.php
Route::get('/  ', [PageController::class, 'show'])->where('slug', '.*');

Route::resource('kategoriAset', kategoriAsetController::class);Route::resource('products', \App\Http\Controllers\ProductController::class);
//--------------------------------------------------------------------------//
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

Route::get('/sample-page', function () {
    return view('other.sample');
})->name('sample.page');

Route::resource('kategoriAset', KategoriAsetController::class);

Route::resource('aset', AsetController::class);

Route::resource('warga', WargaController::class);

