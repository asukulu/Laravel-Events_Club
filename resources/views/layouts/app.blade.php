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

    <!-- App CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            background: #e8efff;
            margin: 0;
            padding-top: 150px; /* prevent content from hiding behind fixed navbar */
        }

        /* Logo smaller */

        /* Navbar brand image (large logo but doesn’t affect navbar height) */
.navbar-brand img {
    height: 90px;   /* bigger logo */
    width: auto;
    object-fit: contain;
    margin-top: -20px;   /* adjust vertical alignment */
    margin-bottom: -20px;
}


        .profile-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #0080ff;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
        }

        .blog-footer {
            background-color: #e8efff;
            padding: 1rem 0;
            margin-top: 2rem;
        }

        /* Brand text (NAS EVENTS) */
.blog-header-logo {
  
    font-size: 2rem;   /* Bigger size */
    font-weight: 700;    /* Make it bold */
    letter-spacing: 1px; /* Spacing for elegance */
    color: #000;         /* Solid black */
   

}

.blog-header-logo:hover {
    text-decoration: none;
    color: #0080ff; /* Highlight on hover */
}

    </style>
</head>

<body>
    <div class="container-fluid p-0">

        <!-- Fixed Navigation Header -->
        <header class="fixed-top">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    
                    <!-- Logo -->
                    <a class="navbar-brand" href="{{ route('welcome') }}">
                        <img src="/logo/nasevents-logo.svg" alt="Nas Events">
                    </a>
                    
                    <!-- Title -->
                    <!--<a class="navbar-brand text-dark fw-bold" href="{{ route('welcome') }}">
                        Nas Events -->
                    </a>
<a class="navbar-brand mx-auto blog-header-logo" href="{{ route('welcome') }}">
    Nas Events
</a>
                    
                    <!-- Mobile Toggle -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <!-- Right side -->
                    <div class="d-flex align-items-center">
                        @include('components.search')

                        <!-- Profile / Auth -->
                        <ul class="navbar-nav ms-3">
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle profile-icon" href="#" id="userDropdown"
                                       role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>
                                        </li>
                                    </ul>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Main Navigation Menu -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="mainNavbar">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item me-2">
                                <a class="btn {{ Route::currentRouteName() == 'welcome' ? 'btn-primary' : 'btn-secondary' }}" 
                                   href="{{ route('welcome') }}">Home</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle fw-bold" href="#" id="eventsDropdown" 
                                   role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Events
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('events.index') }}">All Events</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="{{ route('events.sport') }}">Sports</a></li>
                                    <li><a class="dropdown-item" href="{{ route('events.culture') }}">Culture</a></li>
                                    <li><a class="dropdown-item" href="{{ route('events.others') }}">Others</a></li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="#about-us">About Us</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="{{ route('events.contact') }}">Contacts</a>
                            </li>

                            @auth
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle fw-bold text-primary" href="#" id="manageDropdown" 
                                       role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Manage Events
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('events.create') }}">Add Event</a></li>
                                        @if(auth()->user()->is_admin ?? false)
                                            <li><a class="dropdown-item" href="{{ route('admin.events.index') }}">Admin Panel</a></li>
                                        @endif
                                    </ul>
                                </li>
                            @endauth
                        </ul>

                        @auth
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link fw-bold" href="{{ route('booking.index') }}">
                                        Booking List <span class="badge bg-dark">{{ Cart::count() }}</span>
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
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
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

        <!-- Footer -->
        <footer class="blog-footer">
            @yield('extra-js')
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
