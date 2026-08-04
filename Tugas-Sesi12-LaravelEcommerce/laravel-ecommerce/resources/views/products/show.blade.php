@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')

<div class="container mt-5">

    <div class="card shadow">

        <div class="row g-0">

            <div class="col-md-5">

                @if($product->gambar)

                    <img src="{{ asset('storage/'.$product->gambar) }}"
                         class="img-fluid rounded-start"
                         alt="{{ $product->nama_produk }}">

                @endif

            </div>


            <div class="col-md-7">

                <div class="card-body">

                    <h2>
                        {{ $product->nama_produk }}
                    </h2>

                    <hr>

                    <p>
                        <strong>Harga:</strong>
                        Rp {{ number_format($product->harga,0,',','.') }}
                    </p>


                    <p>
                        <strong>Kategori:</strong>
                        {{ $product->kategori }}
                    </p>


                    <p>
                        <strong>Stok:</strong>
                        {{ $product->stok }}
                    </p>


                    <p>
                        <strong>Deskripsi:</strong>
                    </p>

                    <p>
                        {{ $product->deskripsi }}
                    </p>


                    <a href="{{ route('products.index') }}"
                       class="btn btn-secondary">
                        Kembali
                    </a>


                </div>

            </div>


        </div>

    </div>

</div>

@endsection