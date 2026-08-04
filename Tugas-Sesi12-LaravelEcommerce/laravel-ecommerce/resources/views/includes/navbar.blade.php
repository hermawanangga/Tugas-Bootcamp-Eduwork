<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <div class="container">

        <a class="navbar-brand" href="{{ route('home') }}">
            Laravel Ecommerce
        </a>


        <button class="navbar-toggler" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>


        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        Home
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.index') }}">
                        Products
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart.index') }}">
                        🛒 Keranjang
                        @php
                            $cartCount = \App\Models\Cart::sum('quantity');
                        @endphp


                        @if($cartCount > 0)

                            <span class="badge bg-danger">
                                {{ $cartCount }}
                            </span>

                        @endif
                    </a>
                </li>

            </ul>

        </div>

    </div>
</nav>