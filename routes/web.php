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
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('auth/logout', [AuthController::class, 'logout'] )->name('auth.logout');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/register', [AuthController::class, 'showRegister'])->name('auth.register');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register.process');


//Route::resource('user', UserController::class);

Route::resource('user', UserController::class)
->middleware('checkislogin');

//Route::resource('user', UserController::class)
//->middleware('checkrole:Admin');

Route::put('/user/{id}/hapus-foto', [UserController::class, 'hapusFoto'])->name('user.hapus-foto');
Route::resource('lokasiAset', lokasiAsetController::class);
Route::resource('pemeliharaanAset', pemeliharaanAsetController::class);
Route::resource('mutasiAset', mutasiAsetController::class);
