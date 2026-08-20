<div class="mb-3">

    <label class="form-label">
        Nama Kategori
    </label>

    <input type="text"
           name="nama_kategori"
           class="form-control @error('nama_kategori') is-invalid @enderror"
           value="{{ old('nama_kategori', $category->nama_kategori ?? '') }}">

    @error('nama_kategori')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

    {{-- Gambar Kategori --}}
    <div class="mt-3">

        <label class="form-label">
            Gambar Kategori
        </label>

        <input type="file"
            name="gambar"
            class="form-control @error('gambar') is-invalid @enderror"
            accept="image/*">

        @error('gambar')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>
</div>