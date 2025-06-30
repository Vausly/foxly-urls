@extends('layouts.layout')

@section('title', 'Edit Link')

@section('content')
<div class="container" style="max-width: 600px;">
    <h2 class="text-danger mb-4">Edit Link</h2>

    <form action="{{ route('link.update', $link->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="original_url" class="form-label">Original URL</label>
            <input type="url" class="form-control" id="original_url" name="original_url"
                   value="{{ old('original_url', $link->original_url) }}" required>
        </div>

        <div class="mb-3">
            <label for="short_slug" class="form-label">Short Slug</label>
            <input type="text" class="form-control @error('short_slug') is-invalid @enderror" id="short_slug" name="short_slug"
                value="{{ old('short_slug', $link->short_slug) }}"
                minlength="4" maxlength="30" required
                pattern="^[a-zA-Z0-9_-]+$"
                title="Slug must be at least 4 characters, only letters, numbers, dashes (-), and underscores (_) allowed.">
            <small class="text-muted">Slug must be 4–30 characters, alphanumeric, dashes (-), and underscores (_) only.</small>

            @error('short_slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-danger">Update</button>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
