<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilDesaController;
use App\Http\Controllers\KategoriberitaController;

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
Route::middleware(['auth', 'checkrole:Super Admin, Admin'])->group(function () {
Route::resource('warga', WargaController::class);
});

Route::middleware(['auth', 'checkrole:Super Admin'])->group(function () {
    Route::resource('user', UserController::class);
});

// Berita Routes - SINGLE RESOURCE
Route::middleware(['auth', 'checkrole:Super Admin, Admin'])->group(function () {
Route::resource('berita', BeritaController::class);
});

// Route tambahan untuk berita - HANYA SATU KALI
Route::post('/berita/{berita}/upload-gallery', [BeritaController::class, 'uploadGallery'])
    ->name('berita.uploadGallery');

Route::delete('/berita/{berita}/file/{file}', [BeritaController::class, 'deleteFile'])
    ->name('berita.deleteFile');

// Kategori Berita
Route::middleware(['auth', 'checkrole:Super Admin, Admin'])->group(function () {
Route::resource('kategoriberita', KategoriBeritaController::class);
});

// Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout.get');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'checkrole:Super Admin, Admin'])->group(function () {
Route::resource('profildesa', ProfilDesaController::class);
});

Route::middleware(['auth', 'checkrole:Super Admin, Admin'])->group(function () {
Route::resource('agenda', AgendaController::class);
});

Route::middleware(['auth', 'checkrole:Super Admin, Admin'])->group(function () {
Route::resource('galeri', GaleriController::class);
});

Route::group(['prefix' => 'galeri', 'as' => 'galeri.'], function () {
    // Upload multiple images dari halaman show
    Route::post('{id}/upload-images', [GaleriController::class, 'uploadImages'])->name('uploadImages');

    // Delete single file
    Route::delete('{galeriId}/file/{fileId}', [GaleriController::class, 'deleteFile'])->name('deleteFile');

    // Update sort order
    Route::post('{galeriId}/sort-order', [GaleriController::class, 'updateSortOrder'])->name('updateSortOrder');
});


// Fallback route
Route::fallback(function () {
    return redirect('/login');
});
