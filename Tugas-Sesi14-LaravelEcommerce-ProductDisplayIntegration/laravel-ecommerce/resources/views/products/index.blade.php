@extends('layouts.app')

@section('title', 'Products')

@section('content')

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1 class="mb-0">
            Daftar Produk
        </h1>

        <a href="{{ route('products.create') }}" class="btn btn-primary">
            + Tambah Produk
        </a>

    </div>


    <div class="row">

        @forelse($products as $product)

        <div class="col-md-4 mb-4">

            <div class="card h-100 shadow-sm">


                @if($product->gambar)

                    <img src="{{ asset('storage/'.$product->gambar) }}"
                         class="card-img-top"
                         style="height: 250px; object-fit: cover;"
                         alt="{{ $product->nama_produk }}">

                @else

                    <div class="product-placeholder">
                        <i class="bi bi-image"></i>
                        <span>
                           Belum ada gambar
                        </span>
                    </div>

                @endif


                <div class="card-body">

                    <h5 class="card-title">
                        {{ $product->nama_produk }}
                    </h5>


                    <p class="card-text mb-1">
                        <strong>Harga:</strong>
                        Rp {{ number_format($product->harga, 0, ',', '.') }}
                    </p>


                    <p class="card-text mb-1">
                        <strong>Kategori:</strong>
                        {{ $product->category->nama_kategori ?? '-' }}
                    </p>


                    <p class="card-text">
                        <strong>Stok:</strong>
                        {{ $product->stok }}
                    </p>


                </div>


                <div class="card-footer bg-white d-flex flex-wrap gap-2">

                    <a href="{{ route('products.show', $product->id) }}"
                       class="btn btn-info btn-sm text-white">
                        Detail
                    </a>


                    <a href="{{ route('products.edit', $product->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('cart.store') }}"
                        method="POST"
                        class="d-inline">

                        @csrf

                        <input type="hidden"
                            name="product_id"
                            value="{{ $product->id }}">

                        <button type="submit"
                            class="btn btn-success btn-sm">
                            Tambah ke Keranjang
                        </button>

                    </form>

                    <button type="button"
                            class="btn btn-danger btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteModal{{ $product->id }}">
                        Hapus
                    </button>

                </div>
                  @include('includes.delete-product-modal')
            </div>

        </div>


        @empty

        <div class="col-12">

            <div class="alert alert-info">
                Belum ada produk.
            </div>

        </div>

        @endforelse


    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-end mt-5">
        <div class="ms-4">
            {{ $products->links() }}
        </div>
    </div>

</div>

@endsection