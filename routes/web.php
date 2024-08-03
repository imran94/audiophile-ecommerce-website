<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/categories/{slug}', [CategoryController::class, 'show'])->name('category');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('product');
Route::get('/checkout/{id}', [CartController::class, 'showCheckout'])->name('checkout');
