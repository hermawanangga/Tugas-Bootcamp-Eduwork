<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('products', ProductController::class);
Route::resource('cart', CartController::class)->only([
    'index',
    'store',
    'update',
    'destroy',
]);
Route::resource('categories', CategoryController::class);
