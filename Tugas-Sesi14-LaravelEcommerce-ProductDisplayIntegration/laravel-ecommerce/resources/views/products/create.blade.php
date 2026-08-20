@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')

<div class="container mt-5">

  @include('includes.alert')
    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">
                    <h4 class="mb-0">Tambah Produk</h4>
                </div>

                <div class="card-body">

                    <form action="{{ route('products.store') }}" 
                          method="POST" 
                          enctype="multipart/form-data">

                        @csrf
                         @include('products.form')

                        <button type="submit" class="btn btn-primary">
                            Simpan Produk
                        </button>

                        <a href="{{ route('products.index') }}" 
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