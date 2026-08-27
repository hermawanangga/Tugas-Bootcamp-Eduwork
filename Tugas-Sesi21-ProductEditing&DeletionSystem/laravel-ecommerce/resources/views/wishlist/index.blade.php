@extends('layouts.app')

@section('title', 'Wishlist')

@section('content')

<div class="container py-5">

    @include('includes.cart-wishlist-tabs')

    <h1 class="fw-bold mb-4">
        ❤️ Wishlist Saya
    </h1>

    @if($wishlists->count() > 0)

    <div class="row g-4">

        @foreach($wishlists as $wishlist)
        @php $product = $wishlist->product; @endphp

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

                        <form action="{{ route('cart.store') }}" method="POST" class="flex-grow-1">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-dark btn-sm w-100">
                                + Keranjang
                            </button>
                        </form>

                        <form action="{{ route('wishlist.destroy', $wishlist->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm" title="Hapus dari wishlist">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>

                    </div>

                </div>

            </div>

        </div>
        @endforeach

    </div>

    @else

    <div class="alert alert-warning">
        Wishlist kamu masih kosong. Yuk jelajahi
        <a href="{{ route('products.index') }}">produk kami</a>.
    </div>

    @endif

</div>

@endsection