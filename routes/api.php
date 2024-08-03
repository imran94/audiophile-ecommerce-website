<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CartProductController;
use App\Models\CartProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return response([]);
});
Route::post('/cart-products', [CartProductController::class, 'create'])->name('addToCart');
Route::get('/cart/{id}', [CartController::class, 'getById'])->name('getCartById');
Route::put('/cart/{id}/cart-products', [CartProductController::class, 'update'])->name('updateCartProduct');
Route::delete('/cart/{id}/cart-products', [CartProductController::class, 'removeAll'])->name('emptyCart');
Route::delete('/cart/{id}', [CartController::class, 'completeCheckout'])->name('completeCheckout');
