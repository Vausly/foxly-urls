@extends('layouts.layout')

@section('title', 'Dashboard')

@section('content')
<style>
    .pagination .page-link {
        color: #a10000;
    }
    .pagination .active .page-link {
        background-color: #a10000;
        border-color: #a10000;
        color: white;
    }
    .truncate-link {
        max-width: 280px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        display: inline-block;
        vertical-align: middle;
    }
    @media (max-width: 576px) {
        .truncate-link {
            max-width: 160px;
        }
    }
    .icon-btn {
        background: none;
        border: none;
        padding: 5px;
        font-size: 1.1rem;
        color: #a10000;
    }
    .icon-btn:hover {
        color: #600000;
    }
    .table td, .table th {
        vertical-align: middle;
    }
    .shortener-form {
        margin-bottom: 30px;
    }
</style>

<h2 class="text-danger mb-4">Dashboard</h2>

{{-- Form pemendek URL --}}
<div class="shortener-form">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ url('/shorten') }}" method="POST" class="d-flex flex-wrap flex-md-nowrap gap-2">
        @csrf
        <input type="url" name="original_url" class="form-control" placeholder="Enter your long URL here..." required style="min-width: 0;">
        <button type="submit" class="btn btn-danger flex-shrink-0">Shorten</button>
    </form>
</div>

{{-- Form Pencarian --}}
<form action="{{ route('dashboard') }}" method="GET" class="mb-4 d-flex flex-nowrap gap-2" style="max-width: 400px;">
    <input type="text" name="search" class="form-control" placeholder="Search original or short URL..." value="{{ request('search') }}">
    <button type="submit" class="btn btn-danger">Search</button>
</form>

{{-- Tabel --}}
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>Original URL</th>
                <th>Shortened URL</th>
                <th>Clicks</th>
                <th>Actions</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($links as $index => $link)
                <tr>
                    <td>{{ ($links->currentPage() - 1) * $links->perPage() + $index + 1 }}</td>
                    <td>
                        <a href="{{ $link->original_url }}" class="truncate-link" title="{{ $link->original_url }}" target="_blank">
                            {{ $link->original_url }}
                        </a>
                    </td>
                    <td>
                        <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center gap-2">
                            <a href="{{ url($link->short_slug) }}" target="_blank">
                                {{ url($link->short_slug) }}
                            </a>
                        </div>
                    </td>
                    <td>
                        <span class="text-muted small">{{ $link->clicks ?? 0 }} clicks</span>
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <button class="icon-btn copy-btn" title="Copy Link" data-url="{{ url($link->short_slug) }}">
                                <i class="bi bi-clipboard"></i>
                            </button>
                            <a href="/dashboard/edit/{{ $link->id }}" class="icon-btn" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <button class="icon-btn" title="Delete" onclick="showDeleteModal({{ $link->id }})">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </td>
                    <td class="text-nowrap">
                        {{ $link->created_at->format('d F Y \a\t H:i') }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No links found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-center">
    {{ $links->appends(request()->query())->links() }}
</div>

{{-- Toast Notification --}}
<div class="position-fixed top-0 end-0 p-3" style="z-index: 1080">
    <div id="copyToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                Link copied to clipboard!
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function showDeleteModal(id) {
        const form = document.getElementById('deleteForm');
        form.action = `/dashboard/delete/${id}`;
        const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
        modal.show();
    }

    document.addEventListener('DOMContentLoaded', function () {
        const toastEl = document.getElementById('copyToast');
        const toast = new bootstrap.Toast(toastEl);

        document.querySelectorAll('.copy-btn').forEach(button => {
            button.addEventListener('click', () => {
                const url = button.getAttribute('data-url');
                navigator.clipboard.writeText(url).then(() => {
                    button.innerHTML = '<i class="bi bi-check-circle"></i>';
                    toast.show();
                    setTimeout(() => {
                        button.innerHTML = '<i class="bi bi-clipboard"></i>';
                    }, 3000);
                });
            });
        });
    });
</script>
@endpush

@push('head')
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endpush
