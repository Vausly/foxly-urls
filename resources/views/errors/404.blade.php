@extends('layouts.layout')

@section('title', '404 Not Found')

@section('content')
<div class="text-center my-5 py-5">
    <h1 class="display-1 text-danger fw-bold">404</h1>
    <h2 class="mb-4">Oops! Page Not Found</h2>
    <p class="mb-4 text-muted">
        The page you're looking for doesn't exist or may have been moved.
    </p>
    <a href="{{ url('/') }}" class="btn btn-danger">
        <i class="bi bi-arrow-left"></i> Back to Home
    </a>
</div>
@endsection
