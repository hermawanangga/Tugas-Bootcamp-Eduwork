@extends('template.layout')
@section('title', 'Contoh halaman blade')
@section('content')
  <div class="container">
    <h1>Nama saya adalah {{ $name }}</h1>
    @foreach ($fruits as $fruit)
      <li>{{ $fruit }}</li>
    @endforeach
  </div>
@endsection