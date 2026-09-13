@extends('layouts.app')

@section('title', 'Riwayat Pesanan')

@section('content')

<style>
    .bg-orange { background-color: #fd7e14; color: #fff; }
</style>

<div class="container mt-5 mb-5">

    @include('includes.cart-wishlist-tabs')

    <h1 class="mb-4">
        🧾 Riwayat Pesanan
    </h1>

    @if($orders->count() > 0)

    <div class="table-responsive">

        <table class="table table-bordered align-middle">

            <thead class="table-primary">
                <tr>
                    <th>ID Pesanan</th>
                    <th>Tanggal Pesan</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

            @foreach($orders as $order)

                @php
                    $badgeClass = match($order->status) {
                        'diproses'   => 'bg-warning text-dark',
                        'packing'    => 'bg-info text-dark',
                        'dikirim'    => 'bg-orange',
                        'terkirim'   => 'bg-success',
                        'dibatalkan' => 'bg-danger',
                        default      => 'bg-secondary',
                    };
                @endphp

                <tr>
                    <td>000{{ $order->created_at->format('dmY') }}{{ sprintf('%04d', $order->product_id) }}</td>
                    <td>{{ $order->created_at->format('d M Y, H:i') }}</td>
                    <td>{{ $order->product->nama_produk }}</td>
                    <td>{{ $order->product->category->nama_kategori ?? '-' }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>Rp {{ number_format($order->total) }}</td>
                    <td>
                        <span class="badge {{ $badgeClass }}">{{ $order->status_label }}</span>
                    </td>
                    <td>
                        @if(in_array($order->status, ['diproses', 'packing']))
                            <form action="{{ route('orders.cancel', $order->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin membatalkan pesanan ini?');">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    Batalkan
                                </button>
                            </form>
                        @else
                            <span class="text-muted small">-</span>
                        @endif
                    </td>
                </tr>

            @endforeach

            </tbody>

        </table>

    </div>

    @else

        <div class="alert alert-warning">
            Belum ada riwayat pesanan. Pesanan akan muncul di sini setelah kamu checkout dan pesan WhatsApp berhasil dikirim ke admin.
        </div>

    @endif

</div>

@endsection