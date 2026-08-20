<nav class="navbar navbar-expand-lg bg-white sticky-top" style="display: block !important;">
    <div class="container py-3">

        {{-- Logo --}}
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            <span class="brand-icon">K</span>
            Krist
        </a>

        {{-- Mobile Toggle --}}
        <button class="navbar-toggler border-0 shadow-none"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavbar"
                aria-controls="mainNavbar"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <i class="bi bi-list fs-2"></i>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">

            {{-- Menu --}}
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

                {{-- HOME --}}
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/') }}">
                        Home
                    </a>
                </li>
                {{-- KATEGORI --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categories.index') }}">
                        Kategori
                    </a>
                </li>

                {{-- SHOP + MEGA MENU --}}
                <li class="nav-item mega-menu-item">

                    <div class="shop-nav-wrapper">

                        {{-- Shop tetap menuju halaman Products --}}
                        <a class="nav-link mega-menu-link"
                        href="{{ route('products.index') }}">
                            Shop
                        </a>

                        {{-- Panah hanya untuk membuka Mega Menu --}}
                        <button type="button"
                                class="mega-menu-toggle"
                                aria-label="Open Shop Menu">
                            <i class="bi bi-chevron-down"></i>
                        </button>

                    </div>


                    {{-- MEGA MENU --}}
                    <div class="mega-menu">

                        <div class="mega-menu-container">

                            {{-- MEN --}}
                            <div class="mega-menu-column">

                                <h6>Men</h6>

                                <a href="{{ route('products.index') }}">
                                    T-Shirts
                                </a>

                                <a href="{{ route('products.index') }}">
                                    Casual Shirts
                                </a>

                                <a href="{{ route('products.index') }}">
                                    Formal Shirts
                                </a>

                                <a href="{{ route('products.index') }}">
                                    Jackets
                                </a>

                                <a href="{{ route('products.index') }}">
                                    Blazers & Coats
                                </a>

                                <h6 class="mega-menu-subtitle">
                                    Indian & Festive Wear
                                </h6>

                                <a href="{{ route('products.index') }}">
                                    Kurtas & Kurta Sets
                                </a>

                                <a href="{{ route('products.index') }}">
                                    Sherwanis
                                </a>

                            </div>


                            {{-- WOMEN --}}
                            <div class="mega-menu-column">

                                <h6>Women</h6>

                                <a href="{{ route('products.index') }}">
                                    Kurtas & Suits
                                </a>

                                <a href="{{ route('products.index') }}">
                                    Sarees
                                </a>

                                <a href="{{ route('products.index') }}">
                                    Ethnic Wear
                                </a>

                                <a href="{{ route('products.index') }}">
                                    Lehenga Cholis
                                </a>

                                <a href="{{ route('products.index') }}">
                                    Jackets
                                </a>

                                <h6 class="mega-menu-subtitle">
                                    Western Wear
                                </h6>

                                <a href="{{ route('products.index') }}">
                                    Dresses
                                </a>

                                <a href="{{ route('products.index') }}">
                                    Jumpsuits
                                </a>

                            </div>


                            {{-- FOOTWEAR --}}
                            <div class="mega-menu-column">

                                <h6>Footwear</h6>

                                <a href="{{ route('products.index') }}">
                                    Flats
                                </a>

                                <a href="{{ route('products.index') }}">
                                    Casual Shoes
                                </a>

                                <a href="{{ route('products.index') }}">
                                    Heels
                                </a>

                                <a href="{{ route('products.index') }}">
                                    Boots
                                </a>

                                <a href="{{ route('products.index') }}">
                                    Sports Shoes & Floaters
                                </a>

                                <h6 class="mega-menu-subtitle">
                                    Product Features
                                </h6>

                                <a href="{{ route('products.index') }}">
                                    360 Product Viewer
                                </a>

                                <a href="{{ route('products.index') }}">
                                    Product with Video
                                </a>

                            </div>


                            {{-- KIDS --}}
                            <div class="mega-menu-column">

                                <h6>Kids</h6>

                                <a href="{{ route('products.index') }}">
                                    T-Shirts
                                </a>

                                <a href="{{ route('products.index') }}">
                                    Shirts
                                </a>

                                <a href="{{ route('products.index') }}">
                                    Jeans
                                </a>

                                <a href="{{ route('products.index') }}">
                                    Trousers
                                </a>

                                <a href="{{ route('products.index') }}">
                                    Party Wear
                                </a>

                                <a href="{{ route('products.index') }}">
                                    Innerwear & Thermal
                                </a>

                                <a href="{{ route('products.index') }}">
                                    Track Pants
                                </a>

                                <a href="{{ route('products.index') }}">
                                    Value Pack
                                </a>

                            </div>

                        </div>

                    </div>

                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#our-story">
                        Our Story
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('blog.index') }}">
                        Blog
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#contact">
                        Contact
                    </a>
                </li>

            </ul>

            {{-- Right Menu --}}
            <div class="navbar-actions d-flex align-items-center gap-3">

                {{-- Search --}}
                <a href="#" class="nav-icon" title="Search">
                    <i class="bi bi-search"></i>
                </a>


                {{-- Wishlist --}}
                @auth
                    <a href="#" class="nav-icon" title="Wishlist">
                        <i class="bi bi-heart"></i>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="nav-icon" title="Login untuk menggunakan Wishlist">
                        <i class="bi bi-heart"></i>
                    </a>
                @endauth


                {{-- Cart --}}
                @auth
                    <a href="{{ route('cart.index') }}"
                    class="nav-icon position-relative"
                    title="Keranjang">

                        <i class="bi bi-bag"></i>

                        @php
                            $cartCount = Auth::user()->carts->sum('quantity');
                        @endphp

                        @if($cartCount > 0)
                            <span class="cart-badge">
                                {{ $cartCount }}
                            </span>
                        @endif

                    </a>
                @else
                    <a href="{{ route('login') }}"
                    class="nav-icon position-relative"
                    title="Login untuk menggunakan Keranjang">

                        <i class="bi bi-bag"></i>
                    </a>
                @endauth


                {{-- ========================= --}}
                {{-- USER BELUM LOGIN --}}
                {{-- ========================= --}}

                @guest

                    <a href="{{ route('login') }}" class="btn btn-dark btn-login">
                        Login
                    </a>

                    <a href="{{ route('register') }}" class="btn btn-outline-dark">
                        Register
                    </a>

                @endguest


                {{-- ========================= --}}
                {{-- USER SUDAH LOGIN --}}
                {{-- ========================= --}}

                @auth
                    @if(Auth::user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark">
                            Dashboard Admin
                        </a>
                    @endif

                    <a href="{{ route('dashboard') }}" class="btn btn-dark">
                        Dashboard
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf

                        <button type="submit" class="btn btn-outline-dark">
                            Logout
                        </button>
                    </form>

                @endauth

            </div>

        </div>

    </div>
</nav>