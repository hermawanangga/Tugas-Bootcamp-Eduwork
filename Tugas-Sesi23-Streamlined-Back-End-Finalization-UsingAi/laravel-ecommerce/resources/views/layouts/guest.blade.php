<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ config('app.name', 'Bunda Footwear') }}
    </title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">

    <link
        href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
        rel="stylesheet"
    >

    {{-- Bootstrap Icons --}}
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
    >

    {{-- CSS & JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>


<body class="auth-page">

    <div class="auth-container">

        {{-- ========================= --}}
        {{-- IMAGE --}}
        {{-- ========================= --}}

        <div class="auth-image">

            @if (request()->routeIs('login'))

                <img
                    src="{{ asset('storage/images/login-bundafootwear.jpeg') }}"
                    alt="Login"
                    style="
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                    "
                >

            @else

                <img
                    src="{{ asset('storage/images/register-bundafootwear.jpeg') }}"
                    alt="Register"
                    style="
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                    "
                >

            @endif


            {{-- Logo --}}
            <a
                href="{{ url('/') }}"
                class="auth-logo"
            >
                Bunda Footwear
            </a>

        </div>


        {{-- ========================= --}}
        {{-- FORM --}}
        {{-- ========================= --}}

        <div class="auth-form-wrapper">

            <div class="auth-form">

                {{ $slot }}

            </div>

        </div>

    </div>

</body>

</html>