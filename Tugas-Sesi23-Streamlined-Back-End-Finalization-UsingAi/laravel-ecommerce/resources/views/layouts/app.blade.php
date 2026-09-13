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

{{-- SUCCESS & VALIDATION ALERT --}}
@include('includes.alert')

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
                        Bunda Footwear
                    </a>

                    <p class="footer-description">
                        Sandal dan sepatu berkualitas untuk seluruh
                        keluarga — dari si kecil sampai orang tua,
                        nyaman dipakai setiap hari.
                    </p>

                    <div class="footer-contact">

                        <div>
                            <i class="bi bi-telephone"></i>
                            <a href="https://wa.me/6283861679625?text=Halo%20Bunda%20Footwear%2C%20saya%20ingin%20bertanya%20tentang%20produk"
                            target="_blank"
                            rel="noopener noreferrer">
                                +62 838 6167 9625
                            </a>
                        </div>

                        <div>
                            <i class="bi bi-envelope"></i>
                            <a href="mailto:herawanangga636@gmail.com?subject=Pertanyaan%20Produk&body=Halo%20Bunda%20Footwear%2C%20saya%20ingin%20bertanya%20tentang">
                                hermawanangga636@gmail.com
                            </a>
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



        </div>


        {{-- ========================= --}}
        {{-- FOOTER BOTTOM --}}
        {{-- ========================= --}}

        <div class="footer-bottom">

            <p>
                © {{ date('Y') }} Bunda Footwear. All rights reserved.
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