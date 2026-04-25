<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout.get');

// Booking routes
Route::post('/bookings', [\App\Http\Controllers\BookingController::class, 'store'])->name('bookings.store');
Route::post('/bookings/{bookingId}/update-status', [\App\Http\Controllers\BookingController::class, 'updateStatus'])->name('bookings.updateStatus');
Route::post('/rooms/{roomId}/mark-cleaned', [\App\Http\Controllers\BookingController::class, 'markRoomCleaned'])->name('rooms.markCleaned')->middleware('auth');

// Guest Booking routes (no authentication required)
Route::get('/bookings/confirmation/{booking_id}/{email}', [\App\Http\Controllers\GuestBookingController::class, 'confirmation'])->name('guest.booking.confirmation');
Route::get('/bookings/lookup', [\App\Http\Controllers\GuestBookingController::class, 'lookup'])->name('guest.booking.lookup');
Route::post('/bookings/search', [\App\Http\Controllers\GuestBookingController::class, 'search'])->name('guest.booking.search');
Route::post('/bookings/view', [\App\Http\Controllers\GuestBookingController::class, 'show'])->name('guest.booking.show');

// Promo Code routes (public for validation on homepage)
Route::post('/api/promo-codes', [\App\Http\Controllers\PromoCodeController::class, 'store'])->name('promo-codes.store')->middleware('auth');

// Admin routes - require authentication and admin role
Route::middleware('auth')->group(function () {
    Route::post('/admin/create-user', [AuthController::class, 'createUserAccount'])->name('admin.create-user');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
});

// Protected routes - require authentication
Route::middleware('auth')->group(function () {
    Route::get('/staff', [StaffController::class, 'dashboard'])->name('staff.dashboard');
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard');
    Route::get('/bookings', [CustomerController::class, 'bookings'])->name('customer.bookings');
});
