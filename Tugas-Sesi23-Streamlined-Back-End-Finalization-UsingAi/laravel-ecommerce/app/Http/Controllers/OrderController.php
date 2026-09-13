<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('product.category')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('orders.index', compact('orders'));
    }

    public function store(Request $request)
    {
        $carts = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        if ($carts->isEmpty()) {
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Keranjang kamu masih kosong.',
                ], 422);
            }

            return redirect()
                ->route('cart.index')
                ->with('error', 'Keranjang kamu masih kosong.');
        }

        $shippingCost = (float) $request->input('shipping_cost', 0);
        DB::transaction(function () use ($carts, $shippingCost) {
            $lastIndex = $carts->count() - 1;
            foreach ($carts as $index => $cart) {
                $subtotal = $cart->product->harga * $cart->quantity;

                if ($index === $lastIndex) {
                    $subtotal += $shippingCost;
                }
                Order::create([
                    'user_id'    => Auth::id(),
                    'product_id' => $cart->product_id,
                    'quantity'   => $cart->quantity,
                    'total'      => $subtotal,
                ]);
            }

            Cart::where('user_id', Auth::id())->delete();
        });

        if ($request->wantsJson()) {
            return response()->json([
                'success'  => true,
                'redirect' => route('orders.index'),
            ]);
        }

        return redirect()
            ->route('orders.index')
            ->with('success', 'Pesanan berhasil dikirim ke admin dan dipindahkan ke riwayat pesanan!');
    }

    /**
     * User membatalkan pesanan miliknya sendiri.
     * Hanya boleh dibatalkan selama status masih 'diproses' atau 'packing'.
     */
    public function cancel(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        if (! in_array($order->status, ['diproses', 'packing'])) {
            return redirect()
                ->route('orders.index')
                ->with('error', 'Pesanan ini sudah dalam pengiriman/terkirim, tidak bisa dibatalkan.');
        }

        $order->update(['status' => 'dibatalkan']);

        return redirect()
            ->route('orders.index')
            ->with('success', 'Pesanan berhasil dibatalkan.');
    }
}
