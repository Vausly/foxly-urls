@extends('layouts.layout')

@section('title', 'Register')

@section('content')
<div class="container mt-5" style="max-width: 400px;">
    <h3 class="mb-3 text-danger">Register</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Display Name</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password (min. 8 characters)</label>
            <input type="password" name="password" class="form-control" required minlength="8">
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-danger w-100">Register</button>

        <div class="mt-3 text-center">
            <a href="{{ route('login') }}">Already have an account? Login</a>
        </div>
    </form>
</div>
@endsection
