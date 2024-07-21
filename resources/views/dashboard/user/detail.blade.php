@extends('layouts.custom')

@section('title', 'Detail User')

@section('content')
    {{-- start logo and back --}}
    <nav class="navbar navbar-light">
        <div class="container d-block">
            <a href="{{ route($users_route['index']) }}"><i class="bi bi-chevron-left"></i></a>
            <a class="navbar-brand ms-4" href="{{ route($users_route['index']) }}">
                {{-- <img src="{{ asset('assets/img/logo-kos.svg') }}"> --}}
            </a>
        </div>
    </nav>
    {{-- endt logo and back --}}
    <div class="card-header">
        <h4 class="card-title">Detail User</h4>
    </div>

    <div class="card-body">
        <div class="mb-3">
            <label class="form-label">Usernama</label>
            <span class="form-control border-1 border-primary">{{ $user->name }}</span>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <span class="form-control border-1 border-primary">{{ $user->email }}</span>
        </div>
        <div class="mb-3">
            <label class="form-label">Role</label>
            <span class="form-control border-1 border-primary">
                @if ($user->role == 'superadmin')
                    Superadmin
                @elseif($user->role == 'admin')
                    Admin
                @else
                    User
                @endif
            </span>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <span class="form-control border-1 border-primary">
                @if ($user->email_verified_at != null)
                    <div class="badge bg-success">Verified</div>
                @else
                    <div class="badge bg-warning">Unverified</div>
                @endif
            </span>
        </div>
    </div>
@endsection
