@extends('layouts.app')

@section('title', 'Members')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Members</h3>
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
                                <a href="#">Member</a>
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
                                Table Data Members
                            </h4>
                        </div>

                        {{-- alert succes --}}
                        @if (session()->has("success"))
                        <div class="col-md-5 p-0">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session("success") }}
                                <button type="button" class="btn-close py-0 py-3" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                    {{-- end alert succes --}}
                        <div class="card-content">
                            <div class="card-body">
                                <p>
                                    "Welcome to our web page showcasing the member data of our boarding house, where comfort
                                    and convenience come together in one place."
                                </p>
                                <a href="{{route($member_route["create"])}}" class="btn icon icon-left btn-primary"><i data-feather="user-plus"></i>
                                    Add Data</a>
                            </div>

                            <!-- table head dark -->
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Number</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($members as $member)
                                            <tr>
                                                <td class="text-bold-500">

                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="text-bold-500">
                                                    {{ $member->name }}
                                                </td>
                                                <td class="text-bold-500">{{ $member->address }}</td>
                                                <td class="text-bold-500">{{ $member->phone_number }}</td>
                                                <td>
                                                    <a href="{{ route($member_route['show'], $member->id) }}"
                                                        class="btn icon btn-primary" title="Detail"><i
                                                            class="bi bi-eye"></i></a>
                                                    <a href="{{ route($member_route['edit'], $member->id) }}"
                                                        class="btn icon btn-warning" title="Edit"><i
                                                            class="bi bi-pencil-square"></i></a>
                                                    {{-- <a href="" class="btn icon btn-danger" title="Delete"><i
                                                            class="bi bi-trash"></i></a> --}}
                                                            <form action="{{ route($member_route["delete"], $member->id) }}" class="d-inline" method="post">
                                                                @csrf
                                                                @method("delete")
                                                                <button onclick="return confirm('Konfirmasi hapus data ?')" class="btn icon btn-danger" title="Delete"><i
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
                                {{ $members->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Table head options end -->
    </div>
@endsection
