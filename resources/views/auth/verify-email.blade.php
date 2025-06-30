@extends('layouts.layout')

@section('title', 'Email Verification')

@section('content')
<div class="container mt-5" style="max-width: 500px;">
    <h3 class="mb-3 text-danger">Verify Your Email Address</h3>

    @if (session('status') === 'verification-link-sent')
        <div class="alert alert-success">
            A new verification link has been sent to your email address.
        </div>
    @endif

    <p class="mb-3">
        Before proceeding, please check your email for a verification link.
        If you did not receive the email,
        you can request another below.
    </p>

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="btn btn-danger">Resend Verification Email</button>
    </form>
</div>
@endsection
