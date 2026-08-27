@extends('layouts.app')

@section('title', $category->nama_kategori)

@section('content')

<div class="container py-5">

    <div class="mb-4">
        <a href="{{ route('categories.index') }}" class="text-decoration-none text-muted small">
            &larr; Kembali ke Kategori
        </a>
        <h1 class="fw-bold mt-2 mb-0">{{ $category->nama_kategori }}</h1>
    </div>

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
                        <h6 class="fw-semibold mb-1">{{ $product->nama_produk }}</h6>
                        <p class="fw-bold mb-0">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                    </div>

                </a>

                <div class="card-footer bg-white border-0 pt-0">
                    @auth
                        <form action="{{ route('cart.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-dark btn-sm w-100">
                                + Keranjang
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-dark btn-sm w-100">
                            Login untuk membeli
                        </a>
                    @endauth
                </div>

            </div>

        </div>
        @empty
        <div class="col-12">
            <p class="text-muted text-center py-5">Belum ada produk di kategori ini.</p>
        </div>
        @endforelse

    </div>

    <div class="d-flex justify-content-center mt-4 mb-5">
        {{ $products->links() }}
    </div>

</div>

@endsection