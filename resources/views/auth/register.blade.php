@extends('layouts.auth')

@section('title', 'Register')
@section('auth_card_max_width', '500px')
@section('auth_subtitle', 'Create your account to access the dashboard')

@section('auth_form')
    <form action="{{ route('register.store') }}" method="post" novalidate>
        @csrf
        <div class="field-group">
            <label for="name" class="field-label">Full Name</label>
            <div class="input-wrap">
                <i class="fas fa-user"></i>
                <input id="name" type="text" name="name" class="auth-input @error('name') is-invalid @enderror"
                    placeholder="Enter your full name" value="{{ old('name') }}" required autofocus>
            </div>
            @error('name')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="field-group">
            <label for="email" class="field-label">Email Address</label>
            <div class="input-wrap">
                <i class="fas fa-envelope"></i>
                <input id="email" type="email" name="email" class="auth-input @error('email') is-invalid @enderror"
                    placeholder="you@example.com" value="{{ old('email') }}" required>
            </div>
            @error('email')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="field-group">
            <label for="password" class="field-label">Password</label>
            <div class="input-wrap">
                <i class="fas fa-lock"></i>
                <input id="password" type="password" name="password"
                    class="auth-input @error('password') is-invalid @enderror"
                    placeholder="Minimum 8 characters" required>
            </div>
            @error('password')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="field-group">
            <label for="password_confirmation" class="field-label">Confirm Password</label>
            <div class="input-wrap">
                <i class="fas fa-lock"></i>
                <input id="password_confirmation" type="password" name="password_confirmation"
                    class="auth-input" placeholder="Retype your password" required>
            </div>
        </div>

        <button type="submit" class="auth-btn">Create Account</button>

        <p class="auth-footer">
            Already have an account?
            <a href="{{ route('login') }}" class="auth-link">Sign in now</a>
        </p>
    </form>
@endsection
