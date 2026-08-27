<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display the user's cart.
     */
    public function index()
    {
        $carts = Cart::with('product.category')
            ->where('user_id', Auth::id())
            ->get();

        return view('cart.index', compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $cart = Cart::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($cart) {
            $cart->increment('quantity');
        } else {
            Cart::create([
                'user_id'    => Auth::id(),
                'product_id' => $request->product_id,
                'quantity'   => 1,
            ]);
        }

        return redirect()
            ->back()
            ->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cart = Cart::where('user_id', Auth::id())
            ->findOrFail($id);

        if ($request->action === 'increase') {
            $cart->increment('quantity');
        }

        if ($request->action === 'decrease') {
            if ($cart->quantity > 1) {
                $cart->decrement('quantity');
            }
        }

        return redirect()
            ->back()
            ->with('success', 'Jumlah produk berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
   public function destroy(string $id)
    {
        $cart = Cart::where('user_id', Auth::id())
            ->findOrFail($id);

        $cart->delete();

        return redirect()
            ->back()
            ->with('success', 'Produk berhasil dihapus dari keranjang!');
    }
}
