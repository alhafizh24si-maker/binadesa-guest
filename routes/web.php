<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\KategoriberitaController;
use App\Http\Controllers\UserController;
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

    // Kategori Berita - Sesuai dengan controller yang ada
    Route::get('/kategoriberita', [KategoriberitaController::class, 'index'])->name('kategoriberita.index');
    Route::get('/kategoriberita/create', [KategoriberitaController::class, 'create'])->name('kategoriberita.create');
    Route::post('/kategoriberita', [KategoriberitaController::class, 'store'])->name('kategoriberita.store');
    Route::get('/kategoriberita/{id}', [KategoriberitaController::class, 'show'])->name('kategoriberita.show');
    Route::get('/kategoriberita/{id}/edit', [KategoriberitaController::class, 'edit'])->name('kategoriberita.edit');
    Route::put('/kategoriberita/{id}', [KategoriberitaController::class, 'update'])->name('kategoriberita.update');
    Route::delete('/kategoriberita/{id}', [KategoriberitaController::class, 'destroy'])->name('kategoriberita.destroy');

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

// Route untuk halaman utama (guest)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Fallback route
Route::fallback(function () {
    return redirect('/login');
});
