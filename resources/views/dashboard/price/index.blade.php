@extends('layouts.app')

@section('title', 'Data Price')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Price</h3>
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
                                <a href="#">Price</a>
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
                                Table Data Data Price
                            </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <p>
                                    "Welcome to our web page showcasing the user data of our boarding house, where comfort
                                    and convenience come together in one place."
                                </p>
                                <a href="{{ route('prices.create') }}" class="btn icon icon-left btn-primary"><i
                                        data-feather="user-plus"></i>
                                    Add Data</a>
                            </div>

                            <!-- table head dark -->
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No.</th>
                                            <th>name</th>
                                            <th>price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($prices as $index => $price)
                                            <tr>
                                                <td class="text-bold-500">
                                                    {{ $index + $prices->firstItem() }}
                                                </td>
                                                <td class="text-bold-500">
                                                    {{ $price->name }}
                                                </td>
                                                <td class="text-bold-500">
                                                    {{ $price->price }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('prices.show', $price->id) }}"
                                                        class="btn icon btn-primary" title="Detail"><i
                                                            class="bi bi-eye"></i></a>
                                                    <a href="{{ route('prices.edit', $price->id) }}"
                                                        class="btn icon btn-warning" title="Edit"><i
                                                            class="bi bi-pencil-square"></i></a>
                                                    <form action="{{ route('prices.destroy', $price->id) }}" method="post"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button onclick="return confirm('Konfirmasi hapus data ?')"
                                                            class="btn icon btn-danger" title="Delete"><i
                                                                class="bi bi-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No Data Found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="m-3 pagination pagination-primary">
                                {{ $prices->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Table head options end -->
    </div>
@endsection
