<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use App\Http\Controllers\AuthController;

Route::inertia('/', 'auth/Login')->name('home'); 

Route::inertia('/register-page', 'auth/Register');
Route::inertia('/login-page', 'auth/Login');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';

Route::post('/register-custom', [AuthController::class, 'register']);
Route::post('/login-custom', [AuthController::class, 'login']);