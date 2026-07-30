<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'ini route utama';
});

Route::get('/products', function() {
    return ' ini route produk';
});

Route::get('/cart', function() {
    return ' ini route cart';
});

Route::get('/checkout', function() {
    return ' ini route check out';
});

