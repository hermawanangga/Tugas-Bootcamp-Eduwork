@extends('layouts.app')

@section('title', 'Kelola Produk')

@section('content')

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Daftar Produk</h1>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
            + Tambah Produk
        </a>
    </div>

    <form action="{{ route('admin.products.index') }}" method="GET" class="mb-4">
        <div class="input-group" style="max-width: 400px;">
            <input type="text"
                   name="search"
                   value="{{ $search }}"
                   class="form-control"
                   placeholder="Cari nama atau deskripsi produk...">

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-search"></i>
            </button>

            @if($search)
                <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">
                    Reset
                </a>
            @endif
        </div>
    </form>

    <div class="card shadow-sm">
        <div class="card-body p-0">

            {{-- ============================= --}}
            {{-- TAMPILAN TABEL (tablet & desktop, md ke atas) --}}
            {{-- ============================= --}}
            <div class="table-responsive d-none d-md-block">
                <table class="table table-bordered table-hover mb-0 align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 50px;">ID</th>
                            <th style="width: 60px;">NO</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th style="width: 90px;">Stok</th>
                            <th style="width: 130px;">Harga</th>
                            <th style="width: 110px;">Gambar</th>
                            <th style="width: 220px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                        <tr>
                            <td>{{ sprintf('%04d', $product->id) }}</td>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->nama_produk }}</td>
                            <td>{{ Str::limit($product->deskripsi, 80) }}</td>
                            <td class="text-center">{{ $product->stok }}</td>
                            <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                            <td class="text-center">
                                @if($product->gambar && \Illuminate\Support\Facades\Storage::disk('public')->exists($product->gambar))
                                    <img src="{{ asset('storage/'.$product->gambar) }}"
                                         alt="{{ $product->nama_produk }}"
                                         width="70" height="70"
                                         style="object-fit: cover; border-radius: 6px;">
                                @else
                                    <span class="text-muted">Tidak ada gambar</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex flex-wrap gap-1">
                                    <a href="{{ route('products.show', $product->id) }}"
                                       class="btn btn-info btn-sm text-white">Detail</a>
                                    <a href="{{ route('admin.products.edit', $product->id) }}"
                                       class="btn btn-warning btn-sm">Edit</a>
                                    <button type="button" class="btn btn-danger btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $product->id }}">
                                        Hapus
                                    </button>
                                </div>
                                @include('includes.delete-product-modal')
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                @if($search)
                                    Tidak ada produk yang cocok dengan pencarian "{{ $search }}".
                                @else
                                    Belum ada produk.
                                @endif
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- ============================= --}}
            {{-- TAMPILAN CARD (mobile, di bawah md) --}}
            {{-- ============================= --}}
            <div class="d-md-none">
                @forelse($products as $product)
                <div class="border-bottom p-3">

                    <div class="d-flex justify-content-between align-items-start gap-3 mb-2">

                        <div class="flex-grow-1">
                            <span class="badge bg-secondary mb-1">ID: {{ sprintf('%04d', $product->id) }}</span>
                            <h6 class="fw-semibold mb-0">{{ $product->nama_produk }}</h6>
                        </div>

                        @if($product->gambar && \Illuminate\Support\Facades\Storage::disk('public')->exists($product->gambar))
                            <img src="{{ asset('storage/'.$product->gambar) }}"
                                 alt="{{ $product->nama_produk }}"
                                 width="64" height="64"
                                 style="object-fit: cover; border-radius: 6px; flex-shrink: 0;">
                        @else
                            <div class="text-muted small text-end" style="flex-shrink: 0; width: 64px;">
                                Tidak ada gambar
                            </div>
                        @endif

                    </div>

                    <p class="text-muted small mb-2">
                        {{ Str::limit($product->deskripsi, 80) }}
                    </p>

                    <div class="d-flex justify-content-between small mb-3">
                        <span>Stok: <strong>{{ $product->stok }}</strong></span>
                        <span>Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                    </div>

                    <div class="d-flex gap-2">
                        <a href="{{ route('products.show', $product->id) }}"
                           class="btn btn-info btn-sm text-white flex-fill">Detail</a>
                        <a href="{{ route('admin.products.edit', $product->id) }}"
                           class="btn btn-warning btn-sm flex-fill">Edit</a>
                        <button type="button" class="btn btn-danger btn-sm flex-fill"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteModalMobile{{ $product->id }}">
                            Hapus
                        </button>
                    </div>

                    @include('includes.delete-product-modal', ['modalIdSuffix' => 'Mobile' . $product->id])

                </div>
                @empty
                <div class="p-4 text-center text-muted">
                    @if($search)
                        Tidak ada produk yang cocok dengan pencarian "{{ $search }}".
                    @else
                        Belum ada produk.
                    @endif
                </div>
                @endforelse
            </div>

        </div>
    </div>

    <div class="d-flex justify-content-end mt-4 mb-5">
        {{ $products->links() }}
    </div>

</div>

@endsection