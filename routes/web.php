<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TanggapanController;



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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard')->middleware('auth');

Route::resource('role', RoleController::class)->middleware('auth');
Route::resource('permission', PermissionController::class)->middleware('auth');
Route::resource('pengaduan', PengaduanController::class)->middleware('auth');
Route::resource('tanggapan', TanggapanController::class)->middleware('auth');

Route::get('/user/pengaduan', [PengaduanController::class, 'pengaduanUser'])->name('pengaduanUser')->middleware('auth');
Route::get('/laporan', [PengaduanController::class, 'laporan'])->name('laporan')->middleware('auth');
Route::get('/laporan/cetak', [PengaduanController::class, 'pdf'])->name('pdf')->middleware('auth');
