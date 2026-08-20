@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')

<div class="container mt-5">

    @include('includes.alert')

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card">

                <div class="card-header">
                    <h4>Tambah Kategori</h4>
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.categories.store') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        @include('admin.categories.form')

                        <button type="submit"
                                class="btn btn-primary">
                            Simpan
                        </button>

                        <a href="{{ route('admin.categories.index') }}"
                           class="btn btn-secondary">
                            Kembali
                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection