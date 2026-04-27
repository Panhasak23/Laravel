<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayrollController;

Route::get('/', function () {
    return redirect()->route('payrolls.index');
});

Route::resource('payrolls', PayrollController::class);
