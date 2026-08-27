<x-guest-layout>

    <div class="auth-register">

        <h1 class="auth-title">
            Buat Akun Baru
        </h1>

        <p class="auth-subtitle">
            Daftar sekarang untuk mulai berbelanja di Krist.
        </p>


        <form method="POST" action="{{ route('register') }}">

            @csrf


            {{-- Nama --}}
            <div class="auth-field">

                <label
                    for="name"
                    class="auth-label"
                >
                    Nama
                </label>

                <input
                    id="name"
                    class="auth-input"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autofocus
                    autocomplete="name"
                >

                @error('name')
                    <div class="auth-error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


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
                    autocomplete="new-password"
                >

                @error('password')
                    <div class="auth-error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- Konfirmasi Password --}}
            <div class="auth-field">

                <label
                    for="password_confirmation"
                    class="auth-label"
                >
                    Konfirmasi Password
                </label>

                <input
                    id="password_confirmation"
                    class="auth-input"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                >

                @error('password_confirmation')
                    <div class="auth-error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- Register Button --}}
            <button
                type="submit"
                class="auth-button"
            >
                Daftar
            </button>

        </form>


        {{-- Login --}}
        <div class="auth-bottom">

            Sudah punya akun?

            <a href="{{ route('login') }}">
                Masuk sekarang
            </a>

        </div>

    </div>

</x-guest-layout>