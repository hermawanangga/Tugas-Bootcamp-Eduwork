@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')

<div class="container py-5">

    {{-- HEADER --}}
    <div class="mb-4">
        <h2 class="fw-bold mb-1">Dashboard Admin</h2>
        <p class="text-muted mb-0">Ringkasan data toko Krist Ecommerce.</p>
    </div>


    {{-- RINGKASAN --}}
    <div class="row g-4">

        {{-- JUMLAH PRODUK --}}
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100" style="background-color:#eaf3ff;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted small mb-1 fw-semibold">Jumlah Produk</p>
                            <h3 class="fw-bold mb-0">{{ number_format($totalProduk, 0, ',', '.') }}</h3>
                        </div>
                        <div class="fs-2 text-primary"><i class="bi bi-box-seam"></i></div>
                    </div>
                    <p class="text-muted small mt-3 mb-0">Total produk yang tersedia di sistem.</p>
                </div>
            </div>
        </div>

        {{-- JUMLAH KLIK PRODUK --}}
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100" style="background-color:#eafaf0;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted small mb-1 fw-semibold">Jumlah Klik Produk</p>
                            <h3 class="fw-bold mb-0">{{ number_format($totalKlik, 0, ',', '.') }}</h3>
                        </div>
                        <div class="fs-2 text-success"><i class="bi bi-cursor"></i></div>
                    </div>
                    <p class="text-muted small mt-3 mb-0">Total klik pada produk yang telah dilihat pengguna.</p>
                </div>
            </div>
        </div>

        {{-- JUMLAH KATEGORI PRODUK --}}
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100" style="background-color:#fff6e6;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted small mb-1 fw-semibold">Jumlah Kategori Produk</p>
                            <h3 class="fw-bold mb-0">{{ number_format($totalKategori, 0, ',', '.') }}</h3>
                        </div>
                        <div class="fs-2 text-warning"><i class="bi bi-tags"></i></div>
                    </div>
                    <p class="text-muted small mt-3 mb-0">Total kategori produk yang tersedia di sistem.</p>
                </div>
            </div>
        </div>

    </div>


    {{-- QUICK MENU KELOLA --}}
    <div class="card border-0 shadow-sm mt-4">
        <div class="card-body p-4">
            <h4 class="fw-semibold mb-4">Kelola Data</h4>
            <div class="row g-4">

                <div class="col-md-6">
                    <a href="{{ route('admin.products.index') }}" class="text-decoration-none text-dark">
                        <div class="border rounded-3 p-4 h-100">
                            <i class="bi bi-box-seam fs-2"></i>
                            <h5 class="fw-semibold mt-3">Kelola Produk</h5>
                            <p class="text-muted small mb-0">Tambah, ubah, atau hapus produk.</p>
                        </div>
                    </a>
                </div>

                <div class="col-md-6">
                    <a href="{{ route('admin.categories.index') }}" class="text-decoration-none text-dark">
                        <div class="border rounded-3 p-4 h-100">
                            <i class="bi bi-tags fs-2"></i>
                            <h5 class="fw-semibold mt-3">Kelola Kategori</h5>
                            <p class="text-muted small mb-0">Tambah, ubah, atau hapus kategori produk.</p>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>

</div>

@endsection