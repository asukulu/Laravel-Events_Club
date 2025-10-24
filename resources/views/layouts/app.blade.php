<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nas Events</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- App CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    

    <style>
     
   
   </style>
</head>

<body>
   <div class="container-fluid d-flex flex-column min-vh-100 p-0">
    

        <!-- Header ... -->

        <main class="container flex-grow-1">
            @yield('content')
        </main>

       
    </div>

        <!-- Modern Fixed Navigation Header -->
        <header class="fixed-top">
            <nav class="navbar navbar-expand-lg modern-navbar">
                <div class="container-fluid px-4">
                    
                    <!-- Logo -->
                    <a class="navbar-brand" href="{{ route('welcome') }}">
                        <img src="/logo/nasevents-logo.svg" alt="Nas Events">
                    </a>
                    
                    <!-- Centered Brand Text -->
                    <div class="position-absolute top-50 start-50 translate-middle">
                        <a class="brand-text" href="{{ route('welcome') }}">
                            Nas Events
                        </a>
                    </div>
                    
                    <!-- Mobile Toggle -->
                    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                        <i class="fas fa-bars text-primary"></i>
                    </button>
                    
                    <!-- Right side items -->
                    <div class="d-flex align-items-center ms-auto">
                        <!-- Search Bar -->
                        @include('components.search')
                        
                        
                        <!-- Profile / Auth -->
                        <div class="ms-3">
                            @guest
                                <a class="auth-link me-2" href="{{ route('login') }}">
                                    <i class="fas fa-sign-in-alt me-1"></i>Login
                                </a>
                                <a class="auth-link" href="{{ route('register') }}">
                                    <i class="fas fa-user-plus me-1"></i>Register
                                </a>
                            @else
                                <div class="dropdown">
                                    <div class="profile-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                    </div>
                                    <ul class="dropdown-menu modern-dropdown dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item modern-dropdown-item" href="#">
                                                <i class="fas fa-user me-2"></i>Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item modern-dropdown-item" href="#">
                                                <i class="fas fa-cog me-2"></i>Settings
                                            </a>
                                        </li>
                                        <li><hr class="modern-dropdown-divider"></li>
                                        <li>
                                            <a class="dropdown-item modern-dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                                            </a>
                                        </li>
                                    </ul>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Main Navigation Menu -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white border-top">
                <div class="container-fluid px-4">
                    <div class="collapse navbar-collapse" id="mainNavbar">
                        <ul class="navbar-nav me-auto align-items-center">
                            
                            <!-- Home Button -->
                            <li class="nav-item me-3">
                                <a class="home-btn {{ Route::currentRouteName() == 'welcome' ? 'active' : 'inactive' }}" 
                                   href="{{ route('welcome') }}">
                                    <i class="fas fa-home me-1"></i>Home
                                </a>
                            </li>

                            <!-- Events Dropdown -->
                            <li class="nav-item dropdown">
                                <a class="modern-nav-link dropdown-toggle" href="#" id="eventsDropdown" 
                                   role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-calendar-alt me-1"></i>Events
                                </a>
                                <ul class="dropdown-menu modern-dropdown">
                                    <li><a class="dropdown-item modern-dropdown-item" href="{{ route('events.index') }}">
                                        <i class="fas fa-list me-2"></i>All Events
                                    </a></li>
                
                                    <li><hr class="modern-dropdown-divider"></li>
                                    <li><a class="dropdown-item modern-dropdown-item" href="{{ route('events.sport') }}">
                                        <i class="fas fa-running me-2"></i>Sports
                                    </a></li>
                                    <li><a class="dropdown-item modern-dropdown-item" href="{{ route('events.culture') }}">
                                        <i class="fas fa-theater-masks me-2"></i>Culture
                                    </a></li>
                                    <li><a class="dropdown-item modern-dropdown-item" href="{{ route('events.others') }}">
                                        <i class="fas fa-star me-2"></i>Others
                                    </a></li>
                                </ul>
                            </li>

                            <!-- About Us -->
                            <li class="nav-item">
                                <a class="modern-nav-link" href="#about-us">
                                    <i class="fas fa-info-circle me-1"></i>About Us
                                </a>
                            </li>

                            <!-- Contacts -->
                            <li class="nav-item">
                                <a class="modern-nav-link" href="{{ route('events.contact') }}">
                                    <i class="fas fa-envelope me-1"></i>Contacts
                                </a>
                            </li>

                            <!-- Manage Events (Auth Required) -->
                            @auth
                                <li class="nav-item dropdown">
                                    <a class="modern-nav-link dropdown-toggle manage-events-link" href="#" id="manageDropdown" 
                                       role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-tools me-1"></i>Manage Events
                                    </a>
                                    <ul class="dropdown-menu modern-dropdown">
                                        <li><a class="dropdown-item modern-dropdown-item" href="{{ route('events.create') }}">
                                            <i class="fas fa-plus me-2"></i>Add Event
                                        </a></li>
                                        @if(auth()->user()->is_admin ?? false)
                                            <li><a class="dropdown-item modern-dropdown-item" href="{{ route('admin.events.index') }}">
                                                <i class="fas fa-user-shield me-2"></i>Admin Panel
                                            </a></li>
                                        @endif
                                    </ul>
                                </li>
                            @endauth
                        </ul>

                        <!-- Booking List -->
                        @auth
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="modern-nav-link" href="{{ route('booking.index') }}">
                                        <i class="fas fa-shopping-cart me-1"></i>Booking List 
                                        <span class="booking-badge">{{ Cart::count() }}</span>
                                    </a>
                                </li>
                            </ul>
                        @endauth
                    </div>
                </div>
            </nav>
        </header>

        <!-- Flash Messages -->
        <main class="container">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

         
        </main>

        <!-- Modern Footer -->
        <footer class="modern-footer">
            <div class="container">
                <div class="footer-content">
                    <div class="footer-links">
                        <a href="{{ route('welcome') }}" class="footer-link">Home</a>
                        <a href="{{ route('events.index') }}" class="footer-link">Events</a>
                        <a href="#about-us" class="footer-link">About</a>
                        <a href="{{ route('events.contact') }}" class="footer-link">Contact</a>
                        <a href="#" class="footer-link">Privacy Policy</a>
                        <a href="#" class="footer-link">Terms of Service</a>
                    </div>
                    <p class="mb-0">&copy; 2024 Nas Events. All rights reserved.</p>
                </div>
            </div>
            @yield('extra-js')
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Navbar Scroll Effect -->
    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.modern-navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>