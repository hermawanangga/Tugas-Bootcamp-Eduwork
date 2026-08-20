@extends('layouts.app')

@section('title', 'Kelola Kategori')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h1 class="mb-0">
        Daftar Kategori
    </h1>

    <a href="{{ route('admin.categories.create') }}"
       class="btn btn-primary">

        + Tambah Kategori

    </a>

</div>


<div class="card shadow-sm">

    <div class="card-body p-0">

        <table class="table table-bordered table-hover mb-5"
               style="table-layout: fixed; width: 100%;">

            <thead class="table-dark">

            <tr>
                <th style="width: 60px;">ID</th>
                <th style="width: 70px;">NO</th>
                <th style="width: 35%;">Nama Kategori</th>
                <th style="width: 20%;">Jumlah Produk</th>
                <th style="width: 20%;">Gambar</th>
                <th style="width: 260px;">Aksi</th>
            </tr>

            </thead>

            <tbody>

                @forelse($categories as $category)

                <tr>
                    {{-- ID --}}
                    <td>
                        {{ sprintf('%04d', $category->id)  }}
                    </td>

                    {{-- NO --}}
                    <td>
                        {{ $loop->iteration }}
                    </td>

                    {{-- Nama Kategori --}}
                    <td>
                        {{ $category->nama_kategori }}
                    </td>

                    {{-- Jumlah Produk --}}
                    <td class="text-center">
                        <span class="badge bg-secondary">{{ $category->products_count }}</span>
                    </td>

                    {{-- Gambar --}}
                    <td class="text-center">

                        @if($category->gambar)

                            <img src="{{ asset('storage/' . $category->gambar) }}"
                                 alt="{{ $category->nama_kategori }}"
                                 width="100"
                                 height="100"
                                 style="object-fit: cover; border-radius: 6px;">

                        @else

                            <span class="text-muted">
                                Tidak ada gambar
                            </span>

                        @endif

                    </td>


                    {{-- Aksi --}}
                    <td>

                        <a href="{{ route('categories.show', $category) }}"
                           class="btn btn-info btn-sm text-white">

                            Detail

                        </a>


                        <a href="{{ route('admin.categories.edit', $category) }}"
                           class="btn btn-warning btn-sm">

                            Edit

                        </a>


                        <button type="button"
                                class="btn btn-danger btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteCategoryModal{{ $category->id }}">

                            Hapus

                        </button>


                        @include('includes.delete-category-modal')

                    </td>

                </tr>


                @empty

                <tr>

                    <td colspan="5" class="text-center">

                        Belum ada kategori.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection