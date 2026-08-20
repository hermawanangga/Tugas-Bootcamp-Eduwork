@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')

<div class="container mt-5">

    @include('includes.alert')

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card mb-5">

                <div class="card-header">
                    <h4>Edit Kategori</h4>
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.categories.update', $category) }}"
                          method="POST"
                           enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        @include('admin.categories.form')

                        <button type="submit"
                                class="btn btn-warning">
                            Update
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