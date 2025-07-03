@extends('layouts.main')

@section('title', 'Profile')

@section('content')
<style>
    .profile-card {
        background: linear-gradient(120deg, #e3f0ff 0%, #f3e7fe 100%);
        border-radius: 1.5rem;
        box-shadow: 0 4px 24px rgba(80, 80, 200, 0.10);
        padding: 2.5rem 2rem 2rem 2rem;
        margin-bottom: 2rem;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
        animation: profileFadeIn 1s cubic-bezier(.68,-0.55,.27,1.55) 0.1s both;
    }
    @keyframes profileFadeIn {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .profile-title {
        font-size: 2rem;
        font-weight: 700;
        color: #1976f3;
        margin-bottom: 1.5rem;
        text-align: center;
    }
    .profile-label {
        font-weight: 600;
        color: #1976f3;
    }
    .profile-btn {
        background: #1976f3;
        color: #fff;
        font-weight: 600;
        border-radius: 2rem;
        padding: 0.6rem 2rem;
        font-size: 1.1rem;
        box-shadow: 0 4px 16px rgba(80, 80, 200, 0.12);
        border: none;
        transition: 0.2s;
    }
    .profile-btn:hover {
        background: #00bcd4;
        color: #fff;
        transform: scale(1.04);
        box-shadow: 0 8px 32px rgba(80, 80, 200, 0.18);
    }
</style>
<div class="profile-card">
    <div class="profile-title">Profile</div>
    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="name" class="form-label profile-label">Name</label>
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name', auth()->user()->name) }}" required autofocus>
            @error('name')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label profile-label">Email</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email', auth()->user()->email) }}" required>
            @error('email')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="d-flex justify-content-center gap-2 mt-4">
            <button type="submit" class="profile-btn">Save</button>
        </div>
    </form>
</div>
@endsection
