@extends('layouts.authorisation')
@section('title', 'verify')
@section('content')
    <div class="auth-logo">
        {{-- <a href="index.html"><img src="{{ asset('assets/img/logo-kos.svg') }}" alt="Logo"></a> --}}
    </div>
    <h1 class="auth-title">Verify Email</h1>
    @if (session('status') == 'verification-link-sent')
        <div class="mb-4  ">
            A new email verification link has been emailed to you!
        </div>
    @else
        <div class="mb-4 ">
            A new email verification link has been emailed to you!
        </div>
    @endif
    <form action="{{ route('verification.send') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Resend Email</button>
    </form>
@endsection
