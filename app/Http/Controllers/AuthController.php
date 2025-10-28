<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        // Jika user sudah login, redirect ke dashboard
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('pages.auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 6 karakter'
        ]);

        // Attempt login
        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard')
                ->with('success', 'Login berhasil! Selamat datang di Binadesa.');
        }

        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    // Menampilkan halaman register
    public function showRegisterForm()
    {
        // Jika user sudah login, redirect ke dashboard
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('pages.auth.register');
    }

    // Proses register
    public function register(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'telepon' => 'required|string|max:15',
            'nik' => 'required|string|size:16',
            'alamat' => 'required|string|max:500',
            'password' => 'required|string|min:8|confirmed',
            'terms' => 'required|accepted',
        ], [
            'nama_lengkap.required' => 'Nama lengkap harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'telepon.required' => 'Nomor telepon harus diisi',
            'nik.required' => 'NIK harus diisi',
            'nik.size' => 'NIK harus 16 digit',
            'alamat.required' => 'Alamat harus diisi',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
            'terms.required' => 'Anda harus menyetujui syarat dan ketentuan',
            'terms.accepted' => 'Anda harus menyetujui syarat dan ketentuan',
        ]);

        // Create user
        $user = User::create([
            'name' => $validated['nama_lengkap'],
            'email' => $validated['email'],
            'telepon' => $validated['telepon'],
            'nik' => $validated['nik'],
            'alamat' => $validated['alamat'],
            'password' => Hash::make($validated['password']),
            'role' => 'warga', // Default role
            'status' => 'active', // Default status
        ]);

        // Auto login setelah register
        Auth::login($user);

        return redirect()->route('dashboard')
            ->with('success', 'Pendaftaran berhasil! Selamat datang di Binadesa.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Anda telah berhasil logout.');
    }
}
