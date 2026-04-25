<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/**
 * Product Catalog Route
 * 
 * Displays a list of products using Blade templating directives:
 * - @extends: Uses the main layout file
 * - @foreach: Loops through the mock product data
 * - @if/@else: Conditional logic for stock status
 */
Route::get('/products', function () {
    // Mock product data - array of products with name, price, and stock
    $products = [
        ['name' => 'Laptop', 'price' => 999.99, 'stock' => 5],
        ['name' => 'Smartphone', 'price' => 699.99, 'stock' => 12],
        ['name' => 'Tablet', 'price' => 449.99, 'stock' => 8],
        ['name' => 'Smartwatch', 'price' => 299.99, 'stock' => 0],
        ['name' => 'Wireless Headphones', 'price' => 149.99, 'stock' => 25],
        ['name' => 'Gaming Console', 'price' => 499.99, 'stock' => 3],
    ];
    
    // Pass the products array to the view
    return view('products', ['products' => $products]);
});
