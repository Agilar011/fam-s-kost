@extends('layouts.authorisation')
@section('title', 'reset')
@section('content')
    <div class="auth-logo">
        {{-- <a href="#"><img src="{{ asset('assets/img/logo-kos.svg') }}" alt="Logo"></a> --}}
    </div>
    <h1 class="auth-title">Reset Password</h1>
    <p class="auth-subtitle mb-5">Input your email and we will send you reset password link.</p>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input name="token" type="text" value="{{ $request->token }}" hidden>
        <div class="form-group position-relative has-icon-left mb-4">
            <input name="email" type="email" class="form-control form-control-xl" placeholder="Email"
                value="{{ $request->email }}" autofocus>
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
                class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="New Password">
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
        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Reset Password</button>
    </form>
    <div class="text-center mt-5 text-lg fs-4">
        <p class='text-gray-600'>Remember your account? <a href="{{ route('login') }}" class="font-bold">Log in</a>.
        </p>
    </div>
@endsection
