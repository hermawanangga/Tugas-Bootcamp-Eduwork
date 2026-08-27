@extends('layouts.app')

@section('title', 'Shop')

@section('content')

<div class="container py-5">

    <div class="mb-4">
        <h1 class="fw-bold mb-1">Shop</h1>
        <p class="text-muted mb-0">Temukan produk favoritmu di Krist Ecommerce.</p>
    </div>

    {{-- SEARCH --}}
    <form action="{{ route('products.index') }}" method="GET" class="mb-4">
        <div class="input-group" style="max-width: 400px;">
            <input type="text"
                   name="search"
                   value="{{ $search }}"
                   class="form-control"
                   placeholder="Cari produk...">

            <button type="submit" class="btn btn-dark">
                <i class="bi bi-search"></i>
            </button>

            @if($search)
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                    Reset
                </a>
            @endif
        </div>
    </form>

    {{-- GRID PRODUK --}}
    <div class="row g-4">

        @forelse($products as $product)
        <div class="col-6 col-md-4 col-lg-3">

            <div class="card h-100 border-0 shadow-sm">

                <a href="{{ route('products.show', $product->id) }}" class="text-decoration-none text-dark">

                    @if($product->gambar)
                        <img src="{{ asset('storage/'.$product->gambar) }}"
                             class="card-img-top"
                             alt="{{ $product->nama_produk }}"
                             style="height: 200px; object-fit: cover;">
                    @else
                        <div class="d-flex align-items-center justify-content-center bg-light"
                             style="height: 200px;">
                            <span class="text-muted small">Tidak ada gambar</span>
                        </div>
                    @endif

                    <div class="card-body">

                        @if($product->category)
                            <p class="text-muted small mb-1">{{ $product->category->nama_kategori }}</p>
                        @endif

                        <h6 class="fw-semibold mb-1">{{ $product->nama_produk }}</h6>

                        <p class="fw-bold mb-0">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>

                    </div>

                </a>

<div class="card-footer bg-white border-0 pt-0">

    <div class="d-flex gap-2">

        @auth
            <form action="{{ route('cart.store') }}" method="POST" class="flex-grow-1">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit" class="btn btn-dark btn-sm w-100">
                    + Keranjang
                </button>
            </form>
        @else
            <a href="{{ route('login') }}" class="btn btn-outline-dark btn-sm w-100 flex-grow-1">
                Login untuk membeli
            </a>
        @endauth

        @auth
            <form action="{{ route('wishlist.toggle') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit"
                        class="btn btn-sm {{ in_array($product->id, $wishlistedIds) ? 'btn-danger' : 'btn-outline-danger' }}"
                        title="{{ in_array($product->id, $wishlistedIds) ? 'Hapus dari wishlist' : 'Tambah ke wishlist' }}">
                    <i class="bi {{ in_array($product->id, $wishlistedIds) ? 'bi-heart-fill' : 'bi-heart' }}"></i>
                </button>
            </form>
        @else
            <a href="{{ route('login') }}" class="btn btn-outline-danger btn-sm" title="Login untuk menggunakan Wishlist">
                <i class="bi bi-heart"></i>
            </a>
        @endauth

    </div>

</div>

            </div>

        </div>
        @empty
        <div class="col-12">
            <p class="text-muted text-center py-5">
                @if($search)
                    Tidak ada produk yang cocok dengan pencarian "{{ $search }}".
                @else
                    Belum ada produk tersedia.
                @endif
            </p>
        </div>
        @endforelse

    </div>

    <div class="d-flex justify-content-center mt-4 mb-5">
        {{ $products->links() }}
    </div>

</div>

@endsection