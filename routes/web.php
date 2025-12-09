<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriberitaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use Illuminate\Support\Facades\Route;

// Route untuk guest (belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
});

// Route yang membutuhkan authentication
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard')
        ->middleware('checkislogin');

    // Data Warga
    Route::resource('warga', WargaController::class);

     Route::middleware(['auth', 'checkrole:Admin'])->group(function () {
    Route::resource('user', UserController::class);
    });
    // Berita Routes - SINGLE RESOURCE
    Route::resource('berita', BeritaController::class);

    // Route tambahan untuk berita - HANYA SATU KALI
    Route::post('/berita/{berita}/upload-gallery', [BeritaController::class, 'uploadGallery'])
        ->name('berita.uploadGallery');

    Route::delete('/berita/{berita}/file/{file}', [BeritaController::class, 'deleteFile'])
        ->name('berita.deleteFile');

    // Kategori Berita
    Route::resource('kategoriberita', KategoriBeritaController::class);

    // Logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout.get');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Fallback route
Route::fallback(function () {
    return redirect('/login');
});
