<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\kategoriAsetController;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\lokasiAsetController;
use App\Http\Controllers\pemeliharaanAsetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\mutasiAsetController;

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

Route::resource('warga', WargaController::class);

Route::get('auth', [AuthController::class, 'index'] )->name('auth');
Route::get('auth/login', [AuthController::class, 'login'] )->name('auth.login');
Route::post('auth/logout', [AuthController::class, 'logout'] )->name('auth.logout');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::resource('user', UserController::class)
->middleware('checkislogin');

//Route::resource('user', UserController::class)
//->middleware('checkrole:Super Admin');


Route::resource('lokasiAset', lokasiAsetController::class);
Route::resource('pemeliharaanAset', pemeliharaanAsetController::class);
Route::resource('mutasiAset', mutasiAsetController::class);
