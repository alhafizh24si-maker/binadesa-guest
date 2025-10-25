<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriberitaController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/profil', [WelcomeController::class, 'profil'])->name('profil');

Route::get('/auth', [AuthController::class, 'index'])->name('auth.index');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route untuk Kategori Berita
Route::prefix('kategoriberita')->name('kategoriberita.')->group(function () {
    Route::get('/', [KategoriberitaController::class, 'index'])->name('index');
    Route::get('/create', [KategoriberitaController::class, 'create'])->name('create');
    Route::post('/', [KategoriberitaController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [KategoriberitaController::class, 'edit'])->name('edit');
    Route::put('/{id}', [KategoriberitaController::class, 'update'])->name('update');
    Route::delete('/{id}', [KategoriberitaController::class, 'destroy'])->name('destroy');
});

// Route untuk Warga - DIPINDAHKAN KE LUAR GRUP KATEGORIBERITA
Route::prefix('warga')->name('warga.')->group(function () {
    Route::get('/', [WargaController::class, 'index'])->name('index');
    Route::get('/create', [WargaController::class, 'create'])->name('create');
    Route::post('/', [WargaController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [WargaController::class, 'edit'])->name('edit');
    Route::put('/{id}', [WargaController::class, 'update'])->name('update');
    Route::delete('/{id}', [WargaController::class, 'destroy'])->name('destroy');
});
