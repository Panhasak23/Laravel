<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayrollController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('payrolls', PayrollController::class);
