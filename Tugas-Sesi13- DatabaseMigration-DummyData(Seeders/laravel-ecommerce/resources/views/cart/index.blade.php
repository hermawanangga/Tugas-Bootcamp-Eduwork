@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')

<div class="container mt-5">

    <h1 class="mb-4">
        🛒 Keranjang Belanja
    </h1>


    @if($carts->count() > 0)

    <div class="table-responsive">

        <table class="table table-bordered align-middle">

            <thead class="table-primary">

                <tr>
                    <th>Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>

            </thead>


            <tbody>

            @foreach($carts as $cart)

                <tr>

                    <td>
                        {{ $cart->product->nama_produk }}
                    </td>


                    <td>
                        {{ $cart->product->category->nama_kategori }}
                    </td>


                    <td>
                        Rp {{ number_format($cart->product->harga) }}
                    </td>


                    <td>
                        {{ $cart->quantity }}
                    </td>


                    <td>
                        Rp {{ number_format($cart->product->harga * $cart->quantity) }}
                    </td>


<td>

    <div class="d-flex gap-2">

        {{-- Tambah Quantity --}}
        <form action="{{ route('cart.update', $cart->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <input type="hidden"
                   name="action"
                   value="increase">

            <button type="submit" class="btn btn-success btn-sm">
                +
            </button>

        </form>



        {{-- Kurangi Quantity --}}
        <form action="{{ route('cart.update', $cart->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <input type="hidden"
                   name="action"
                   value="decrease">

            <button type="submit" class="btn btn-warning btn-sm">
                -
            </button>

        </form>



        {{-- Hapus --}}
        <form action="{{ route('cart.destroy', $cart->id) }}"
              method="POST">

            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger btn-sm">
                Hapus
            </button>

        </form>


    </div>

</td>

                </tr>


            @endforeach


            </tbody>


        </table>

            <div class="d-flex justify-content-end mt-4">

            <div class="card shadow-sm" style="width: 350px;">

                <div class="card-body">

                    <h5 class="card-title">
                        Ringkasan Belanja
                    </h5>


                    <hr>


                    @php
                        $total = 0;
                    @endphp


                    @foreach($carts as $cart)

                        @php
                            $total += $cart->product->harga * $cart->quantity;
                        @endphp

                    @endforeach



                    <div class="d-flex justify-content-between">

                        <span>Total Item</span>

                        <span>
                            {{ $carts->sum('quantity') }}
                        </span>

                    </div>



                    <div class="d-flex justify-content-between mt-2">

                        <strong>Total Harga</strong>

                        <strong class="text-primary">
                            Rp {{ number_format($total) }}
                        </strong>

                    </div>


                    <button class="btn btn-primary w-100 mt-3">
                        Checkout
                    </button>


                </div>

            </div>

        </div>

    </div>


    @else


        <div class="alert alert-warning">
            Keranjang masih kosong
        </div>


    @endif


</div>


@endsection