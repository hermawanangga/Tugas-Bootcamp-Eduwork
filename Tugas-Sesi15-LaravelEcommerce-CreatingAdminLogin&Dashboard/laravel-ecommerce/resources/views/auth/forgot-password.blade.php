<x-guest-layout>

    <div class="auth-forgot">

        {{-- Back --}}
        <a href="{{ route('login') }}" class="auth-back">
            <i class="bi bi-chevron-left"></i>
            Back
        </a>


        {{-- Title --}}
        <h1 class="auth-title">
            Forgot Password
        </h1>

        <p class="auth-subtitle">
            Enter your registered email address. We'll send you a code to
            reset your password.
        </p>


        {{-- Session Status --}}
        <x-auth-session-status
            class="mb-4"
            :status="session('status')"
        />


        {{-- Validation Error --}}
        @if ($errors->any())
            <div class="auth-error-box">
                {{ $errors->first() }}
            </div>
        @endif


        {{-- Form --}}
        <form method="POST" action="{{ route('password.email') }}">

            @csrf

            {{-- Email --}}
            <div class="auth-field">

                <label
                    for="email"
                    class="auth-label"
                >
                    Email Address
                </label>

                <input
                    id="email"
                    class="auth-input"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    autocomplete="email"
                    placeholder="robertfox@example.com"
                >

            </div>


            {{-- Button --}}
            <button
                type="submit"
                class="auth-button"
            >
                Kirim Link Reset Password
            </button>

        </form>

    </div>

</x-guest-layout>