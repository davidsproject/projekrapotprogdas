<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PelaporanController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\KategoriController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes(['register'=>true]);

Route::get('/', [PelaporanController::class, 'welcome'])->name('welcome');
Route::get('/profile', [PelaporanController::class, 'profile'])->name('profile');
Route::get('/search', [PelaporanController::class, 'search'])->name('search');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::resource('siswa', SiswaController::class)->middleware('auth');
Route::resource('pelaporan', PelaporanController::class); // mendapatkan auth spesial tertentu
Route::resource('aspirasi', AspirasiController::class)->middleware('auth');
Route::resource('kategori', KategoriController::class)->middleware('auth');
