<?php
// routes/web.php
use App\Http\Controllers\WelcomeController;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/profil', [WelcomeController::class, 'profil'])->name('profil');


