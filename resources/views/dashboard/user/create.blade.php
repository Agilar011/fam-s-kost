@extends('layouts.custom')

@section('title', 'Form User')

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
        <h4 class="card-title">Form Penyewa</h4>
    </div>
    <div class="card-body">
        <form action="{{ route($users_route['store']) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Member Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    placeholder="Member Name" value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- email --}}
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                    id="email" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- password --}}
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" name="password" class="form-control @error('password') is-invalid @enderror"
                    id="password" value="{{ old('password') }}">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- role --}}
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-select @error('role') is-invalid @enderror" name="role" id="role">
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                </select>
                @error('role')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- <a href="{{ route($dormitory_route["index"]) }}" class="btn btn-secondary">Back</a> --}}
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
