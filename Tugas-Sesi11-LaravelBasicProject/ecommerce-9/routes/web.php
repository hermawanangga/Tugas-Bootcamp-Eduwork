<?php

use App\Http\Controllers\Contohcontroller;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/',[Homecontroller::class, 'index']);

Route::get('/products', function() {
    return ' ini route produk';
});

Route::get('/cart', function() {
    return ' ini route cart';
});

Route::get('/checkout', function() {
    return ' ini route check out';
});

Route::get('/contoh', [Contohcontroller::class,'index']);
Route::resource('products-resource', ProductController::class);
