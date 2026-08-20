@extends('layouts.app')

@section('title', 'Home')

@section('content')

{{-- ===================================================== --}}
{{-- HERO SECTION --}}
{{-- ===================================================== --}}

<section class="hero-section">

    <div class="container">

        <div class="row align-items-center hero-content">

            {{-- HERO TEXT --}}
            <div class="col-lg-6">

                <div class="hero-text">

                    <span class="hero-label">
                        NEW SEASON COLLECTION
                    </span>

                    <h1>
                        Discover Your
                        <span>Perfect Style.</span>
                    </h1>

                    <p>
                        Explore our latest collection designed to
                        bring confidence, comfort, and style into
                        your everyday look.
                    </p>

                    <div class="hero-buttons">

                        <a href="{{ route('products.index') }}"
                           class="btn btn-dark btn-shop">
                            Shop Now
                            <i class="bi bi-arrow-right ms-2"></i>
                        </a>

                        <a href="{{ route('products.index') }}"
                           class="btn btn-outline-dark btn-explore">
                            Explore Collection
                        </a>

                    </div>

                </div>

            </div>


            {{-- HERO IMAGE --}}
            <div class="col-lg-6">

                <div class="hero-image-wrapper">

                    {{-- Decorative Circle --}}
                    <div class="hero-circle"></div>

                    <img src="{{ asset('storage/images/hero-women.png') }}"
                         alt="Women's Fashion Collection"
                         class="hero-image">

                    {{-- Floating Information Card --}}
                    <div class="hero-floating-card">

                        <span class="floating-small">
                            TRENDING
                        </span>

                        <strong>
                            Women's Collection
                        </strong>

                        <span class="floating-discount">
                            Up to 40% Off
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

{{-- Shop by Categories --}}
<section class="categories-section">

    <div class="container">

        <div class="categories-header">

            <h2 class="section-title">
                Shop by Categories
            </h2>

            <div class="category-arrows">

                <button type="button" class="category-arrow">
                    <i class="bi bi-arrow-left"></i>
                </button>

                <button type="button" class="category-arrow active">
                    <i class="bi bi-arrow-right"></i>
                </button>

            </div>

        </div>


        <div class="row g-3">

            @foreach($categories as $category)

                @php
                    $categoryProduct = $category->products->first();
                @endphp

                <div class="col-6 col-md-3">

                    <a href="{{ route('products.index') }}"
                       class="category-card">

                        @if($categoryProduct && $categoryProduct->gambar)

                            <img
                                src="{{ asset('storage/' . $categoryProduct->gambar) }}"
                                alt="{{ $category->nama_kategori }}"
                                class="category-image"
                            >

                        @else

                            <div class="category-placeholder">
                                <i class="bi bi-image"></i>
                            </div>

                        @endif


                        <div class="category-name">
                            {{ $category->nama_kategori }}
                        </div>

                    </a>

                </div>

            @endforeach

        </div>

    </div>

</section>
{{-- ===================================================== --}}
{{-- PRODUK TERBARU --}}
{{-- ===================================================== --}}

<section class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="mb-0">
            Produk Terbaru
        </h2>

        <a href="{{ route('products.index') }}"
           class="btn btn-outline-dark">
            Lihat Semua
        </a>

    </div>


    <div class="row">

        @forelse($products as $product)

            <div class="col-md-4 mb-4">

                <div class="card h-100 shadow-sm">

                    @if($product->gambar)

                        <img src="{{ asset('storage/'.$product->gambar) }}"
                             class="card-img-top"
                             style="height:250px; object-fit:cover;"
                             alt="{{ $product->nama_produk }}">

                    @else

                        <div class="bg-secondary text-white text-center p-5">
                            Tidak ada gambar
                        </div>

                    @endif


                    <div class="card-body">

                        <h5 class="card-title">
                            {{ $product->nama_produk }}
                        </h5>

                        <p class="card-text">
                            {{ $product->category->nama_kategori ?? '-' }}
                        </p>

                        <h5 class="text-dark">
                            Rp {{ number_format($product->harga, 0, ',', '.') }}
                        </h5>

                    </div>


                    <div class="card-footer bg-white">

                        <a href="{{ route('products.show', $product->id) }}"
                           class="btn btn-dark w-100">
                            Lihat Detail
                        </a>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="alert alert-info">
                    Belum ada produk.
                </div>

            </div>

        @endforelse

    </div>

</section>

@endsection