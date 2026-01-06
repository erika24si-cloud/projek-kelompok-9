<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\kategoriAsetController;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\lokasiAsetController;
use App\Http\Controllers\pemeliharaanAsetController;
use App\Http\Controllers\mutasiAsetController;

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/ketua', function () {
    return view('ketua');
});

Route::get('/ketua', function () {
    return view('ketua');
});

Route::get('/anggota', function () {
    return view('anggota');
});

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('products', \App\Http\Controllers\ProductController::class);

Route::resource('kategori-aset', kategoriAsetController::class);
Route::resource('aset', AsetController::class);
Route::resource('lokasi-aset', lokasiAsetController::class);
Route::resource('pemeliharaan-aset', pemeliharaanAsetController::class);
Route::resource('mutasi-aset', mutasiAsetController::class);
