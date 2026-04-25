<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BlogController;

// Landing page - redirect to students
Route::get('/', function () {
    return redirect()->route('students.index');
});

// Student routes
Route::get('/students', [StudentController::class, 'index'])->name('students.index');

// Blog routes
Route::get('/posts', [BlogController::class, 'index'])->name('posts.index');
Route::get('/posts/{id}', [BlogController::class, 'show'])->name('posts.show');

