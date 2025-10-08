@extends('layouts.app')

@section('content')
<style>

</style>

<div class="login-container">
    <div class="login-card">
        <div class="login-header">
            <div class="login-icon">
                <i class="fas fa-user-lock"></i>
            </div>
            <h1 class="login-title">Welcome Back</h1>
            <p class="login-subtitle">Log in to access your Nas Events account</p>
        </div>

        @if ($errors->any())
            <div class="alert-login alert-danger">
                <i class="fas fa-exclamation-circle"></i>
                <div>
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            </div>
        @endif

        @if (session('status'))
            <div class="alert-login alert-success">
                <i class="fas fa-check-circle"></i>
                <div>{{ session('status') }}</div>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group-login">
                <label for="email" class="form-label-login">
                    <i class="fas fa-envelope"></i>E-Mail Address
                </label>
                <input id="email" type="email" 
                       class="form-control-login @error('email') is-invalid @enderror" 
                       name="email" 
                       value="{{ old('email') }}" 
                       placeholder="Enter your email address"
                       required 
                       autofocus>
                @error('email')
                    <span class="invalid-feedback-login">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group-login">
                <label for="password" class="form-label-login">
                    <i class="fas fa-lock"></i>Password
                </label>
                <input id="password" type="password" 
                       class="form-control-login @error('password') is-invalid @enderror" 
                       name="password" 
                       placeholder="Enter your password"
                       required>
                @error('password')
                    <span class="invalid-feedback-login">{{ $message }}</span>
                @enderror
            </div>

            <div class="remember-me-section">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">Remember Me</label>
            </div>

            <div class="login-actions">
                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i> Log In
                </button>

                @if (Route::has('password.request'))
                    <a class="forgot-password-link" href="{{ route('password.request') }}">
                        <i class="fas fa-key"></i> Forgot Your Password?
                    </a>
                @endif
            </div>
        </form>

        @if (Route::has('register'))
            <div class="register-section">
                <p class="register-text">Don't have an account?</p>
                <a href="{{ route('register') }}" class="btn-register">
                    <i class="fas fa-user-plus"></i> Create Account
                </a>
            </div>
        @endif
    </div>
</div>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

@endsection