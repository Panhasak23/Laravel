<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

// Show login form
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');

// Handle login
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Show registration form
Route::get('/register', [LoginController::class, 'showRegistrationForm'])->name('register');

// Handle registration
Route::post('/register', [LoginController::class, 'register'])->name('register.post');

// Dashboard (protected route - any authenticated user)
Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard')->middleware('auth');

// Admin panel (admin only)
Route::get('/admin', function () {
    return '<div style="padding: 40px; font-family: Arial; background: white; max-width: 800px; margin: 50px auto; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);"><h1 style="color: #f57c00;">Admin Panel</h1><p>🔒 Welcome to Admin section! Only admins can access this.</p><a href="/dashboard">Back to Dashboard</a></div>';
})->name('admin')->middleware(['auth', 'role:admin']);

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
