@extends('layouts.app')

@section('title', 'Home')

@section('content')

<div class="container mt-5">

    {{-- Hero Section --}}
    <div class="p-5 mb-5 bg-light rounded-3 shadow-sm">

        <div class="container-fluid py-4">

            <h1 class="display-5 fw-bold">
                Laravel E-Commerce
            </h1>

            <p class="col-md-8 fs-5">
                Selamat datang di toko online kami.
                Temukan berbagai produk terbaik dengan harga terbaik.
            </p>

            <a href="{{ route('products.index') }}"
               class="btn btn-primary btn-lg">
                Lihat Produk
            </a>

        </div>

    </div>


    {{-- Produk Terbaru --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="mb-0">
            Produk Terbaru
        </h2>

        <a href="{{ route('products.index') }}"
           class="btn btn-outline-primary">
            Lihat Semua
        </a>

    </div>


    <div class="row">

        @forelse($products as $product)

            <div class="col-md-4 mb-4">

                <div class="card h-100 shadow-sm">

                    @if($product->gambar)

                        <img src="{{ asset('storage/'.$product->gambar) }}"
                             class="card-img-top"
                             style="height:250px; object-fit:cover;"
                             alt="{{ $product->nama_produk }}">

                    @else

                        <div class="bg-secondary text-white text-center p-5">
                            Tidak ada gambar
                        </div>

                    @endif


                    <div class="card-body">

                        <h5 class="card-title">
                            {{ $product->nama_produk }}
                        </h5>

                        <p class="card-text">
                            {{ $product->category->nama_kategori }}
                        </p>

                        <h5 class="text-primary">
                            Rp {{ number_format($product->harga,0,',','.') }}
                        </h5>

                    </div>


                    <div class="card-footer bg-white">

                        <a href="{{ route('products.show',$product->id) }}"
                           class="btn btn-primary w-100">
                            Lihat Detail
                        </a>

                    </div>

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

</div>

@endsection