<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', config('app.name'))</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
    ])
</head>
<body>

    @include('includes.navbar')

    <main class="min-vh-100">
        @include('includes.alert')
        @yield('content')
    </main>

    @include('includes.footer')

    @stack('scripts')

</body>
</html>