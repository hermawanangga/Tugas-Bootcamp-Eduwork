@extends('layouts.app')

@section('title', 'Home')

@section('content')

{{-- ===================================================== --}}
{{-- HERO SECTION --}}
{{-- ===================================================== --}}

<section class="hero-section" id="home">

    <div class="container">

        <div class="row align-items-center hero-content">

            {{-- HERO TEXT --}}
            <div class="col-lg-6">

                <div class="hero-text">

                    <span class="hero-label">
                        DARI BUNDA, UNTUK KELUARGA
                    </span>

                    <h1>
                        Sandal Sepatu
                        <span>Untuk Keluarga</span>
                    </h1>

                    <p>
                        Dari si kecil sampai orang tua, temukan sandal
                        dan sepatu yang pas untuk setiap anggota
                        keluarga.
                    </p>

                    <div class="hero-buttons">

                        <a href="{{ route('products.index') }}"
                           class="btn btn-dark btn-shop">
                            Belanja Sekarang
                            <i class="bi bi-arrow-right ms-2"></i>
                        </a>

                        <a href="{{ route('categories.index') }}"
                           class="btn btn-outline-dark btn-explore">
                            Lihat Kategori
                        </a>

                    </div>

                </div>

            </div>


            {{-- HERO IMAGE --}}
            <div class="col-lg-6">

                <div class="hero-image-wrapper">

                    {{-- Decorative Circle --}}
                    <div class="hero-circle"></div>

                    <img src="{{ asset('storage/images/hero-image-women.jpeg') }}"
                         alt="Sandal & Sepatu Keluarga"
                         class="hero-image">

                    {{-- Floating Information Card --}}
                    <div class="hero-floating-card">

                        <span class="floating-small">
                            FAVORIT
                        </span>

                        <strong>
                            Sandal Anak
                        </strong>

                        <span class="floating-discount">
                            Stok Terbatas
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

            @if($categories->count() > 5)

                <div class="category-arrows">

                    <button type="button" class="category-arrow">
                        <i class="bi bi-arrow-left"></i>
                    </button>

                    <button type="button" class="category-arrow active">
                        <i class="bi bi-arrow-right"></i>
                    </button>

                </div>

            @endif

        </div>


        <div class="category-slider-wrapper">

            <div class="row g-3 category-slider">

                @foreach($categories as $category)

                    <div class="col-6 col-md-3">

                        <a href="{{ route('categories.show', $category) }}"
                           class="category-card">

                            @if($category->gambar)

                                <img
                                    src="{{ asset('storage/' . $category->gambar) }}"
                                    alt="{{ $category->nama_kategori }}"
                                    class="category-image"
                                >

                            @else

                                <div class="category-placeholder">

                                    <i class="bi bi-image"></i>

                                    <span>
                                        Belum ada gambar
                                    </span>

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

{{-- ===================================================== --}}
{{-- SERVICE BENEFITS --}}
{{-- ===================================================== --}}

<section class="benefits-section">

    <div class="container">

        <div class="row benefits-row">

            {{-- FREE SHIPPING --}}
            <div class="col-6 col-lg-3">

                <div class="benefit-item">

                    <div class="benefit-icon">
                        <i class="bi bi-truck"></i>
                    </div>

                    <div class="benefit-content">

                        <h3>
                            Gratis Ongkir 
                        </h3>

                        <p>
                            Gratis Ongkir untuk pesanan khusus area Kabupaten Tangerang & minimal pesanan Rp. 100.000
                        </p>

                    </div>

                </div>

            </div>


            {{-- MONEY GUARANTEE --}}
            <div class="col-6 col-lg-3">

                <div class="benefit-item">

                    <div class="benefit-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>

                    <div class="benefit-content">

                        <h3>
                            Jaminan Pesanan
                        </h3>

                        <p>
                            Dalam 7 hari jika pesanan belum sampai uang kembali
                        </p>

                    </div>

                </div>

            </div>


            {{-- ONLINE SUPPORT --}}
            <div class="col-6 col-lg-3">

                <div class="benefit-item">

                    <div class="benefit-icon">
                        <i class="bi bi-headset"></i>
                    </div>

                    <div class="benefit-content">

                        <h3>
                            Dukungan Online
                        </h3>

                        <p>
                            24 jam sehari, 7 hari seminggu
                        </p>

                    </div>

                </div>

            </div>


            {{-- FLEXIBLE PAYMENT --}}
            <div class="col-6 col-lg-3">

                <div class="benefit-item">

                    <div class="benefit-icon">
                        <i class="bi bi-credit-card"></i>
                    </div>

                    <div class="benefit-content">

                        <h3>
                            Pembayaran Fleksibel
                        </h3>

                        <p>
                            Bayar dengan berbagai metode pembayaran
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const slider = document.querySelector('.category-slider');

    const prevButton = document.querySelector('.category-arrow:first-child');
    const nextButton = document.querySelector('.category-arrow:last-child');

    if (!slider || !prevButton || !nextButton) {
        return;
    }

    let currentPosition = 0;

    const cards = slider.children;

    function getVisibleCards() {
        if (window.innerWidth < 576) {
            return 1;
        }

        return 2;
    }

    function updateSlider() {

        const visibleCards = getVisibleCards();
        const totalCards = cards.length;

        const maxPosition = Math.max(
            0,
            totalCards - visibleCards
        );

        if (currentPosition > maxPosition) {
            currentPosition = maxPosition;
        }

        const cardWidth = cards[0].offsetWidth;

        const gap = parseFloat(
            getComputedStyle(slider).columnGap
        ) || 0;

        const moveDistance = cardWidth + gap;

        slider.style.transform =
            `translateX(-${currentPosition * moveDistance}px)`;
    }


    nextButton.addEventListener('click', function () {

        const visibleCards = getVisibleCards();
        const maxPosition = Math.max(
            0,
            cards.length - visibleCards
        );

        if (currentPosition < maxPosition) {
            currentPosition++;
            updateSlider();
        }

    });


    prevButton.addEventListener('click', function () {

        if (currentPosition > 0) {
            currentPosition--;
            updateSlider();
        }

    });


    window.addEventListener('resize', function () {
        updateSlider();
    });

});
</script>
@endsection