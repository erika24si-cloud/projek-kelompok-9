<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
<<<<<<< Updated upstream

Route::get('/', function () {
    return view('welcome');
=======
use App\Http\Controllers\kategoriAsetController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('welcome'); });
    
Route::get('/ketua', function () {
    return view('ketua');
>>>>>>> Stashed changes
});

Route::get('/anggota', function () {
    return view('anggota');
});

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
<<<<<<< Updated upstream
=======

Route::resource('kategoriAset', kategoriAsetController::class);
Route::resource('products', \App\Http\Controllers\ProductController::class);


/////////
Route::get('/bina', [DashboardController::class, 'index']);
Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);
// Catch-all: try to load views/pages/{slug}.blade.php
Route::get('/  ', [PageController::class, 'show'])->where('slug', '.*');
>>>>>>> Stashed changes
