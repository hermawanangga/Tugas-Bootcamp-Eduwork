<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title', config('app.name', 'Krist'))
    </title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
          rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    {{-- CSS & JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    {{-- Navbar Website --}}
    @include('includes.navbar')

    {{-- SUCCESS ALERT --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show custom-alert"
            role="alert">

            <i class="bi bi-check-circle-fill me-2"></i>

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close">
            </button>

        </div>
    @endif
    {{-- Konten Halaman --}}
    @yield('content')

    {{-- ===================================================== --}}
{{-- FOOTER --}}
{{-- ===================================================== --}}

<footer class="site-footer">

    <div class="container">

        <div class="row footer-main">

            {{-- ========================= --}}
            {{-- BRAND --}}
            {{-- ========================= --}}

            <div class="col-lg-4 col-md-6">

                <div class="footer-brand">

                    <a href="{{ route('home') }}" class="footer-logo">
                        KRIST
                    </a>

                    <p class="footer-description">
                        Discover timeless fashion pieces designed
                        to bring confidence, comfort, and style
                        into your everyday life.
                    </p>

                    <div class="footer-contact">

                        <div>
                            <i class="bi bi-telephone"></i>
                            <span>+62 812 3456 7890</span>
                        </div>

                        <div>
                            <i class="bi bi-envelope"></i>
                            <span>hello@krist.com</span>
                        </div>

                        <div>
                            <i class="bi bi-geo-alt"></i>
                            <span>Tangerang, Indonesia</span>
                        </div>

                    </div>

                </div>

            </div>


            {{-- ========================= --}}
            {{-- INFORMATION --}}
            {{-- ========================= --}}

            <div class="col-6 col-lg-2 col-md-3">

                <div class="footer-column">

                    <h3>
                        Information
                    </h3>

                    <ul>

                        <li>
                            <a href="{{ route('home') }}">
                                Home
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('products.index') }}">
                                Shop
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                About Us
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                Contact
                            </a>
                        </li>

                    </ul>

                </div>

            </div>


            {{-- ========================= --}}
            {{-- CUSTOMER SERVICE --}}
            {{-- ========================= --}}

            <div class="col-6 col-lg-2 col-md-3">

                <div class="footer-column">

                    <h3>
                        Customer Service
                    </h3>

                    <ul>

                        <li>
                            <a href="#">
                                My Account
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                Shipping
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                Returns
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                FAQ
                            </a>
                        </li>

                    </ul>

                </div>

            </div>


            {{-- ========================= --}}
            {{-- SUBSCRIBE --}}
            {{-- ========================= --}}

            <div class="col-lg-4 col-md-12">

                <div class="footer-subscribe">

                    <h3>
                        Subscribe
                    </h3>

                    <p>
                        Subscribe to our newsletter and get
                        updates about our latest products
                        and special offers.
                    </p>


                    <form class="subscribe-form">

                        <input
                            type="email"
                            placeholder="Enter your email"
                        >

                        <button type="submit">
                            <i class="bi bi-arrow-right"></i>
                        </button>

                    </form>


                    <div class="footer-social">

                        <a href="#" aria-label="Instagram">
                            <i class="bi bi-instagram"></i>
                        </a>

                        <a href="#" aria-label="Facebook">
                            <i class="bi bi-facebook"></i>
                        </a>

                        <a href="#" aria-label="Twitter">
                            <i class="bi bi-twitter-x"></i>
                        </a>

                        <a href="#" aria-label="TikTok">
                            <i class="bi bi-tiktok"></i>
                        </a>

                    </div>

                </div>

            </div>

        </div>


        {{-- ========================= --}}
        {{-- FOOTER BOTTOM --}}
        {{-- ========================= --}}

        <div class="footer-bottom">

            <p>
                © {{ date('Y') }} Krist. All rights reserved.
            </p>

            <div class="footer-bottom-links">

                <a href="#">
                    Privacy Policy
                </a>

                <a href="#">
                    Terms & Conditions
                </a>

            </div>

        </div>

    </div>

</footer>
</body>

</html>