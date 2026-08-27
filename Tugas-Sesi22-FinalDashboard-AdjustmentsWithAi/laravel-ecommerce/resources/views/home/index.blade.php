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
{{-- DEALS OF THE MONTH --}}
{{-- ===================================================== --}}

<section class="deals-section">

    <div class="container">

        <div class="deals-container">

            {{-- ========================= --}}
            {{-- DEAL CONTENT --}}
            {{-- ========================= --}}

            <div class="deals-content">

                <span class="deals-label">
                    LIMITED OFFER
                </span>

                <h2 class="deals-title">
                    Deals of the Month
                </h2>

                <p class="deals-description">
                    Get ready for our amazing deals of the month.
                    Discover your favorite styles and enjoy special
                    offers before the time runs out.
                </p>


                {{-- COUNTDOWN --}}

                <div class="deals-countdown">

                    <div class="countdown-item">
                        <strong id="deal-days">120</strong>
                        <span>Days</span>
                    </div>

                    <div class="countdown-item">
                        <strong id="deal-hours">18</strong>
                        <span>Hrs</span>
                    </div>

                    <div class="countdown-item">
                        <strong id="deal-minutes">15</strong>
                        <span>Mins</span>
                    </div>

                    <div class="countdown-item">
                        <strong id="deal-seconds">10</strong>
                        <span>Secs</span>
                    </div>

                </div>


                {{-- BUTTON --}}

                <a href="{{ route('products.index') }}"
                   class="btn btn-dark deals-button">

                    View All Products

                    <i class="bi bi-arrow-right ms-2"></i>

                </a>

            </div>


            {{-- ========================= --}}
            {{-- DEAL IMAGE --}}
            {{-- ========================= --}}

            <div class="deals-image-wrapper">

                <img
                    src="{{ asset('storage/images/hero-women.png') }}"
                    alt="Deals of the Month"
                    class="deals-image"
                >

            </div>

        </div>

    </div>

</section>

    {{-- ===================================================== --}}
{{-- CUSTOMER TESTIMONIALS --}}
{{-- ===================================================== --}}

<section class="testimonial-section">

    <div class="container">

        {{-- HEADER --}}
        <div class="testimonial-header">

            <h2 class="testimonial-title">
                What our Customer say's
            </h2>

            <div class="testimonial-arrows">

                <button type="button" class="testimonial-arrow">
                    <i class="bi bi-arrow-left"></i>
                </button>

                <button type="button" class="testimonial-arrow active">
                    <i class="bi bi-arrow-right"></i>
                </button>

            </div>

        </div>


        {{-- TESTIMONIAL LIST --}}
        <div class="testimonial-wrapper">

            <div class="row g-4 testimonial-slider">

                {{-- TESTIMONIAL 1 --}}
                <div class="col-lg-4 col-md-6">

                    <div class="testimonial-card">

                        <div class="testimonial-rating">
                            ★★★★★
                        </div>

                        <p class="testimonial-text">
                            It is a long established fact that a reader
                            will be distracted by the readable content
                            of a page when looking at its layout.
                        </p>

                        <div class="testimonial-user">

                            <div class="testimonial-avatar">
                                <i class="bi bi-person"></i>
                            </div>

                            <div>
                                <strong>
                                    John Alexander
                                </strong>

                                <span>
                                    Client
                                </span>
                            </div>

                        </div>

                    </div>

                </div>


                {{-- TESTIMONIAL 2 --}}
                <div class="col-lg-4 col-md-6">

                    <div class="testimonial-card">

                        <div class="testimonial-rating">
                            ★★★★★
                        </div>

                        <p class="testimonial-text">
                            It is a long established fact that a reader
                            will be distracted by the readable content
                            of a page when looking at its layout.
                        </p>

                        <div class="testimonial-user">

                            <div class="testimonial-avatar">
                                <i class="bi bi-person"></i>
                            </div>

                            <div>
                                <strong>
                                    Jane Dunn
                                </strong>

                                <span>
                                    Client
                                </span>
                            </div>

                        </div>

                    </div>

                </div>


                {{-- TESTIMONIAL 3 --}}
                <div class="col-lg-4 col-md-6">

                    <div class="testimonial-card">

                        <div class="testimonial-rating">
                            ★★★★★
                        </div>

                        <p class="testimonial-text">
                            It is a long established fact that a reader
                            will be distracted by the readable content
                            of a page when looking at its layout.
                        </p>

                        <div class="testimonial-user">

                            <div class="testimonial-avatar">
                                <i class="bi bi-person"></i>
                            </div>

                            <div>
                                <strong>
                                    James Wilson
                                </strong>

                                <span>
                                    Client
                                </span>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

{{-- ===================================================== --}}
{{-- OUR INSTAGRAM STORIES --}}
{{-- ===================================================== --}}

<section class="instagram-section" id="our-story">

    <div class="container">

        {{-- SECTION TITLE --}}
        <div class="instagram-header">

            <h2 class="instagram-title">
                Our Instagram Stories
            </h2>

        </div>


        {{-- INSTAGRAM STORIES --}}
        <div class="row g-3 instagram-grid">

            {{-- INSTAGRAM 1 --}}
            <div class="col-6 col-md-3">

                <div class="instagram-card">

                    <div class="instagram-image-wrapper">

                        <img
                            src="{{ asset('storage/images/instagram-1.jpg') }}"
                            alt="Instagram Story 1"
                            class="instagram-image"
                        >

                    </div>


                </div>

            </div>


            {{-- INSTAGRAM 2 --}}
            <div class="col-6 col-md-3">

                <div class="instagram-card">

                    <div class="instagram-image-wrapper">

                        <img
                            src="{{ asset('storage/images/instagram-2.jpg') }}"
                            alt="Instagram Story 2"
                            class="instagram-image"
                        >

                    </div>

                </div>

            </div>


            {{-- INSTAGRAM 3 --}}
            <div class="col-6 col-md-3">

                <div class="instagram-card">

                    <div class="instagram-image-wrapper">

                        <img
                            src="{{ asset('storage/images/instagram-3.jpg') }}"
                            alt="Instagram Story 3"
                            class="instagram-image"
                        >

                    </div>

                </div>

            </div>


            {{-- INSTAGRAM 4 --}}
            <div class="col-6 col-md-3">

                <div class="instagram-card">

                    <div class="instagram-image-wrapper">

                        <img
                            src="{{ asset('storage/images/instagram-4.jpg') }}"
                            alt="Instagram Story 4"
                            class="instagram-image"
                        >

                    </div>

                </div>

            </div>

        </div>

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
                            Free Shipping
                        </h3>

                        <p>
                            Free shipping for orders above $100
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
                            Money Guarantee
                        </h3>

                        <p>
                            Within 30 days for an exchange
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
                            Online Support
                        </h3>

                        <p>
                            24 hours a day, 7 days a week
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
                            Flexible Payment
                        </h3>

                        <p>
                            Pay with multiple payment methods
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