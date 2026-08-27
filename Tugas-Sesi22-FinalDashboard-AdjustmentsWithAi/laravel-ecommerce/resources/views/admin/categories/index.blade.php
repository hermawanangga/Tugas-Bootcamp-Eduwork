@extends('layouts.app')

@section('title', 'Kelola Kategori')

@section('content')

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Daftar Kategori</h1>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
            + Tambah Kategori
        </a>
    </div>

    <div class="card shadow-sm mb-5">
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
                            <th>Nama Kategori</th>
                            <th style="width: 130px;">Jumlah Produk</th>
                            <th style="width: 110px;">Gambar</th>
                            <th style="width: 200px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                        <tr>
                            <td>{{ sprintf('%04d', $category->id) }}</td>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->nama_kategori }}</td>
                            <td class="text-center">
                                <span class="badge bg-secondary">{{ $category->products_count }}</span>
                            </td>
                            <td class="text-center">
                                @if($category->gambar)
                                    <img src="{{ asset('storage/' . $category->gambar) }}"
                                         alt="{{ $category->nama_kategori }}"
                                         width="70" height="70"
                                         style="object-fit: cover; border-radius: 6px;">
                                @else
                                    <span class="text-muted">Tidak ada gambar</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex flex-wrap gap-1">
                                    <a href="{{ route('categories.show', $category) }}"
                                       class="btn btn-info btn-sm text-white">Detail</a>
                                    <a href="{{ route('admin.categories.edit', $category) }}"
                                       class="btn btn-warning btn-sm">Edit</a>
                                    <button type="button" class="btn btn-danger btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteCategoryModal{{ $category->id }}">
                                        Hapus
                                    </button>
                                </div>
                                @include('includes.delete-category-modal')
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                Belum ada kategori.
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
                @forelse($categories as $category)
                <div class="border-bottom p-3">

                    <div class="d-flex justify-content-between align-items-start gap-3 mb-2">
                        <div class="flex-grow-1">
                            <span class="badge bg-secondary mb-1">ID: {{ sprintf('%04d', $category->id) }}</span>
                            <h6 class="fw-semibold mb-0">{{ $category->nama_kategori }}</h6>
                        </div>

                        @if($category->gambar)
                            <img src="{{ asset('storage/' . $category->gambar) }}"
                                 alt="{{ $category->nama_kategori }}"
                                 width="64" height="64"
                                 style="object-fit: cover; border-radius: 6px; flex-shrink: 0;">
                        @else
                            <div class="text-muted small text-end" style="flex-shrink: 0; width: 64px;">
                                Tidak ada gambar
                            </div>
                        @endif
                    </div>

                    <p class="text-muted small mb-3">
                        Jumlah Produk: <strong>{{ $category->products_count }}</strong>
                    </p>

                    <div class="d-flex gap-2">
                        <a href="{{ route('categories.show', $category) }}"
                           class="btn btn-info btn-sm text-white flex-fill">Detail</a>
                        <a href="{{ route('admin.categories.edit', $category) }}"
                           class="btn btn-warning btn-sm flex-fill">Edit</a>
                        <button type="button" class="btn btn-danger btn-sm flex-fill"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteCategoryModalMobile{{ $category->id }}">
                            Hapus
                        </button>
                    </div>

                    @include('includes.delete-category-modal', ['modalIdSuffix' => 'Mobile' . $category->id])

                </div>
                @empty
                <div class="p-4 text-center text-muted">
                    Belum ada kategori.
                </div>
                @endforelse
            </div>

        </div>
    </div>

</div>

@endsection