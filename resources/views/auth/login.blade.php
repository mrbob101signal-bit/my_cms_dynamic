@extends('layouts.auth')

@section('title', 'Login')
@section('auth_subtitle', 'Sign in to manage your dashboard')

@section('auth_form')
    <form action="{{ route('login.attempt') }}" method="post" novalidate>
        @csrf
        <div class="field-group">
            <label for="email" class="field-label">Email Address</label>
            <div class="input-wrap">
                <i class="fas fa-envelope"></i>
                <input id="email" type="email" name="email" class="auth-input @error('email') is-invalid @enderror"
                    placeholder="you@example.com" value="{{ old('email') }}" required autofocus>
            </div>
            @error('email')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="field-group">
            <label for="password" class="field-label">Password</label>
            <div class="input-wrap">
                <i class="fas fa-lock"></i>
                <input id="password" type="password" name="password" class="auth-input @error('password') is-invalid @enderror"
                    placeholder="Enter your password" required>
            </div>
            @error('password')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="auth-meta">
            <label class="remember-wrap" for="remember">
                <input type="checkbox" id="remember" name="remember">
                <span>Remember me</span>
            </label>
            <a href="{{ route('website.home') }}" class="auth-link">Back to website</a>
        </div>

        <button type="submit" class="auth-btn">Sign In</button>

        <p class="auth-footer">
            New here?
            <a href="{{ route('register') }}" class="auth-link">Create an account</a>
        </p>
    </form>
@endsection
