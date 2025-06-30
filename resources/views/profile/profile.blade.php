@extends('layouts.layout')

@section('title', 'Profile')

@section('content')
<div class="container" style="max-width: 700px;">
    <h2 class="text-danger mb-4">User Profile</h2>

    <div class="d-flex align-items-center mb-4">
        <img src="{{ Auth::user()->profile_photo_url ?? asset('assets/default-avatar.png') }}"
            alt="Profile Photo"
            class="rounded-circle me-3"
            width="80"
            height="80">
        <div>
            <h4 class="mb-1">{{ Auth::user()->name }}</h4>
            <p class="mb-0 text-muted">User ID: {{ Auth::user()->id }}</p>
            <p class="mb-0 text-muted">Joined: {{ Auth::user()->created_at->format('d F Y') }}</p>
            <p class="mb-0 text-muted">Total Short Links: {{ Auth::user()->links()->count() }}</p>
        </div>
    </div>

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Display Name</label>
            <input type="text" class="form-control" id="name" name="name"
                   value="{{ old('name', Auth::user()->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Change Email</label>
            <input type="email" class="form-control" id="email" name="email"
                   value="{{ old('email', Auth::user()->email) }}">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">New Password <small>(leave blank if not changing)</small></label>
            <input type="password" class="form-control" id="password" name="password" minlength="6">
        </div>

        <div class="mb-3">
            <label for="current_password" class="form-label">Confirm Current Password</label>
            <input type="password" class="form-control" id="current_password" name="current_password" required>
        </div>

        <button type="submit" class="btn btn-danger">Update Profile</button>
    </form>
</div>
@endsection
