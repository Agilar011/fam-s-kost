@extends('layouts.custom')

@section('title', 'Bill Detail')

@section('content')
    {{-- start logo and back --}}
    <nav class="navbar navbar-light">
        <div class="container d-block">
            <a href="{{ route($bill_route['index']) }}"><i class="bi bi-chevron-left"></i></a>
            <a class="navbar-brand ms-4" href="{{ route($bill_route['index']) }}">
                {{-- <img src="{{ asset('assets/img/logo-kos.svg') }}"> --}}
            </a>
        </div>
    </nav>
    {{-- endt logo and back --}}
    <div class="card-header">
        <h4 class="card-title">Detail Bill</h4>
    </div>

    <div class="card-body">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <span class="form-control border-1 border-primary">{{ $bill->name }}</span>
        </div>
        <div class="mb-3">
            <label class="form-label">Date</label>
            <span class="form-control border-1 border-primary">{{ $bill->month }} - {{ $bill->year }}</span>
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <span class="form-control border-1 border-primary">{{ $bill->total_price }}</span>
        </div>
        {{-- </form> --}}
    </div>
@endsection
