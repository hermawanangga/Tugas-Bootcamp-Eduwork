<div>
    <h4 class="fw-semibold mb-1">Informasi Profil</h4>
    <p class="text-muted small mb-4">
        Perbarui nama dan alamat email akun kamu.
    </p>
</div>

<form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
</form>

<form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
    @csrf
    @method('patch')

    <div class="mb-4 text-center text-sm-start">

        @if($user->photoUrl())
            <img src="{{ $user->photoUrl() }}" alt="{{ $user->name }}"
                 class="rounded-circle mb-2" width="90" height="90" style="object-fit: cover;">
        @else
            <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center mb-2"
                 style="width: 90px; height: 90px;">
                <i class="bi bi-person fs-1 text-muted"></i>
            </div>
        @endif

        <div>
            <label for="photo" class="form-label d-block">Foto Profil</label>
            <input type="file" id="photo" name="photo"
                   class="form-control @error('photo') is-invalid @enderror"
                   accept="image/png, image/jpeg, image/jpg">
            @error('photo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input id="name" name="name" type="text"
               class="form-control @error('name') is-invalid @enderror"
               value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input id="email" name="email" type="email"
               class="form-control @error('email') is-invalid @enderror"
               value="{{ old('email', $user->email) }}" required autocomplete="username">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="mt-2">
                <p class="text-muted small mb-1">
                    Alamat email kamu belum terverifikasi.

                    <button form="send-verification" class="btn btn-link btn-sm p-0 align-baseline">
                        Klik di sini untuk kirim ulang email verifikasi.
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                    <p class="text-success small mb-0">
                        Link verifikasi baru telah dikirim ke alamat email kamu.
                    </p>
                @endif
            </div>
        @endif
    </div>

        <div class="mb-3">
        <label for="alamat" class="form-label">Alamat Pengiriman</label>
        <textarea id="alamat" name="alamat" rows="3"
                  class="form-control @error('alamat') is-invalid @enderror"
                  placeholder="Contoh: Jl. Contoh No. 123, RT/RW, Kelurahan, Kecamatan, Kota, Kode Pos">{{ old('alamat', $user->alamat) }}</textarea>
        @error('alamat')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <div class="form-text">
            Alamat ini akan otomatis dipakai saat kamu checkout produk.
        </div>
    </div>
    <div class="d-flex align-items-center gap-3">
        <button type="submit" class="btn btn-dark">Simpan</button>

        @if (session('status') === 'profile-updated')
            <span class="text-success small">Tersimpan.</span>
        @endif
    </div>
</form>