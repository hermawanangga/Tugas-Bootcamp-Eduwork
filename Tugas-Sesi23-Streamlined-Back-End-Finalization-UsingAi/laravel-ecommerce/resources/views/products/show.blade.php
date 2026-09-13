@extends('layouts.app')

@section('title', $product->nama_produk)

@section('content')

<div class="container mt-4 mb-5">

    {{-- BREADCRUMB --}}
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb small mb-0">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}" class="text-decoration-none text-muted">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('products.index') }}" class="text-decoration-none text-muted">Shop</a>
            </li>
            @if($product->category)
                <li class="breadcrumb-item">
                    <a href="{{ route('categories.show', $product->category) }}" class="text-decoration-none text-muted">
                        {{ $product->category->nama_kategori }}
                    </a>
                </li>
            @endif
            <li class="breadcrumb-item active" aria-current="page">
                {{ $product->nama_produk }}
            </li>
        </ol>
    </nav>


    <div class="row g-5">

        {{-- ========================= --}}
        {{-- GAMBAR PRODUK --}}
        {{-- ========================= --}}
        <div class="col-md-6">

            @if($product->gambar)
                <img src="{{ asset('storage/'.$product->gambar) }}"
                     class="img-fluid rounded shadow-sm w-100"
                     style="object-fit: cover; max-height: 520px;"
                     alt="{{ $product->nama_produk }}">
            @else
                <div class="d-flex align-items-center justify-content-center bg-light rounded shadow-sm"
                     style="height: 420px;">
                    <span class="text-muted">Tidak ada gambar</span>
                </div>
            @endif

        </div>


        {{-- ========================= --}}
        {{-- INFO PRODUK --}}
        {{-- ========================= --}}
        <div class="col-md-6">

            @if($product->category)
                <span class="badge bg-light text-dark border mb-2">
                    {{ $product->category->nama_kategori }}
                </span>
            @endif

            <h2 class="fw-bold mb-3">
                {{ $product->nama_produk }}
            </h2>

            <h3 class="fw-bold mb-3">
                Rp {{ number_format($product->harga, 0, ',', '.') }}
            </h3>

            <p class="text-muted small mb-4">
                Stok tersedia:
                <strong>{{ $product->stok }}</strong>
            </p>

            <hr>

            <p class="mb-4" style="line-height: 1.8;">
                {{ $product->deskripsi }}
            </p>


            @auth
                <form action="{{ route('cart.store') }}" method="POST" id="addToCartForm">

                    @csrf

                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    {{-- PILIHAN WARNA --}}
                    @if($product->colors)
                        <div class="mb-4">
                            <label class="form-label fw-semibold small">Warna</label>
                            <div class="d-flex flex-wrap">
                                @foreach(explode(',', $product->colors) as $index => $color)
                                    <label class="variant-option">
                                        <input type="radio" name="color" value="{{ trim($color) }}" required {{ $index === 0 ? 'checked' : '' }}>
                                        <span>{{ trim($color) }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- PILIHAN UKURAN --}}
                    @if($product->sizes)
                        <div class="mb-4">
                            <label class="form-label fw-semibold small">Ukuran</label>
                            <div class="d-flex flex-wrap">
                                @foreach(explode(',', $product->sizes) as $index => $size)
                                    <label class="variant-option">
                                        <input type="radio" name="size" value="{{ trim($size) }}" required {{ $index === 0 ? 'checked' : '' }}>
                                        <span>{{ trim($size) }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- QUANTITY SELECTOR --}}

                <form action="{{ route('wishlist.toggle') }}" method="POST" class="mb-3">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit"
                            class="btn {{ in_array($product->id, $wishlistedIds) ? 'btn-danger' : 'btn-outline-danger' }} w-100"
                            title="{{ in_array($product->id, $wishlistedIds) ? 'Hapus dari wishlist' : 'Tambah ke wishlist' }}">
                        <i class="bi {{ in_array($product->id, $wishlistedIds) ? 'bi-heart-fill' : 'bi-heart' }} me-2"></i>
                        {{ in_array($product->id, $wishlistedIds) ? 'Tersimpan di Wishlist' : 'Tambah ke Wishlist' }}
                    </button>
                </form>

            @else

                <div class="d-flex gap-2 mb-3">
                    <a href="{{ route('login', ['reason' => 'buy']) }}" class="btn btn-outline-dark flex-grow-1">
                        Login untuk membeli
                    </a>
                </div>

            @endauth


            <a href="{{ route('products.index') }}" class="btn btn-link text-muted ps-0">
                <i class="bi bi-arrow-left me-1"></i>
                Kembali ke Shop
            </a>

        </div>

    </div>


    {{-- ========================= --}}
    {{-- RELATED PRODUCTS --}}
    {{-- ========================= --}}
    @if($relatedProducts->count() > 0)

        <div class="mt-5 pt-4 border-top">

            <h4 class="fw-bold mb-4">Related Products</h4>

            <div class="row g-4">

                @foreach($relatedProducts as $related)
                <div class="col-6 col-md-3">

                    <div class="card h-100 border-0 shadow-sm">

                        <a href="{{ route('products.show', $related->id) }}" class="text-decoration-none text-dark d-flex flex-column flex-grow-1">

                            @if($related->gambar)
                                <img src="{{ asset('storage/'.$related->gambar) }}"
                                     class="card-img-top"
                                     alt="{{ $related->nama_produk }}"
                                     style="height: 180px; object-fit: cover;">
                            @else
                                <div class="d-flex align-items-center justify-content-center bg-light"
                                     style="height: 180px;">
                                    <span class="text-muted small">Tidak ada gambar</span>
                                </div>
                            @endif

                            <div class="card-body flex-grow-1">
                                <h6 class="fw-semibold mb-1">{{ $related->nama_produk }}</h6>
                                <p class="fw-bold mb-0 small">Rp {{ number_format($related->harga, 0, ',', '.') }}</p>
                            </div>

                        </a>

                    </div>

                </div>
                @endforeach

            </div>

        </div>

    @endif

</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {

        const qtyInput = document.getElementById('qtyInput');
        const qtyMinus = document.getElementById('qtyMinus');
        const qtyPlus  = document.getElementById('qtyPlus');

        if (qtyInput && qtyMinus && qtyPlus) {

            qtyMinus.addEventListener('click', function () {
                let value = parseInt(qtyInput.value) || 1;
                const min = parseInt(qtyInput.min) || 1;

                if (value > min) {
                    qtyInput.value = value - 1;
                }
            });

            qtyPlus.addEventListener('click', function () {
                let value = parseInt(qtyInput.value) || 1;
                const max = parseInt(qtyInput.max) || 999;

                if (value < max) {
                    qtyInput.value = value + 1;
                }
            });

        }

    });
</script>

@endsection