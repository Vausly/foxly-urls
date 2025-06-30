@extends('layouts.layout')

@section('title', 'Reset Password')

@section('content')
<div class="container mt-5" style="max-width: 400px;">
    <h3 class="mb-3 text-danger">Reset Password</h3>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <!-- Token Hidden Input -->
        <input type="hidden" name="token" value="{{ request()->route('token') }}">

        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" name="email" id="email"
                   class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email', request()->email) }}" required autofocus>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">New Password</label>
            <input type="password" name="password" id="password"
                   class="form-control @error('password') is-invalid @enderror" required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm New Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                   class="form-control" required>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-danger">Reset Password</button>
        </div>
    </form>
</div>
@endsection
