@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
    <div class="page-heading">
        <h3>Dashboard Fam's Kost</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                        <div class="stats-icon purple mb-2">
                                            <i class="iconly-boldFilter"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">
                                            Rooms Data
                                        </h6>
                                        <h6 class="font-extrabold mb-0">
                                            {{ $total_rooms }} Rooms
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                        <div class="stats-icon blue mb-2">
                                            <i class="iconly-boldAdd-User"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">
                                            Members Data
                                        </h6>
                                        <h6 class="font-extrabold mb-0">
                                            {{ $total_dormitories }} Members
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                        <div class="stats-icon green mb-2">
                                            <i class="iconly-boldShield-Done"></i>

                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">
                                            Deals Data
                                        </h6>
                                        <h6 class="font-extrabold mb-0">
                                            {{ $total_transactions }} Deals
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                        <div class="stats-icon red mb-2">
                                            <i class="iconly-boldProfile"></i>

                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">
                                            Users Data
                                        </h6>
                                        <h6 class="font-extrabold mb-0">
                                            {{ $total_users }} Users
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Pricing</h3>
                    <p class="text-subtitle text-muted">Present fo your convenience</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pricing</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row pb-3">
            @foreach ($show_price as $price)
                <div class="col-4">
                    <div class="card h-100">
                        <div class="card-content">
                            <div class="card-body  text-center">
                                <h2 class="card-title">{{ $price->name }}</h2>
                                <p class="card-text">{{ $price->description }}</p>
                            </div>
                            <h1 class="price text-center">{{ $price->price }}</h1>
                            {{-- <img class="img-fluid w-100" src="{{ asset('assets/img/bad-room.png') }}" alt="Card image cap"> --}}
                        </div>
                        <div class="card-footer text-center">
                            {{-- <span>{{ $price->price }}</span> --}}
                            <a href="{{ route('bill.create') }}" class="btn btn-light-primary">Pay Now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
