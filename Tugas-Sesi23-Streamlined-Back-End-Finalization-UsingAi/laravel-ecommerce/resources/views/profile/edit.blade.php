@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')

<div class="container mt-5 mb-5">

    <h1 class="mb-4">Profil Saya</h1>

    <div class="row g-4">

        <div class="col-lg-8">

            {{-- INFORMASI PROFIL --}}
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- UBAH PASSWORD --}}
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- HAPUS AKUN --}}
            <div class="card border-0 shadow-sm mb-4" style="border-color: #f5c2c7;">
                <div class="card-body p-4">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>

    </div>

</div>

@endsection