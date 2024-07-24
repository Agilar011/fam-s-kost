@extends('layouts.custom')

@section('title', 'Form Transaction')

@section('content')
    {{-- start logo and back --}}
    <nav class="navbar navbar-light">
        <div class="container d-block">
            <a href="{{ route($transactions_route['index']) }}"><i class="bi bi-chevron-left"></i></a>
            <a class="navbar-brand ms-4" href="{{ route($transactions_route['index']) }}">
                {{-- <img src="{{ asset('assets/img/logo-kos.svg') }}"> --}}
            </a>
        </div>
    </nav>
    {{-- endt logo and back --}}
    <div class="card-header">
        <h4 class="card-title">Detail Transaction</h4>
    </div>

    <div class="card-body">
        {{-- <form action="" method="POST"> --}}
        <div class="mb-3">
            <label class="form-label">Penghuni Kos | Kamar</label>
            <span class="form-control border-1 border-primary">{{ $transaction->member->name }} | Kamar
                {{ $transaction->member->rooms[0]->room_number }}</span>
        </div>
        <div class="mb-3">
            <label class="form-label">Total Bulan Bayar</label>
            <span class="form-control border-1 border-primary">{{ $transaction->total_month }}</span>
        </div>
        <div class="mb-3">
            <label class="form-label">Dari Tanggal</label>
            <span class="form-control border-1 border-primary">{{ $transaction->from }}</span>
        </div>
        <div class="mb-3">
            <label class="form-label">Sampai Tanggal</label>
            <span class="form-control border-1 border-primary">{{ $transaction->to }}</span>
        </div>
        <div class="mb-3">
            <label class="form-label">Jenis Pembayaran</label>
            <span class="form-control border-1 border-primary">{{ $transaction->kindpayment->name }}</span>
        </div>
        @if ($transaction->kindpayment->need_image)
            <div class="row mb-3 p-0 flex-column">
                <div class="col-md-8 col-lg-5 mb-3">
                    <span class="form-label text-success fw-bold">Bukti Pembayaran</span>
                </div>
                <div class="col-md-8 col-lg-5">
                    <img class="mx-sm-auto-custom" src="{{ asset('storage/' . $transaction->proof_payment) }}"
                        alt="Gambar" width="90%"
                        style="display: block; aspect-ratio: 9/16; object-fit:cover; border:solid;" />
                </div>
            </div>
        @endif

        {{-- </form> --}}
    </div>
@endsection
