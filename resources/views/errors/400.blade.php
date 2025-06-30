@extends('layouts.layout')

@section('title', '400 Bad Request')

@section('content')
<div class="container text-center mt-5">
    <h1 class="display-3 text-danger">400</h1>
    <h2 class="mb-3">Bad Request</h2>
    <p class="text-muted">The server couldn't understand your request. Please check the URL or try again later.</p>
    <a href="{{ url('/') }}" class="btn btn-danger mt-3">Back to Home</a>
</div>
@endsection
