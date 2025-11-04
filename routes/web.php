<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriberitaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use Illuminate\Support\Facades\Route;

// Route untuk guest (belum login)
Route::middleware('guest')->group(function () {
    // Halaman login
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

    // Proses login
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

    // Halaman register
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

    // Proses register
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
});

// Route yang membutuhkan authentication
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Data Warga - Resource Controller
    Route::get('/warga', [WargaController::class, 'index'])->name('warga.index');
    Route::get('/warga/create', [WargaController::class, 'create'])->name('warga.create');
    Route::post('/warga', [WargaController::class, 'store'])->name('warga.store');
    Route::get('/warga/{id}', [WargaController::class, 'show'])->name('warga.show');
    Route::get('/warga/{id}/edit', [WargaController::class, 'edit'])->name('warga.edit');
    Route::put('/warga/{id}', [WargaController::class, 'update'])->name('warga.update');
    Route::delete('/warga/{id}', [WargaController::class, 'destroy'])->name('warga.destroy');



    // Manajemen User - Resource Controller
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    // Logout - GET route untuk logout dari link
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout.get');

    // Logout - POST route untuk logout dari form
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Fallback route
Route::fallback(function () {
    return redirect('/login');
});

//Route Resource
Route::resource('kategoriberita', KategoriBeritaController::class);
