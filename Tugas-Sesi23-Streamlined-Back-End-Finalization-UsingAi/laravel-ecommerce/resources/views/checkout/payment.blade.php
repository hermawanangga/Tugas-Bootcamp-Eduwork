@extends('layouts.app')

@section('title', 'Konfirmasi Pembayaran')

@section('content')

<div class="container mt-5 mb-5">

    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">

            <div class="card shadow-sm">
                <div class="card-body p-4 text-center">

                    @php
                        $method = request('method');
                    @endphp

                    @if($method === 'qris')

                        <h5 class="fw-semibold mb-1">Toko Bunda Footwear</h5>
                        <p class="text-muted small mb-4">Scan QRIS di bawah ini untuk membayar</p>

                        <img src="{{ asset('storage/images/qris-bundafootwear.png') }}"
                             alt="QRIS Toko Bunda Footwear"
                             class="img-fluid mb-4"
                             style="max-width: 280px;">

                    @elseif($method === 'mandiri')

                        <h5 class="fw-semibold mb-1">Transfer Bank Mandiri</h5>
                        <p class="text-muted small mb-4">Silakan transfer ke rekening berikut</p>

                        <div class="border rounded-3 p-4 mb-4 bg-light">
                            <p class="text-muted small mb-1">Nomor Rekening</p>
                            <h4 class="fw-bold mb-3">1234567890</h4>

                            <p class="text-muted small mb-1">Atas Nama</p>
                            <h6 class="fw-semibold mb-0">Toko Bunda Footwear</h6>
                        </div>

                    @else

                        <div class="alert alert-warning">
                            Metode pembayaran tidak dikenali. Silakan kembali ke keranjang.
                        </div>

                    @endif

                    <p class="text-muted small mb-4">
                        Setelah melakukan pembayaran, klik tombol di bawah untuk mengonfirmasi
                        pesanan kamu lewat WhatsApp.
                    </p>

                    <button type="button" id="confirmPaymentButton" class="btn btn-success w-100">
                        <i class="bi bi-whatsapp me-2"></i>
                        Konfirmasi Pembayaran Anda via WA
                    </button>

                    <a href="{{ route('cart.index') }}" class="btn btn-link text-muted mt-2">
                        Kembali ke Keranjang
                    </a>

                </div>
            </div>

        </div>
    </div>

</div>

<script>
    const waNumber   = '6283861679625';
    const waMessage  = @json(request('message'));
    const shippingCost = {{ (int) request('shipping_cost', 0) }};

document.getElementById('confirmPaymentButton').addEventListener('click', function () {
    window.open('https://wa.me/' + waNumber + '?text=' + encodeURIComponent(waMessage), '_blank');

    fetch("{{ route('orders.store') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify({ shipping_cost: shippingCost }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = data.redirect;
        }
    })
    .catch(error => console.error('Gagal memindahkan pesanan ke riwayat:', error));
});
</script>

@endsection