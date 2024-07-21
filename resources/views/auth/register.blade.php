@extends('layouts.authorisation')
@section('title', 'Register')
@section('content')
    <div class="auth-logo">
        {{-- <a href="index.html"><img src="{{ asset('assets/img/logo-kos.svg') }}" alt="Logo"></a> --}}
    </div>
    <h1 class="auth-title">Sign Up</h1>
    <p class="auth-subtitle mb-5">Input your data to register to our website.</p>

    <form method="POST">
        @csrf
        <div class="form-group position-relative has-icon-left mb-4">
            <input name="name" type="text" class="form-control form-control-xl @error('name') is-invalid @enderror"
                placeholder="Name" value="{{old('name')}}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <div class="form-control-icon">
                <i class="bi bi-person"></i>
            </div>
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input name="email" type="email" class="form-control form-control-xl @error('email') is-invalid @enderror"
                placeholder="Email" value="{{old('email')}}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <div class="form-control-icon">
                <i class="bi bi-envelope"></i>
            </div>
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input name="password" type="password"
                class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="Password">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
            </div>
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input name="password_confirmation" type="password" class="form-control form-control-xl"
                placeholder="Password Confirmation">
            <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Sign Up</button>
    </form>
    <div class="text-center mt-5 text-lg fs-4">
        <p class='text-gray-600'>Already have an account? <a href="{{route("login")}}" class="font-bold">Log
                in</a>.</p>
    </div>
@endsection
