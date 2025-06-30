@extends('layouts.layout')

@section('title', 'Foxly Alpha - Home')

@section('content')
<div class="text-center">
    <h1 class="page-title mb-4">Enter Your Long URL</h1>
    <form action="/shorten" method="POST" class="w-100 mx-auto mt-3" style="max-width: 700px;">
        @csrf
        <div class="input-group">
            <input type="url" name="original_url" class="form-control" placeholder="Enter long URL" required>
            <button class="btn btn-danger ms-2" type="submit">Shorten</button>
        </div>
    </form>

    {{-- Success Message with Short Link --}}
    @if(session('success') && session('short_link'))
        <div class="alert alert-success alert-dismissible fade show mt-4 d-inline-block w-50 text-start" role="alert">
            <strong>{{ session('success') }}</strong><br>
            Here is your short URL:
            <a href="{{ session('short_link') }}" target="_blank">{{ session('short_link') }}</a>
            <button class="btn btn-sm btn-outline-secondary ms-2 copy-btn" data-url="{{ session('short_link') }}">
                <i class="bi bi-clipboard"></i> Copy
            </button>
            <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="mt-5 text-start mx-auto" style="max-width: 700px;">
        <h4 class="mt-4 text-danger"><strong>Simple and fast URL shortener!</strong></h4>
        <p>
            ShortURL allows to shorten long links from Instagram, Facebook, YouTube, Twitter, LinkedIn, WhatsApp, TikTok, blogs and sites.
            Just paste the long URL and click the Shorten URL button. On the next page, copy the shortened URL and share it on sites, chat and emails.
            After shortening the URL, check how many clicks it received.
        </p>

        <h4 class="mt-4 text-danger"><strong>Shorten, share and track</strong></h4>
        <p>
            Your shortened URLs can be used in publications, documents, advertisements, blogs, forums, instant messages, and other locations.
            Track statistics for your business and projects by monitoring the number of hits from your URL with our click counter.
        </p>
    </div>

    <div class="alert alert-info mt-5 text-start mx-auto w-100" style="max-width: 700px;">
        <h5 class="text-danger mb-2"><strong>Want more features?</strong></h5>
        <p class="mb-1">Register a free account to unlock the full potential of <strong>Foxly</strong>:</p>
        <ul class="mb-1">
            <li>📊 Access your personal <strong>dashboard</strong> to manage all your links</li>
            <li>🔧 Create <strong>custom short slugs</strong> for better branding</li>
            <li>📈 Track link performance with a <strong>click counter</strong></li>
            <li>✏️ Update or <strong>change your redirect URLs</strong> anytime</li>
        </ul>
        <p class="mb-0">Ready to take control? <a href="{{ route('register') }}">Create your free account now</a>!</p>
    </div>

    <div class="mt-5 text-muted">
        <strong>{{ $totalLinks }}</strong> links have been shortened using Foxly.
    </div>
</div>
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.copy-btn').forEach(function (button) {
            button.addEventListener('click', function () {
                const url = button.getAttribute('data-url');
                navigator.clipboard.writeText(url).then(() => {
                    button.innerHTML = '<i class="bi bi-check-circle"></i> Copied';
                    setTimeout(() => {
                        button.innerHTML = '<i class="bi bi-clipboard"></i> Copy';
                    }, 1500);
                });
            });
        });
    });
</script>
@endpush

@endsection
