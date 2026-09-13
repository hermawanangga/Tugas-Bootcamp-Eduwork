@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')

<div class="container mt-5">

    @include('includes.cart-wishlist-tabs')
    
    <h1 class="mb-4">
        🛒 Keranjang Belanja
    </h1>


    @if($carts->count() > 0)

    <div class="table-responsive">

        <table class="table table-bordered align-middle">

            <thead class="table-primary">

                <tr>
                    <th>ID</th>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Varian</th>
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
                        {{ sprintf('%04d', $cart->product->id)  }}
                    </td>

                    <td>
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        {{ $cart->product->nama_produk }}
                    </td>

                     <td>
                        @if($cart->color)
                            <span class="badge bg-light text-dark border">{{ $cart->color }}</span>
                        @endif
                        @if($cart->size)
                            <span class="badge bg-light text-dark border">{{ $cart->size }}</span>
                        @endif
                        @if(!$cart->color && !$cart->size)
                            <span class="text-muted">-</span>
                        @endif
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
            @method('PATCH')

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
            @method('PATCH')

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

            <div class="d-flex justify-content-end mt-4 mb-4">

            <div class="card shadow-sm" style="width: 350px;">

                <div class="card-body">

                    <h5 class="card-title">
                        Ringkasan Belanja
                    </h5>

                    <hr>

                    @php
                        $total = 0;

                        $itemsText = '';
                        $no = 1;

                        foreach ($carts as $cart) {
                            $itemsText .= $no . ". " . $cart->product->nama_produk;

                            if ($cart->color || $cart->size) {
                                $varian = collect([$cart->color, $cart->size])->filter()->implode(', ');
                                $itemsText .= " (" . $varian . ")";
                            }

                            $itemsText .= " x" . $cart->quantity
                                        . " - Rp " . number_format($cart->product->harga * $cart->quantity, 0, ',', '.')
                                        . "\n";

                            $total += $cart->product->harga * $cart->quantity;
                            $no++;
                        }
                    @endphp

                    <div class="d-flex justify-content-between">
                        <span>Total Item</span>
                        <span>{{ $carts->sum('quantity') }}</span>
                    </div>

                    <div class="d-flex justify-content-between mt-2">
                        <strong>Subtotal</strong>
                        <strong>Rp {{ number_format($total) }}</strong>
                    </div>

                    <hr>

                    {{-- JENIS PENGIRIMAN --}}
                    <label class="form-label fw-semibold small mb-2">Jenis Pengiriman</label>

                    <div class="mb-3">

                        <div class="form-check">
                            <input class="form-check-input shipping-option" type="radio" name="shipping_type"
                                   id="shipToko" value="toko" checked>
                            <label class="form-check-label small" for="shipToko">
                                Ambil di Toko — <span class="text-muted">Gratis</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input shipping-option" type="radio" name="shipping_type"
                                   id="shipReguler" value="reguler">
                            <label class="form-check-label small" for="shipReguler">
                                JNE Reguler — <span class="text-muted">Rp 15.000</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input shipping-option" type="radio" name="shipping_type"
                                   id="shipExpress" value="express">
                            <label class="form-check-label small" for="shipExpress">
                                JNE Express — <span class="text-muted">Rp 25.000</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input shipping-option" type="radio" name="shipping_type"
                                   id="shipInstan" value="instan">
                            <label class="form-check-label small" for="shipInstan">
                                Instan — <span class="text-muted">Rp 50.000</span>
                            </label>
                        </div>

                    </div>

                    <hr>

                                        {{-- METODE PEMBAYARAN --}}
                    <label class="form-label fw-semibold small mb-2">Metode Pembayaran</label>

                    <div class="mb-3">

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method"
                                   id="payCash" value="cash" checked>
                            <label class="form-check-label small" for="payCash">
                                Cash
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method"
                                   id="payQris" value="qris">
                            <label class="form-check-label small" for="payQris">
                                QRIS
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method"
                                   id="payMandiri" value="mandiri">
                            <label class="form-check-label small" for="payMandiri">
                                Transfer Bank Mandiri
                            </label>
                        </div>

                    <div class="d-flex justify-content-between mt-2">
                        <strong>Total Bayar</strong>
                        <strong class="text-primary" id="grandTotalDisplay">
                            Rp {{ number_format($total) }}
                        </strong>
                    </div>

                    <button type="button" id="checkoutButton" class="btn btn-primary w-100 mt-4">
                        <i class="bi bi-whatsapp me-2"></i>
                        Checkout via WhatsApp
                    </button>

                </div>

            </div>


            <script>
                const cartItemsText = @json($itemsText);
                const subtotal      = {{ $total }};
                const userName      = @json(Auth::user()->name);
                const userAddress   = @json(Auth::user()->alamat);
                const waNumber      = '6283861679625';

                const shippingCosts = {
                    toko: 0,
                    reguler: 15000,
                    express: 25000,
                    instan: 50000,
                };

                const shippingLabels = {
                    toko: 'Ambil di Toko',
                    reguler: 'JNE Reguler',
                    express: 'JNE Express',
                    instan: 'Instan',
                };

                const paymentLabels = {
                    cash: 'Cash/COD',
                    qris: 'QRIS',
                    mandiri: 'Transfer Bank Mandiri',
                };

                function formatRupiah(number) {
                    return 'Rp ' + number.toLocaleString('id-ID');
                }

                function updateGrandTotal() {
                    const selected = document.querySelector('input[name="shipping_type"]:checked');
                    const cost = shippingCosts[selected.value];

                    document.getElementById('grandTotalDisplay').textContent = formatRupiah(subtotal + cost);
                }

                document.querySelectorAll('.shipping-option').forEach(function (radio) {
                    radio.addEventListener('change', updateGrandTotal);
                });

                function moveCartToOrders(shippingCost) {
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
                }
                document.getElementById('checkoutButton').addEventListener('click', function () {

                      if (!userAddress || userAddress.trim() === '') {
                        alert('Alamat pengiriman belum diisi. Silakan lengkapi alamat di halaman Profil terlebih dahulu.');
                        window.location.href = "{{ route('profile.edit') }}";
                        return;
                    }

                    const selectedShipping = document.querySelector('input[name="shipping_type"]:checked');
                    const shippingValue = selectedShipping.value;
                    const shippingCost  = shippingCosts[shippingValue];
                    const shippingLabel = shippingLabels[shippingValue];
                    const grandTotal    = subtotal + shippingCost;

                    const selectedPayment = document.querySelector('input[name="payment_method"]:checked');
                    const paymentValue = selectedPayment.value;
                    const paymentLabel = paymentLabels[paymentValue];

                    const message =
                        'Halo Bunda Footwear, saya ingin melakukan pemesanan:\n\n' +
                        'Nama: ' + userName + '\n' +
                        'Alamat: ' + userAddress + '\n\n' +
                        'Detail Pesanan:\n' + cartItemsText + '\n' +
                        'Subtotal: ' + formatRupiah(subtotal) + '\n' +
                        'Pengiriman (' + shippingLabel + '): ' + formatRupiah(shippingCost) + '\n' +
                        'Total: ' + formatRupiah(grandTotal) + '\n' +
                        'Metode Pembayaran: ' + paymentLabel + '\n\n' +
                        'Mohon diproses. Terima kasih!';

                        if (paymentValue === 'cash') {

                            window.open('https://wa.me/' + waNumber + '?text=' + encodeURIComponent(message), '_blank');

                            moveCartToOrders(shippingCost);

                        } else {

                        window.location.href =
                            "{{ route('checkout.payment') }}?method=" + paymentValue +
                            "&message=" + encodeURIComponent(message) +
                            "&shipping_cost=" + shippingCost;

                    }

                });
            </script>

        </div>

    </div>


    @else


        <div class="alert alert-warning">
            Keranjang masih kosong
        </div>


    @endif


</div>


@endsection