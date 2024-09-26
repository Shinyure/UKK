<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PembukuanController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\FormulirController;

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

// Route untuk dashboard
Route::get('/', function () {
    return redirect()->route('sesi.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route resource untuk Absensi, Karyawan, dan Pembukuan dengan middleware 'admin'
Route::resource('absensi', AbsensiController::class)->middleware('admin');
Route::resource('karyawan', KaryawanController::class)->middleware('admin');
Route::resource('pembukuan', PembukuanController::class)->middleware('admin');

// Route untuk sesi/login
Route::get('/login', [SessionController::class, 'index'])->middleware('guest')->name('sesi.index');
Route::get('/sesi', [SessionController::class, 'index'])->middleware('guest');

// Route untuk login, register, dan logout
Route::get('/sesi/login', [SessionController::class, 'index'])->middleware('guest')->name('sesi.index');
Route::post('/sesi/login', [SessionController::class, 'login'])->middleware('guest')->name('sesi.login');
Route::get('/sesi/logout', [SessionController::class, 'logout'])->name('sesi.logout');

// Route untuk register admin baru
Route::get('/sesi/register', [SessionController::class, 'showRegisterForm'])->name('sesi.create');
Route::post('/sesi/register', [SessionController::class, 'register'])->name('sesi.register');
Route::post('/sesi/register', [SessionController::class, 'register'])->name('register.submit');


// Route tambahan untuk absensi dan pembukuan
Route::post('/absensi', [AbsensiController::class, 'store'])->name('absensi.store');
Route::post('/absensi/simpan', [AbsensiController::class, 'simpan'])->name('absensi.simpan');
Route::get('/pembukuan/{bulan}', [PembukuanController::class, 'show'])->name('pembukuan.show');
Route::get('/pembukuan', [PembukuanController::class, 'index'])->name('pembukuan.index');
Route::get('/pembukuans', [PembukuanController::class, 'show'])->name('pembukuan.show');
Route::get('/pembukuan/{id}', [PembukuanController::class, 'show'])->name('pembukuan.show');


// Route Formulir untuk Absen
Route::get('/formulir/create', [FormulirController::class, 'create'])->name('formulir.create');
Route::post('/formulir/store', [FormulirController::class, 'store'])->name('formulir.store');
