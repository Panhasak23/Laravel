<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

// Practice 1: Basic routes
Route::get('/', function () {
	return 'Welcome';
});

Route::get('/about', function () {
	return 'About Page';
});

Route::get('/contact', function () {
	return 'Contact Page';
});

// Practice 2: Route parameter and named route
Route::get('/user/{name}', function (string $name) {
	return "Hello {$name}";
})->name('user.greet');

// Assignment 1: Optional parameter with default and numeric constraint
Route::get('/product/{id?}', function (?int $id = 100) {
	return "Product ID: {$id}";
})->whereNumber('id');

// Assignment 2: Middleware practice
Route::get('/dashboard', function () {
	return 'Dashboard: Access granted';
})->middleware('auth');

// Mini-Project 2: Admin panel routing with prefix and middleware
Route::prefix('admin')->middleware('auth')->group(function () {
	Route::get('/users', function () {
		return 'Admin users list';
	})->name('admin.users');

	Route::get('/settings', function () {
		return 'Admin settings page';
	})->name('admin.settings');
});

// Mini-Project 1: Student info routes
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/student/{id}', [StudentController::class, 'show'])->name('student.show');