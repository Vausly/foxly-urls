@extends('layouts.layout')

@section('title', 'Pricing')

@section('content')
<div class="container ">
    <div class="text-center mb-5">
        <h1 class="text-danger">Pricing</h1>
    </div>

    <div class="card border-danger mx-auto" style="max-width: 500px;">
        <div class="card-header bg-danger text-white text-center">
            <h2 class="mb-0">FREE</h2>
        </div>
        <div class="card-body text-center">
            <h3 class="card-title mb-3">It's freeee!!! 🦊🦊🦊</h3>
            <ul class="list-unstyled mb-4">
                <li><i class="bi bi-check-circle-fill text-success"></i> Unlimited URLs</li>
                <li><i class="bi bi-check-circle-fill text-success"></i> Unlimited Link Clicks</li>
                <li><i class="bi bi-check-circle-fill text-success"></i> Custom slug support</li>
                <li><i class="bi bi-check-circle-fill text-success"></i> Click analytics</li>
                <li><i class="bi bi-check-circle-fill text-success"></i> No ads!</li>
            </ul>
            <p class="text-muted">
                Foxly is a completely free service with no hidden fees, no subscriptions, and no annoying ads. Hooraaaaay! 🦊🦊🦊
            </p>
            <p class="text-muted">
                You can <a href="https://vausly.ch/tip" target="_blank">support this project by donate</a>.
            </p>
            <a href="{{ route('register') }}" class="btn btn-danger mt-3">Get Started for Free</a>
        </div>
    </div>
</div>
@endsection

@push('head')
<!-- Optional: Bootstrap Icons if not yet included -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endpush
