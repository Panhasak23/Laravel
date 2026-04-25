<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/artisan-report', function () {
    $commands = [
        [
            'command' => 'php artisan list',
            'purpose' => 'Lists all available Artisan commands.',
            'files' => 'None (informational only)'
        ],
        [
            'command' => 'php artisan make:controller UserController',
            'purpose' => 'Generates a new controller in app/Http/Controllers.',
            'files' => 'app/Http/Controllers/UserController.php'
        ],
        [
            'command' => 'php artisan make:model Product',
            'purpose' => 'Creates a new Eloquent model in app/Models.',
            'files' => 'app/Models/Product.php'
        ],
        [
            'command' => 'php artisan make:migration create_products_table',
            'purpose' => 'Generates a new migration file for database schema changes.',
            'files' => 'database/migrations/YYYY_MM_DD_HHMMSS_create_products_table.php'
        ]
    ];

    return view('artisan-report', compact('commands'));
});
