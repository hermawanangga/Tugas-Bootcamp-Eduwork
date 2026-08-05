@extends('layouts.app')

@section('title', 'Detail Kategori')

@section('content')

<div class="container mt-5">

    <div class="card">

        <div class="card-header">
            <h4>Detail Kategori</h4>
        </div>

        <div class="card-body">

            <p>
                <strong>ID :</strong>
                {{ $category->id }}
            </p>

            <p>
                <strong>Nama Kategori :</strong>
                {{ $category->nama_kategori }}
            </p>

            <a href="{{ route('categories.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </div>

    </div>

</div>

@endsection