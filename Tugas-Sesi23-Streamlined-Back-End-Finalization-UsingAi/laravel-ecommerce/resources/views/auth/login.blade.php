<x-guest-layout>

    {{-- Success Alert --}}
    @if (session('success'))
        <div class="auth-alert auth-alert-success">

            <i class="bi bi-check-circle-fill"></i>

            <span>
                {{ session('success') }}
            </span>

        </div>
    @endif

    {{-- Warning Alert --}}
    @php
        $warningMessage = session('warning');

        if (! $warningMessage && request('reason') === 'buy') {
            $warningMessage = 'Silakan login terlebih dahulu untuk melakukan pembelian.';
        }
    @endphp

    @if ($warningMessage)
        <div class="auth-alert auth-alert-warning">

            <i class="bi bi-exclamation-triangle-fill"></i>

            <span>
                {{ $warningMessage }}
            </span>

        </div>
    @endif

    {{-- Session Status --}}
    <x-auth-session-status
        class="mb-4"
        :status="session('status')"
    />

    <div class="auth-login">

        <h1 class="auth-title">
            Selamat Datang 👋
        </h1>

        <p class="auth-subtitle">
            Silakan masuk ke akun Anda untuk melanjutkan.
        </p>


        <form method="POST" action="{{ route('login') }}">

            @csrf


            {{-- Email --}}
            <div class="auth-field">

                <label
                    for="email"
                    class="auth-label"
                >
                    Email
                </label>

                <input
                    id="email"
                    class="auth-input"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    autocomplete="username"
                >

                @error('email')
                    <div class="auth-error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- Password --}}
            <div class="auth-field">

                <label
                    for="password"
                    class="auth-label"
                >
                    Password
                </label>

                <input
                    id="password"
                    class="auth-input"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                >

                @error('password')
                    <div class="auth-error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- Remember + Forgot --}}
            <div class="auth-options">

                <label
                    for="remember_me"
                    class="auth-remember"
                >

                    <input
                        id="remember_me"
                        type="checkbox"
                        name="remember"
                    >

                    <span>
                        Ingat saya
                    </span>

                </label>


                @if (Route::has('password.request'))

                    <a
                        href="{{ route('password.request') }}"
                        class="auth-link"
                    >
                        Lupa password?
                    </a>

                @endif

            </div>


            {{-- Login Button --}}
            <button
                type="submit"
                class="auth-button"
            >
                Masuk
            </button>

        </form>


        {{-- Register --}}
        <div class="auth-bottom">

            Belum punya akun?

            <a href="{{ route('register') }}">
                Daftar sekarang
            </a>

        </div>

    </div>

</x-guest-layout>