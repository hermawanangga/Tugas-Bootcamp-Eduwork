@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')

<div class="container mt-5">

  @include('includes.alert')
    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">
                    <h4>Edit Produk</h4>
                </div>


                <div class="card-body">

                    <form action="{{ route('admin.products.update', $product->id) }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                         @include('admin.products.form')

                        <button class="btn btn-warning">
                            Update Produk
                        </button>


                        <a href="{{ route('admin.products.index') }}"
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