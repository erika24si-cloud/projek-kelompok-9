<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\kategoriAsetController;
use App\Http\Controllers\AsetController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login-halaman-anda', function () {
    return view('auth.login');
})->name('login');

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

Route::get('/register-halaman-anda', function () {
    return view('auth.register');
})->name('register');

Route::get('/logout-halaman-anda', function () {
    return view('auth.logout');
})->name('logout');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

Route::get('/sample-page', function () {
    return view('other.sample');
})->name('sample.page');

Route::resource('kategoriAset', KategoriAsetController::class);

Route::resource('aset', AsetController::class);
