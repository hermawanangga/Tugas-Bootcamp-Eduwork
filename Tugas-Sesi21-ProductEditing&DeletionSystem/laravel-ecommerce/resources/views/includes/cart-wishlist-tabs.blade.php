<div class="row g-0 mb-4 border rounded overflow-hidden" style="max-width: 400px;">

    <div class="col-6">
        <a href="{{ route('wishlist.index') }}"
           class="d-block text-center text-decoration-none py-2 small fw-semibold {{ request()->routeIs('wishlist.index') ? 'bg-dark text-white' : 'bg-light text-dark' }}">
            Wishlist Saya
        </a>
    </div>

    <div class="col-6">
        <a href="{{ route('cart.index') }}"
           class="d-block text-center text-decoration-none py-2 small fw-semibold {{ request()->routeIs('cart.index') ? 'bg-dark text-white' : 'bg-light text-dark' }}">
            Keranjang Saya
        </a>
    </div>

</div>