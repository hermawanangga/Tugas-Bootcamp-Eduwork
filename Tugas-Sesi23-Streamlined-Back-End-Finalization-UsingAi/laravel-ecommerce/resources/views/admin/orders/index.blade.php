@extends('layouts.app')

@section('title', 'Kelola Pesanan')

@section('content')

<style>
    .status-diproses   { background-color: #fff3cd; }
    .status-packing    { background-color: #cff4fc; }
    .status-dikirim    { background-color: #ffe5d0; }
    .status-terkirim   { background-color: #d1e7dd; }
    .status-dibatalkan { background-color: #f8d7da; }
</style>

<div class="container py-5">

    <div class="mb-4">
        <h2 class="fw-bold mb-1">Kelola Pesanan</h2>
        <p class="text-muted mb-0">Daftar semua pesanan yang masuk dari pelanggan.</p>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            @if($orders->count() > 0)

            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>ID Pesanan</th>
                            <th>Tanggal</th>
                            <th>Pelanggan</th>
                            <th>Produk</th>
                            <th>Kategori</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>000{{ $order->created_at->format('dmY') }}{{ sprintf('%04d', $order->product_id) }}</td>
                            <td>{{ $order->created_at->format('d M Y, H:i') }}</td>
                            <td>{{ $order->user->name ?? '-' }}</td>
                            <td>{{ $order->product->nama_produk ?? '-' }}</td>
                            <td>{{ $order->product->category->nama_kategori ?? '-' }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>Rp {{ number_format($order->total) }}</td>
                            <td>
                                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" onchange="this.form.submit()"
                                            class="form-select form-select-sm status-{{ $order->status }}">
                                        <option value="diproses" @selected($order->status === 'diproses')>Pesanan Diproses</option>
                                        <option value="packing" @selected($order->status === 'packing')>Pesanan Dipacking</option>
                                        <option value="dikirim" @selected($order->status === 'dikirim')>Dalam Pengiriman</option>
                                        <option value="terkirim" @selected($order->status === 'terkirim')>Pesanan Terkirim</option>
                                        <option value="dibatalkan" @selected($order->status === 'dibatalkan')>Pesanan Dibatalkan</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $orders->links() }}
            </div>

            @else

            <div class="alert alert-warning mb-0">
                Belum ada pesanan yang masuk.
            </div>

            @endif

        </div>
    </div>

</div>

@endsection