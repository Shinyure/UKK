<?php

namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    // Menampilkan halaman login
    public function index() {
        return view('sesi.index');
    }

    // Proses login
    public function login(Request $request) {
        Session::flash('email', $request->email);

        // Validasi input login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Masukkan Email!',
            'email.email' => 'Format email tidak valid!',
            'password.required' => 'Masukkan Password!',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // Cek kredensial login
        if (Auth::attempt($infologin)) {
            return redirect('absensi')->with('success', 'Selamat Datang');
        } else {
            return redirect('sesi')->with('failed', 'Username atau Password salah');
        }
    }

    // Proses logout
    public function logout() {
        Auth::logout();
        return redirect('sesi')->with('success', 'Anda berhasil logout.');
    }

    // Menampilkan form registrasi
    public function showRegisterForm() {
        // Pastikan file sesi/create.blade.php ada di dalam resources/views/sesi
        return view('sesi.create'); 
    }

    // Proses registrasi
    public function register(Request $request) {
        // Validasi input form registrasi
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ], [
            'name.required' => 'Nama wajib diisi!',
            'email.required' => 'Email wajib diisi!',
            'email.unique' => 'Email sudah terdaftar!',
            'password.required' => 'Password wajib diisi!',
            'password.confirmed' => 'Konfirmasi password tidak sesuai!',
            'password.min' => 'Password minimal 6 karakter!',
        ]);
    
        // Debug untuk memeriksa input yang diterima
        \Log::info($request->all());

        // Membuat akun admin baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirect ke halaman login dengan pesan sukses
        return redirect('/sesi/login')->with('success', 'Akun admin berhasil dibuat, silakan login.');
    }
}
