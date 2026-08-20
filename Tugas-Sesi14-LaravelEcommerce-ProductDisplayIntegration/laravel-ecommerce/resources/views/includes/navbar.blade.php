<nav class="navbar navbar-expand-lg bg-white sticky-top">
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

                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/') }}">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.index') }}">
                        Shop
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Our Story
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Blog
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Contact
                    </a>
                </li>

            </ul>

            {{-- Right Menu --}}
            <div class="navbar-actions d-flex align-items-center gap-3">

                <a href="#" class="nav-icon" title="Search">
                    <i class="bi bi-search"></i>
                </a>

                <a href="#" class="nav-icon" title="Wishlist">
                    <i class="bi bi-heart"></i>
                </a>

                <a href="#" class="nav-icon position-relative" title="Cart">
                    <i class="bi bi-bag"></i>

                    <span class="cart-badge">
                        0
                    </span>
                </a>

                <a href="#" class="btn btn-dark btn-login">
                    Login
                </a>

            </div>

        </div>

    </div>
</nav>