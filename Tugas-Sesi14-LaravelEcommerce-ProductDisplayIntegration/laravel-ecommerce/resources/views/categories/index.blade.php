@extends('layouts.app')

@section('title', 'Categories')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h1 class="mb-0">
        Daftar Kategori
    </h1>

    <a href="{{ route('categories.create') }}"
       class="btn btn-primary">

        + Tambah Kategori

    </a>

</div>


<div class="card shadow-sm">

    <div class="card-body p-0">

        <table class="table table-bordered table-hover mb-0"
               style="table-layout: fixed; width: 100%;">

            <thead class="table-dark">

                <tr>

                    <th style="width: 70px;">
                        No
                    </th>

                    <th style="width: 35%;">
                        Nama Kategori
                    </th>

                    <th style="width: 40%;">
                        Gambar
                    </th>

                    <th style="width: 260px;">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($categories as $category)

                <tr>

                    {{-- No --}}
                    <td>
                        {{ $loop->iteration }}
                    </td>


                    {{-- Nama Kategori --}}
                    <td>
                        {{ $category->nama_kategori }}
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


                        <a href="{{ route('categories.edit', $category) }}"
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

                    <td colspan="4" class="text-center">

                        Belum ada kategori.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection