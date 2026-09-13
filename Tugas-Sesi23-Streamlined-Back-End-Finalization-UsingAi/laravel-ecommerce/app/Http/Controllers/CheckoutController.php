<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    // Ganti nomor ini dengan nomor WhatsApp toko kamu
    protected string $waNumber = '6283861679625';

    public function create()
    {
        $carts = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        if ($carts->isEmpty()) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Keranjang kamu masih kosong.');
        }

        $grandTotal = $carts->sum(function ($cart) {
            return $cart->product->harga * $cart->quantity;
        });

        return view('checkout.create', compact('carts', 'grandTotal'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'address'       => 'required|string|max:500',
            'shipping_type' => 'required|in:Ambil di Toko,Dikirim ke Alamat',
            'payment_type'  => 'required|in:Cash,QRIS',
        ]);

        $carts = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        if ($carts->isEmpty()) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Keranjang kamu masih kosong.');
        }

        $grandTotal   = 0;
        $itemsMessage = '';
        $itemNumber   = 1;

        foreach ($carts as $cart) {

            $subtotal    = $cart->product->harga * $cart->quantity;
            $grandTotal += $subtotal;

            // simpan sebagai pesanan di database
            Order::create([
                'user_id'    => Auth::id(),
                'product_id' => $cart->product_id,
                'quantity'   => $cart->quantity,
                'total'      => $subtotal,
            ]);

            $variant = trim(($cart->color ? $cart->color : '') . ($cart->size ? ' / ' . $cart->size : ''));

            $itemsMessage .= "\n{$itemNumber}. {$cart->product->nama_produk}";

            if ($variant) {
                $itemsMessage .= " ({$variant})";
            }

            $itemsMessage .= "\n   Jumlah: {$cart->quantity} x Rp " . number_format($cart->product->harga, 0, ',', '.');
            $itemsMessage .= "\n   Subtotal: Rp " . number_format($subtotal, 0, ',', '.');

            $itemNumber++;
        }

        // kosongkan keranjang setelah checkout
        Cart::where('user_id', Auth::id())->delete();

        $message = "Halo Bunda Footwear, saya ingin melakukan pemesanan:\n";
        $message .= "\nNama: {$request->name}";
        $message .= "\nAlamat: {$request->address}";
        $message .= "\n\nProduk yang dipesan:";
        $message .= $itemsMessage;
        $message .= "\n\nTotal Pembayaran: Rp " . number_format($grandTotal, 0, ',', '.');
        $message .= "\nJenis Pengiriman: {$request->shipping_type}";
        $message .= "\nJenis Pembayaran: {$request->payment_type}";
        $message .= "\n\nMohon konfirmasinya, terima kasih!";

        $waLink  = 'https://wa.me/' . $this->waNumber . '?text=' . urlencode($message);

        return redirect()->away($waLink);
    }
}
