@extends('layouts.layout')

@section('title', 'Login')

@section('content')
<div class="container mt-5" style="max-width: 400px;">
    <h3 class="mb-3 text-danger">Login</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" required autofocus>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="remember" class="form-check-input" id="remember">
            <label class="form-check-label" for="remember">Remember Me</label>
        </div>

        <button type="submit" class="btn btn-danger w-100">Login</button>

        <div class="mt-3 text-center">
            <small>Don't have an account? <a href="{{ route('register') }}">Create an account</a></small>
        </div>
        <div class="mt-3 text-center">
            <small>Forgot your password? <a href="{{ route('password.request') }}">Reset your password</a></small>
        </div>
    </form>
</div>
@endsection
