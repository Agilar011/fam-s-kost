@extends('layouts.authorisation')
@section('title', 'forgot')
@section('content')
    <div class="auth-logo">
        {{-- <a href="index.html"><img src="{{ asset('assets/img/logo-kos.svg') }}" alt="Logo"></a> --}}
    </div>
    <h1 class="auth-title">Forgot Password</h1>
    <p class="auth-subtitle mb-5">Input your email and we will send you reset password link.</p>
    @if (session('status'))
        <div class="mb-4 text-danger">
            {{ session('status') }}
        </div>
    @endif
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="form-group position-relative has-icon-left mb-4">
            <input name="email" type="email" class="form-control form-control-xl" placeholder="Email">
            <div class="form-control-icon">
                <i class="bi bi-envelope"></i>
            </div>
        </div>
        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Send</button>
    </form>
    <div class="text-center mt-5 text-lg fs-4">
        <p class='text-gray-600'>Remember your account? <a href="{{ route('login') }}" class="font-bold">Log in</a>.
        </p>
    </div>
@endsection
