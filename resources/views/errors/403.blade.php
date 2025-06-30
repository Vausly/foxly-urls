@extends('layouts.layout')

@section('title', '403 Forbidden')

@section('content')
<div class="container text-center mt-5">
    <h1 class="display-3 text-danger">403</h1>
    <h2 class="mb-3">Access Denied</h2>
    <p class="text-muted">You do not have permission to access this resource.</p>
    <a href="{{ url('/') }}" class="btn btn-danger mt-3">Back to Home</a>
</div>
@endsection
