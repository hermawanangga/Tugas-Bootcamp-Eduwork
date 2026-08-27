<div class="mb-3">
    <label class="form-label">
        Nama Produk
    </label>

    <input type="text"
           name="nama_produk"
           class="form-control @error('nama_produk') is-invalid @enderror"
           value="{{ old('nama_produk', $product->nama_produk ?? '') }}">

           @error('nama_produk')
              <div class="invalid-feedback">
                    {{ $message }}
              </div>
            @enderror
</div>


<div class="mb-3">

    <label class="form-label">
        Harga
    </label>

    <input type="number"
           name="harga"
           class="form-control @error('harga') is-invalid @enderror" 
           value="{{ old('harga', $product->harga ?? '') }}">

            @error('harga')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
</div>


<div class="mb-3">

    <label class="form-label">
        Deskripsi
    </label>

    <textarea name="deskripsi"
              class="form-control @error('deskripsi') is-invalid @enderror"
              rows="4">{{ old('deskripsi', $product->deskripsi ?? '') }}</textarea>

            @error('deskripsi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
</div>


<div class="mb-3">

    <label class="form-label">
        Stok
    </label>

    <input type="number"
           name="stok"
           class="form-control @error('stok') is-invalid @enderror"
           value="{{ old('stok', $product->stok ?? '') }}">

            @error('stok')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
</div>

<div class="mb-3">

    <label class="form-label">
        Kategori
    </label>

    <select name="category_id"
            class="form-select @error('category_id') is-invalid @enderror">

        <option value="">
            -- Pilih Kategori --
        </option>

        @foreach($categories as $category)

            <option value="{{ $category->id }}"
                {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>

                {{ $category->nama_kategori }}

            </option>

        @endforeach

    </select>


    @error('category_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>

<div class="mb-3">

    <label class="form-label">
        Gambar
    </label>

    <input type="file"
           name="gambar"
           class="form-control @error('gambar') is-invalid @enderror">

            @error('gambar')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
</div>


@if(isset($product) && $product->gambar)

<div class="mb-3">

    <img src="{{ asset('storage/'.$product->gambar) }}"
         width="150">

</div>

@endif