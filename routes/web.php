<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ChirpController;


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

Route::middleware(['auth'])->group(function () {
    Route::get('/chirps', [ChirpController::class, 'index'])->name('chirps.index');
    Route::get('/chirps/create', [ChirpController::class, 'create'])->name('chirps.create');
    Route::post('/chirps', [ChirpController::class, 'store'])->name('chirps.store');
    Route::get('/chirps/{chirp}/edit', [ChirpController::class, 'edit'])->name('chirps.edit');
    Route::put('/chirps/{chirp}', [ChirpController::class, 'update'])->name('chirps.update');
    Route::delete('/chirps/{chirp}', [ChirpController::class, 'destroy'])->name('chirps.destroy');
});
