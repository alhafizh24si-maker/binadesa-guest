<?php
// routes/web.php
use App\Http\Controllers\WelcomeController;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/profil', [WelcomeController::class, 'profil'])->name('profil');


use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/auth', [AuthController::class, 'index'])->name('auth.index');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
