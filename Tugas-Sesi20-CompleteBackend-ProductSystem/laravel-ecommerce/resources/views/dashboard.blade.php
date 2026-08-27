@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="container py-5">

    {{-- WELCOME --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body p-4">

            <h2 class="fw-semibold mb-2">
                Halo, {{ Auth::user()->name }}! 👋
            </h2>

            <p class="text-muted mb-4">
                Selamat datang di dashboard Krist Ecommerce.
                Silakan mulai berbelanja dan temukan produk favoritmu.
            </p>

            <a
                href="{{ route('products.index') }}"
                class="btn btn-dark"
            >
                <i class="bi bi-bag me-2"></i>
                Mulai Belanja
            </a>

        </div>

    </div>


    {{-- STAT CARD --}}
    <div class="row g-4 mb-4">

        {{-- PESANAN --}}
        <div class="col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <p class="text-muted small mb-1">
                                Total Pesanan
                            </p>

                            <h3 class="fw-semibold mb-0">
                                {{ $totalPesanan }}
                            </h3>

                        </div>

                        <div class="fs-2 text-secondary">
                            <i class="bi bi-box-seam"></i>
                        </div>

                    </div>

                    <p class="text-muted small mt-3 mb-0">
                        {{ $totalPesanan > 0 ? $totalPesanan . ' pesanan tercatat' : 'Belum ada pesanan' }}
                    </p>

                </div>

            </div>

        </div>


        {{-- KERANJANG --}}
        <div class="col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <p class="text-muted small mb-1">
                                Keranjang
                            </p>

                            <h3 class="fw-semibold mb-0">
                                {{ $totalKeranjang }}
                            </h3>

                        </div>

                        <div class="fs-2 text-secondary">
                            <i class="bi bi-cart3"></i>
                        </div>

                    </div>

                    <p class="text-muted small mt-3 mb-0">
                        {{ $totalKeranjang > 0 ? $totalKeranjang . ' item di keranjang' : 'Keranjang masih kosong' }}
                    </p>

                </div>

            </div>

        </div>


        {{-- WISHLIST --}}
        <div class="col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <p class="text-muted small mb-1">
                                Wishlist
                            </p>

                            <h3 class="fw-semibold mb-0">
                                {{ $totalWishlist }}
                            </h3>

                        </div>

                        <div class="fs-2 text-secondary">
                            <i class="bi bi-heart"></i>
                        </div>

                    </div>

                    <p class="text-muted small mt-3 mb-0">
                        {{ $totalWishlist > 0 ? $totalWishlist . ' produk di wishlist' : 'Belum ada wishlist' }}
                    </p>

                </div>

            </div>

        </div>

    </div>


    {{-- QUICK MENU --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <h4 class="fw-semibold mb-4">
                Menu Saya
            </h4>


            <div class="row g-4">

                {{-- SHOP --}}
                <div class="col-md-4">

                    <a
                        href="{{ route('products.index') }}"
                        class="text-decoration-none text-dark"
                    >

                        <div class="border rounded-3 p-4 h-100">

                            <i class="bi bi-shop fs-2"></i>

                            <h5 class="fw-semibold mt-3">
                                Belanja Produk
                            </h5>

                            <p class="text-muted small mb-0">
                                Lihat dan pilih produk yang tersedia.
                            </p>

                        </div>

                    </a>

                </div>


                {{-- CART --}}
                <div class="col-md-4">

                    <a
                        href="{{ route('cart.index') }}"
                        class="text-decoration-none text-dark"
                    >

                        <div class="border rounded-3 p-4 h-100">

                            <i class="bi bi-cart3 fs-2"></i>

                            <h5 class="fw-semibold mt-3">
                                Keranjang
                            </h5>

                            <p class="text-muted small mb-0">
                                Lihat produk yang ada di keranjang.
                            </p>

                        </div>

                    </a>

                </div>


                {{-- PROFILE --}}
                <div class="col-md-4">

                    <a
                        href="{{ route('profile.edit') }}"
                        class="text-decoration-none text-dark"
                    >

                        <div class="border rounded-3 p-4 h-100">

                            <i class="bi bi-person fs-2"></i>

                            <h5 class="fw-semibold mt-3">
                                Profil Saya
                            </h5>

                            <p class="text-muted small mb-0">
                                Kelola informasi akun kamu.
                            </p>

                        </div>

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection