@extends('layouts.app')

@section('content')




<div class="register-container">
    <div class="register-card">
        <div class="register-header">
            <div class="register-icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <h1 class="register-title">Create Account</h1>
            <p class="register-subtitle">Join Nas Events and start booking amazing experiences</p>
        </div>

        @if ($errors->any())
            <div class="alert-register alert-danger">
                <i class="fas fa-exclamation-circle"></i>
                <div>
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" id="registerForm">
            @csrf

            <div class="form-group-register">
                <label for="name" class="form-label-register">
                    <i class="fas fa-user"></i>Full Name<span class="required-mark">*</span>
                </label>
                <input id="name" type="text" 
                       class="form-control-register @error('name') is-invalid @enderror" 
                       name="name" 
                       value="{{ old('name') }}" 
                       placeholder="Enter your full name"
                       required 
                       autofocus>
                @error('name')
                    <span class="invalid-feedback-register">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group-register">
                <label for="email" class="form-label-register">
                    <i class="fas fa-envelope"></i>E-Mail Address<span class="required-mark">*</span>
                </label>
                <input id="email" type="email" 
                       class="form-control-register @error('email') is-invalid @enderror" 
                       name="email" 
                       value="{{ old('email') }}" 
                       placeholder="Enter your email address"
                       required>
                @error('email')
                    <span class="invalid-feedback-register">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group-register">
                <label for="tel" class="form-label-register">
                    <i class="fas fa-tel"></i>Phone Number
                </label>
                <input id="tel" type="tel" 
                       class="form-control-register @error('tel') is-invalid @enderror" 
                       name="tel" 
                       value="{{ old('tel') }}" 
                       placeholder="Enter your phone number (optional)">
                <small class="form-help-text">Optional: For event updates and notifications</small>
                @error('phone')
                    <span class="invalid-feedback-register">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group-register">
                <label for="password" class="form-label-register">
                    <i class="fas fa-lock"></i>Password<span class="required-mark">*</span>
                </label>
                <input id="password" type="password" 
                       class="form-control-register @error('password') is-invalid @enderror" 
                       name="password" 
                       placeholder="Create a strong password"
                       required
                       onkeyup="checkPasswordStrength()">
                <div class="password-strength" id="passwordStrength" style="display: none;">
                    <div class="strength-bar">
                        <div class="strength-fill" id="strengthBar"></div>
                    </div>
                    <small id="strengthText"></small>
                </div>
                <small class="form-help-text">Minimum 8 characters</small>
                @error('password')
                    <span class="invalid-feedback-register">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group-register">
                <label for="password-confirm" class="form-label-register">
                    <i class="fas fa-lock"></i>Confirm Password<span class="required-mark">*</span>
                </label>
                <input id="password-confirm" type="password" 
                       class="form-control-register" 
                       name="password_confirmation" 
                       placeholder="Re-enter your password"
                       required>
            </div>

            <div class="terms-section">
                By registering, you agree to our 
                <a href="#">Terms of Service</a> and 
                <a href="#">Privacy Policy</a>
            </div>

            <div class="register-actions">
                <button type="submit" class="btn-register-submit">
                    <i class="fas fa-user-check"></i>
                    <span>Create Account</span>
                </button>
            </div>
        </form>

        <div class="login-section">
            <p class="login-text">Already have an account?</p>
            <a href="{{ route('login') }}" class="btn-login-link">
                <i class="fas fa-sign-in-alt"></i> Log In
            </a>
        </div>
    </div>
</div>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<script>
function checkPasswordStrength() {
    const password = document.getElementById('password').value;
    const strengthDiv = document.getElementById('passwordStrength');
    const strengthBar = document.getElementById('strengthBar');
    const strengthText = document.getElementById('strengthText');
    
    if (password.length === 0) {
        strengthDiv.style.display = 'none';
        return;
    }
    
    strengthDiv.style.display = 'block';
    
    let strength = 0;
    if (password.length >= 8) strength++;
    if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength++;
    if (password.match(/[0-9]/)) strength++;
    if (password.match(/[^a-zA-Z0-9]/)) strength++;
    
    strengthBar.className = 'strength-fill';
    
    if (strength <= 2) {
        strengthBar.classList.add('strength-weak');
        strengthText.textContent = 'Weak password';
        strengthText.style.color = '#e74c3c';
    } else if (strength === 3) {
        strengthBar.classList.add('strength-medium');
        strengthText.textContent = 'Medium password';
        strengthText.style.color = '#f39c12';
    } else {
        strengthBar.classList.add('strength-strong');
        strengthText.textContent = 'Strong password';
        strengthText.style.color = '#27ae60';
    }
}
</script>
@endsection
