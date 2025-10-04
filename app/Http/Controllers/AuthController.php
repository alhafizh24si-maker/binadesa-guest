<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('login-form');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        // Validasi panjang password
        if (strlen($password) < 3) {
            return redirect('/auth')->with('error', 'Password harus minimal 3 karakter');
        }

        // Validasi huruf kapital dalam password
        if (!preg_match('/[A-Z]/', $password)) {
            return redirect('/auth')->with('error', 'Password harus mengandung huruf kapital');
        }

        // Validasi username dan password sama
        if ($username === $password) {
            return view('welcome')->with('message', 'Login berhasil! Selamat datang ' . $username);
        } else {
            return redirect('/auth')->with('error', 'Username dan password harus sama');
        }
    }
}
