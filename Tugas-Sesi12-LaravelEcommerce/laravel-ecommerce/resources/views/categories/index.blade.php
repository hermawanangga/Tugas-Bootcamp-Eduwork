@extends('layouts.app')

@section('title', 'Categories')

@section('content')

<div class="container mt-5">

    @include('includes.alert')

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

            <table class="table table-bordered table-hover mb-0">

                <thead class="table-dark">

                    <tr>

                        <th width="80">
                            No
                        </th>

                        <th>
                            Nama Kategori
                        </th>

                        <th width="220">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($categories as $category)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $category->nama_kategori }}
                        </td>

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

                        <td colspan="3" class="text-center">

                            Belum ada kategori.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection