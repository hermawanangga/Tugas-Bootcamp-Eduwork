<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProduk   = Product::count();
        $totalKategori = Category::count();
        $totalKlik     = Product::sum('klik');

        return view('admin.dashboard', compact('totalProduk', 'totalKategori', 'totalKlik'));
    }
}