<?php
namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display the user's wishlist.
     */
    public function index()
    {
        $wishlists = Wishlist::with('product.category')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('wishlist.index', compact('wishlists'));
    }

    /**
     * Toggle (like/unlike) a product in the wishlist.
     */
    public function toggle(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $wishlist = Wishlist::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($wishlist) {
            $wishlist->delete();
            $message = 'Produk dihapus dari wishlist.';
        } else {
            Wishlist::create([
                'user_id'    => Auth::id(),
                'product_id' => $request->product_id,
            ]);
            $message = 'Produk ditambahkan ke wishlist!';
        }

        return redirect()
            ->back()
            ->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $wishlist = Wishlist::where('user_id', Auth::id())
            ->findOrFail($id);

        $wishlist->delete();

        return redirect()
            ->back()
            ->with('success', 'Produk berhasil dihapus dari wishlist!');
    }
}
