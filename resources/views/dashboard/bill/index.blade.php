@extends('layouts.app')

@section('title', 'Data Bill')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Bill</h3>
                    <p class="text-subtitle text-muted">
                        Who does not love Fam's Kost
                    </p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/home">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="#">Payment</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Table head options start -->
        <section class="section">
            <div class="row" id="table-head">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Table Data Penyewa
                            </h4>
                        </div>

                        {{-- alert succes --}}
                        @if (session()->has('success'))
                            <div class="col-md-5 p-0">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close py-0 py-3" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                        @endif
                        {{-- end alert succes --}}
                        <div class="card-content">
                            <div class="card-body">
                                <p>
                                    "Welcome to our web page showcasing the transaksi data of our boarding house, where
                                    comfort and convenience come together in one place."
                                </p>
                                <a href="{{ route($bill_route['create']) }}" class="btn icon icon-left btn-primary"><i
                                        data-feather="user-plus"></i>
                                    Add Data</a>
                            </div>

                            <!-- table head dark -->
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bills as $bill)
                                            <tr>
                                                <td class="text-bold-500">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="text-bold-500">
                                                    {{ $bill->name }}
                                                </td>
                                                <td class="text-bold-500">
                                                    {{ $bill->month }} - {{ $bill->year }}
                                                </td>
                                                <td class="text-bold-500">
                                                    {{ $bill->total_price }}
                                                </td>
                                                <td class="text-bold-500">
                                                    {{ $bill->status }}
                                                </td>
                                                <td>
                                                    <a href="{{ route($bill_route['show'], $bill->id) }}"
                                                        class="btn icon btn-primary" title="Detail"><i
                                                            class="bi bi-eye"></i></a>
                                                    <form action="{{ route($bill_route['delete'], $bill->id) }}"
                                                        class="d-inline" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button onclick="return confirm('Konfirmasi hapus data ?')"
                                                            class="btn icon btn-danger" title="Delete"><i
                                                                class="bi bi-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{-- pagination --}}
                            <div class="m-3 pagination pagination-primary">
                                {{ $bills->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Table head options end -->
    </div>
@endsection
