@php
    $megaCategories = \App\Models\Category::all();
@endphp

<nav class="navbar navbar-expand-lg bg-white sticky-top" style="display: block !important;">
    <div class="container py-3">

        {{-- Logo --}}
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            <span class="brand-icon">B</span>
            unda Footwear
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

                            @foreach($megaCategories as $category)

                                <div class="mega-menu-column">
                                    <a href="{{ route('products.index') }}" class="mega-menu-single-link">
                                        {{ $category->nama_kategori }}
                                    </a>
                                </div>

                            @endforeach

                        </div>
                    </div>

                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact.index') }}">
                        Contact
                    </a>
                </li>

            </ul>

            {{-- Right Menu --}}
            <div class="navbar-actions d-flex align-items-center gap-3">

                {{-- Wishlist --}}
                @auth
                    <a href="{{ route('wishlist.index') }}" class="nav-icon" title="Wishlist">
                        <i class="bi bi-heart"></i>
                                @php
                                    $wishlistCount = Auth::user()->wishlists->count();
                                @endphp

                                @if($wishlistCount > 0)
                                    <span class="cart-badge">
                                        {{ $wishlistCount }}
                                    </span>
                                @endif
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

                               {{-- ========================= --}}
                {{-- USER SUDAH LOGIN --}}
                {{-- ========================= --}}

                @auth
                    <div class="dropdown">

                        <button class="nav-icon-btn"
                                type="button"
                                id="profileMenuButton"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                                title="Akun Saya">

                            @if(Auth::user()->photoUrl())
                                <img src="{{ Auth::user()->photoUrl() }}"
                                     alt="{{ Auth::user()->name }}"
                                     class="navbar-avatar">
                            @else
                                <i class="bi bi-person-circle fs-4"></i>
                            @endif

                            <span class="status-dot {{ Auth::user()->isOnline() ? 'status-dot-online' : 'status-dot-offline' }}"
                                  title="{{ Auth::user()->isOnline() ? 'Online' : 'Offline' }}"></span>
                                  
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="profileMenuButton">

                            <li class="dropdown-header">
                                {{ Auth::user()->name }}
                            </li>

                            <li><hr class="dropdown-divider"></li>

                            @if(Auth::user()->isAdmin())
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                        <i class="bi bi-speedometer2 me-2"></i>
                                        Dashboard Admin
                                    </a>
                                </li>
                            @endif

                            <li>
                                <a class="dropdown-item" href="{{ route('dashboard') }}">
                                    <i class="bi bi-grid me-2"></i>
                                    Dashboard
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    <i class="bi bi-gear me-2"></i>
                                    Profil & Pengaturan
                                </a>
                            </li>

                            <li><hr class="dropdown-divider"></li>

                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i>
                                        Logout
                                    </button>
                                </form>
                            </li>

                        </ul>

                    </div>
                @endauth
            </div>

        </div>

    </div>
</nav>