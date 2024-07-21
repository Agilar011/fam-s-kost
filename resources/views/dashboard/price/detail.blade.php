@extends('layouts.custom')

@section('title', 'Detail Price')

@section('content')
    {{-- start logo and back --}}
    <nav class="navbar navbar-light">
        <div class="container d-block">
            <a href="{{ route($price_route['index']) }}"><i class="bi bi-chevron-left"></i></a>
            <a class="navbar-brand ms-4" href="{{ route($price_route['index']) }}">
                {{-- <img src="{{ asset('assets/img/logo-kos.svg') }}"> --}}
            </a>
        </div>
    </nav>
    {{-- endt logo and back --}}
    <div class="card-header">
        <h4 class="card-title">Detail Price</h4>
    </div>

    <div class="card-body">
        {{-- name --}}
        <div class="mb-3">
            <label class="form-label">Price Name</label>
            <span class="form-control border-1 border-primary">{{ $price->name }}</span>
        </div>
        {{-- price --}}
        <div class="mb-3">
            <label class="form-label">Price</label>
            <span class="form-control border-1 border-primary">{{ $price->price }}</span>
        </div>
        {{-- description --}}
        <div class="mb-3">
            <label class="form-label">Description</label>
            <span class="form-control border-1 border-primary">{{ $price->description }}</span>
        </div>

    </div>
@endsection
