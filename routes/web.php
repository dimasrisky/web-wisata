<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Landing Page
Route::get('/', [ LandingPageController::class, 'index'])->name('landing-page');
Route::get('/about', [ LandingPageController::class, 'about'])->name('about-page');
Route::get('/kota', [ LandingPageController::class, 'daftarKota'])->name('daftar-kota');

// Pendaftaran dan login
Route::group(['middleware' => 'guest'], function(){
    Route::get('/register', [ RegisterController::class, 'register' ])->name('register.form');
    Route::post('/register', [ RegisterController::class, 'tambahUser' ])->name('store.user');
    Route::get('/login', [ LoginController::class, 'index' ])->name('login.form');
    Route::post('/login', [ LoginController::class, 'handle' ])->name('login.handle');
});

// Logout
Route::get('/logout', [ LoginController::class, 'logout' ])->name('logout')->middleware('isAuth');

// Bagian user
Route::get('daftar-wisata', [ HomeController::class, 'index' ])->name('daftar-wisata');
Route::get('details/{id}', [ HomeController::class, 'show' ])->name('details');
Route::group(['prefix' => 'home', 'middleware' => 'isAuth'], function(){
    Route::resource('pesan', PemesananController::class)->only(['show', 'store'])->parameter('pesan', 'id');
    Route::get('cetak', [ PemesananController::class, 'cetakTiket' ])->name('cetakTiket');
});

// Bagian Admin ( CRUD DATA WISATA )
Route::group(['prefix' => 'dashboard', 'middleware' => ['isAuth', 'isAdmin']], function(){
    Route::resource('wisata', WisataController::class);
});