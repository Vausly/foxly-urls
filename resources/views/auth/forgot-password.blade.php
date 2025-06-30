@extends('layouts.layout')

@section('title', 'Forgot Password')

@section('content')
<div class="container mt-5" style="max-width: 400px;">
    <h3 class="mb-3 text-danger">Forgot Your Password?</h3>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    @if ($errors->has('email'))
        <div class="alert alert-danger">{{ $errors->first('email') }}</div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" required autofocus>
        </div>
        <button type="submit" class="btn btn-danger">Send Password Reset Link</button>
    </form>
</div>
@endsection
