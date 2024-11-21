<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SubmissionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Single root route that handles both authenticated and guest users
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('form.show');
    }
    return redirect()->route('login');
});

// Guest routes (only accessible when NOT logged in)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

// Protected routes (only accessible when logged in)
Route::middleware('auth')->group(function () {
    Route::get('/form', [SubmissionController::class, 'show'])->name('form.show');
    Route::post('/form', [SubmissionController::class, 'submit'])->name('form.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});