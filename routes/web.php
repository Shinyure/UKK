<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PembukuanController;
use App\Http\Controllers\SessionController;

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
    return view('dashboard');
})->name('dashboard');

Route::resource('absensi', AbsensiController::class)->middleware('admin');
Route::resource('karyawan', KaryawanController::class)->middleware('admin');
Route::resource('pembukuan', PembukuanController::class)->middleware('admin');
Route::get('/login',[SessionController::class, 'index'])->middleware('guest');
Route::get('sesi',[SessionController::class, 'index'])->middleware('guest');
Route::post('/sesi/login',[SessionController::class, 'login'])->middleware('guest');
Route::get('/sesi/logout',[SessionController::class, 'logout']);
Route::post('/absensi/store', [AbsensiController::class, 'store'])->name('absensi.store');
Route::get('/pembukuan/{bulan}', [AbsensiController::class, 'showPembukuan'])->name('pembukuan.show');



// Route untuk tiap bulan
Route::get('/pembukuan/bulan/januari', [PembukuanController::class, 'januari'])->name('pembukuan.januari');
Route::get('/pembukuan/bulan/februari', [PembukuanController::class, 'februari'])->name('pembukuan.februari');
Route::get('/pembukuan/bulan/maret', [PembukuanController::class, 'maret'])->name('pembukuan.maret');
Route::get('/pembukuan/bulan/april', [PembukuanController::class, 'april'])->name('pembukuan.april');
Route::get('/pembukuan/bulan/mei', [PembukuanController::class, 'mei'])->name('pembukuan.mei');
Route::get('/pembukuan/bulan/juni', [PembukuanController::class, 'juni'])->name('pembukuan.juni');
Route::get('/pembukuan/bulan/juli', [PembukuanController::class, 'juli'])->name('pembukuan.juli');
Route::get('/pembukuan/bulan/agustus', [PembukuanController::class, 'agustus'])->name('pembukuan.agustus');
Route::get('/pembukuan/bulan/september', [PembukuanController::class, 'september'])->name('pembukuan.september');
Route::get('/pembukuan/bulan/oktober', [PembukuanController::class, 'oktober'])->name('pembukuan.oktober');
Route::get('/pembukuan/bulan/november', [PembukuanController::class, 'november'])->name('pembukuan.november');
Route::get('/pembukuan/bulan/desember', [PembukuanController::class, 'desember'])->name('pembukuan.desember');


