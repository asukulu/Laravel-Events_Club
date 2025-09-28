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
        body {
            background: linear-gradient(135deg, #e8efff 0%, #f5f7ff 100%);
            margin: 0;
            padding-top: 140px;
        }

        /* Modern Fixed Navigation */
        .modern-navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(102, 126, 234, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .modern-navbar.scrolled {
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }

        /* Logo Styling */
        .navbar-brand img {
            height: 70px;
            width: auto;
            object-fit: contain;
            transition: all 0.3s ease;
            filter: drop-shadow(0 2px 8px rgba(0,0,0,0.1));
        }

        .navbar-brand img:hover {
            transform: scale(1.05);
        }

        /* Brand Text */
        .brand-text {
            font-size: 1.8rem;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: 1px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .brand-text:hover {
            transform: translateY(-1px);
            filter: drop-shadow(0 2px 4px rgba(102, 126, 234, 0.3));
        }

        /* Search Bar Modern Design */
        .modern-search {
            position: relative;
            min-width: 300px;
        }

        .modern-search input {
            background: rgba(248, 249, 250, 0.8);
            border: 2px solid transparent;
            border-radius: 25px;
            padding: 10px 45px 10px 20px;
            font-size: 14px;
            transition: all 0.3s ease;
            width: 100%;
        }

        .modern-search input:focus {
            background: white;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            outline: none;
        }

        .modern-search button {
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 20px;
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: all 0.3s ease;
        }

        .modern-search button:hover {
            transform: translateY(-50%) scale(1.1);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        }

        /* Profile Icon */
        .profile-icon {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 3px solid transparent;
        }

        .profile-icon:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
            border-color: rgba(102, 126, 234, 0.2);
        }

        /* Modern Navigation Menu */
        .nav-menu {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            padding: 15px 0;
            margin-top: 10px;
        }

        /* Home Button */
        .home-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 25px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 14px;
        }

        .home-btn:hover,
        .home-btn.active {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
            color: white;
            text-decoration: none;
        }

        .home-btn.inactive {
            background: #6c757d;
        }

        .home-btn.inactive:hover {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        /* Navigation Links */
        .modern-nav-link {
            color: #2c3e50;
            font-weight: 600;
            padding: 12px 20px;
            border-radius: 10px;
            transition: all 0.3s ease;
            text-decoration: none;
            position: relative;
            margin: 0 5px;
        }

        .modern-nav-link:hover {
            color: #667eea;
            background: rgba(102, 126, 234, 0.1);
            transform: translateY(-1px);
            text-decoration: none;
        }

        .modern-nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .modern-nav-link:hover::after,
        .modern-nav-link.active::after {
            width: 80%;
        }

        /* Dropdown Styling */
        .modern-dropdown {
            background: white;
            border: none;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
            padding: 10px 0;
            margin-top: 8px;
            min-width: 200px;
        }

        .modern-dropdown-item {
            color: #2c3e50;
            padding: 12px 25px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            background: none;
        }

        .modern-dropdown-item:hover {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
            color: #667eea;
            transform: translateX(5px);
        }

        .modern-dropdown-divider {
            height: 1px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            opacity: 0.2;
            margin: 8px 0;
        }

        /* Special Manage Events Link */
        .manage-events-link {
            color: #667eea !important;
            font-weight: 700;
        }

        .manage-events-link:hover {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.15) 0%, rgba(118, 75, 162, 0.15) 100%);
        }

        /* Booking Badge */
        .booking-badge {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
            color: white;
            font-size: 12px;
            padding: 4px 8px;
            border-radius: 10px;
            font-weight: 600;
        }

        /* Auth Links */
        .auth-link {
            color: #667eea;
            font-weight: 600;
            padding: 8px 16px;
            border-radius: 20px;
            transition: all 0.3s ease;
            text-decoration: none;
            border: 2px solid transparent;
        }

        .auth-link:hover {
            background: rgba(102, 126, 234, 0.1);
            border-color: rgba(102, 126, 234, 0.3);
            text-decoration: none;
            color: #667eea;
        }

        /* Mobile Responsiveness */
        @media (max-width: 991px) {
            .modern-search {
                min-width: 250px;
                margin: 10px 0;
            }

            .navbar-brand img {
                height: 60px;
            }

            .brand-text {
                font-size: 1.5rem;
            }

            body {
                padding-top: 120px;
            }
        }

        @media (max-width: 768px) {
            .modern-search {
                min-width: 200px;
            }

            .navbar-brand img {
                height: 50px;
            }

            .brand-text {
                font-size: 1.3rem;
            }

            body {
                padding-top: 100px;
            }
        }

        /* Footer */
        .modern-footer {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            color: white;
            padding: 40px 0 20px;
            margin-top: 80px;
        }

        .footer-content {
            text-align: center;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .footer-link {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .footer-link:hover {
            color: #667eea;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container-fluid p-0">

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

            @yield('content')
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