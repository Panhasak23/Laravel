<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

route::get('/about', function () {            
    return view('about');
});

Route::get('/contact', function () {            
    return view('contact');
});

Route::get('/user/{name}', function ($name) {        
    return ('Hello, ' . $name);
})->name('user./{id}');

Route::get('/user/{id}', function ($id) {        
    return "";
})->name('user./{id}');

