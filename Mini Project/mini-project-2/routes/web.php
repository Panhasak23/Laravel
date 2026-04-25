<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/env-demo', function () {        
    return view('/env-demo', [
        'appName' => config('app.name'),
        'appEnv' => config('app.env'),
    ]);
})->name('home');