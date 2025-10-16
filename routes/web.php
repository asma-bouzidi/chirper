<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Home & About pages
Route::get('/', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});

// Products routes
Route::middleware('auth')->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
});

// Include Breeze auth routes (login/register)
require __DIR__.'/auth.php';

Route::get('/dashboard', function() {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
