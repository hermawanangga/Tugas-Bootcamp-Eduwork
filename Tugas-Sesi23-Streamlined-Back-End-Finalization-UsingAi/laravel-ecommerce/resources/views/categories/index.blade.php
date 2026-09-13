@extends('layouts.app')

@section('title', 'Kategori')

@section('content')

<div class="container py-5">

    <div class="mb-4">
        <h1 class="fw-bold mb-1">Kategori</h1>
        <p class="text-muted mb-0">Jelajahi produk berdasarkan kategori.</p>
    </div>

    <div class="row g-4">

        @forelse($categories as $category)
        <div class="col-6 col-md-4 col-lg-3">

            <a href="{{ route('products.index') }}" class="text-decoration-none text-dark">

                <div class="card h-100 border-0 shadow-sm">

                    @if($category->gambar)
                        <img src="{{ asset('storage/'.$category->gambar) }}"
                             class="card-img-top"
                             alt="{{ $category->nama_kategori }}"
                             style="height: 160px; object-fit: cover;">
                    @else
                        <div class="d-flex align-items-center justify-content-center bg-light"
                             style="height: 160px;">
                            <span class="text-muted small">Tidak ada gambar</span>
                        </div>
                    @endif

                    <div class="card-body text-center">
                        <h6 class="fw-semibold mb-1">{{ $category->nama_kategori }}</h6>
                        <p class="text-muted small mb-0">{{ $category->products_count }} produk</p>
                    </div>

                </div>

            </a>

        </div>
        @empty
        <div class="col-12">
            <p class="text-muted text-center py-5">Belum ada kategori tersedia.</p>
        </div>
        @endforelse

    </div>

</div>

@endsection