@extends('layouts.layout')

@section('title', 'Foxly Alpha - Stats')

@section('content')
<div class="container mt-5 text-center">
    <h2 class="text-danger mb-4">📊 Foxly Usage Statistics</h2>

    <div class="row justify-content-center">
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="text-danger">{{ $totalUsers }}</h4>
                    <p class="mb-0">Registered Users</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="text-danger">{{ $totalLinks }}</h4>
                    <p class="mb-0">Shortened Links</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="text-danger">{{ $totalClicks }}</h4>
                    <p class="mb-0">Total Clicks</p>
                </div>
            </div>
        </div>
    </div>

    <p class="mt-4 text-muted">Updated in real time from the Foxly database.</p>
</div>
@endsection
