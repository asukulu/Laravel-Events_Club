<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Aston Active</title>

    @yield('extra-script')

   

    
   
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">

   




    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">





    <style>

body {
  background-image: url("img_tree.gif"), url("paper.gif");
  background-color: #cccccc;
  
}
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      /* stylelint-disable selector-list-comma-newline-after */

    .blog-header {
    line-height: 1;
    border-bottom: 1px solid #e5e5e5;
    }

    .blog-header-logo {
    font-family: "Playfair Display", Georgia, "Times New Roman", serif;
    font-size: 2.25rem;
    top: -10px;
    left: -90px;
    }

    #header{
    position: relative;
}
.logo{
    position: absolute;
    width: 320px;
    height: 40px;
    top: -10px;
    left: -90px;
    
}

    .blog-header-logo:hover {
    text-decoration: none;
    }

    .display-4 {
    font-size: 5rem;
    }
    @media (min-width: 1000px) {
    .display-4 {
        font-size: 3rem;
    }
    }

    .nav-scroller {
    position: relative;
    z-index: 2;
    height: 2.75rem;
    overflow-y: hidden;
    }

    .nav-scroller .nav {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: nowrap;
    flex-wrap: nowrap;
    padding-bottom: 1rem;
    margin-top: -1px;
    overflow-x: auto;
    text-align: center;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
    }

    .nav-scroller .nav-link {
    padding-top: .75rem;
    padding-bottom: .75rem;
    font-size: .875rem;
    }

    .card-img-right {
    height: 100%;
    border-radius: 0 3px 3px 0;
    }

    .flex-auto {
    -ms-flex: 0 0 auto;
    flex: 0 0 auto;
    }

    .h-250 { height: 250px; }
    @media (min-width: 768px) {
    .h-md-250 { height: 250px; }
    }

    /* Pagination */
    .blog-pagination {
    margin-bottom: 4rem;
    }
    
   /*  .blog-pagination > .btn {
    border-radius: 2rem;
    }
 */
    /*
    * Blog posts
    */
    .blog-post {
    margin-bottom: 4rem;
    }
    .blog-post-title {
    margin-bottom: .25rem;
    font-size: 2.5rem;
    }
    .blog-post-meta {
    margin-bottom: 1.25rem;
    color: #999;
    }

    /*
    * Footer
    */
    .blog-footer {
    padding: 2.5rem 0;
    color: #999;
    text-align: center;
    background-color: #f9f9f9;
    border-top: .05rem solid #e5e5e5;
    }
    .blog-footer p:last-child {
    margin-bottom: 0;
}


@import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap");

body {


  background: #e8efff;
  display: flex;
  width: 100%;
  height: 100vh;
}

.like__btn {
  padding: 5px 5px, 1px,5px;
  background: #e8efff;
  font-size: 18px;
  font-family: "Open Sans", sans-serif;
  border-radius: 0px;
  color: black;
  outline: none;
  border: none;
  cursor: pointer;
}






    </style>

     <!-- Custom styles for this template -->
     <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->



</head>

<body>



    <div class="container">

    
  <header class="blog-header py-5">





  <nav class=" navbar navbar-expand-lg 
        navbar-light bg-light fixed-top py-lg-0 ">
  
  <a href="{{ route('welcome') }}">
    <div> <img src="/logo/nasevents-logo.svg" class="img-circle" alt="Nas Event - Go to Homepage" width="300" height="100"></div>
      <div class="col-2 pt-0"> </a>


<!--<div>
    <a href="{{ route('welcome') }}">
        <img src="/logo/aston.svg" class="img-circle" alt="Aston University - Go to Homepage" width="200" height="120">
    </a>
</div>-->
      <!-- the cart function to count the number of booking in the booking list -->
    
      </div>
   



      <div class="col-5 text-center">

      
        <!--<a class="blog-header-logo text-dark" href="{{ route('events.index')}} "> Aston Events</a>-->

              <a class="blog-header-logo text-dark" href="{{ route('welcome')}} "> Nas Events</a>
      </div>
      



      <div class="col- d-flex justify-content-end align-items-left">
        
        
      @include('components.search')
      @include('components.culture')
   
      

 <!-- Right Side Of Navbar -->
 <div>
 <nav class="navbar navbar-expand-md bg-white navbar-blue">
   
 <ul class="navbar-nav m2-auto">
   
  

 
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                            <div>
                                <li class="nav-item">
                                
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            </div>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown ">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown ">
                                    <a class="dropdown-item btn btn-primary" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                                
                            </li>
                        @endguest
                    </ul>

      
      </div>
    </div>



    </header>

<div class="nav-scroller py-2 mb-3">

<nav class="nav d-flex justify-content-between">
    <strong><a class="btn {{ Route::currentRouteName() == 'welcome' ? 'btn-primary' : 'btn-secondary' }} btn-lg" role="button" href="{{ route('welcome') }}">
        Home
    </a></strong>
    <a class="p-2 text-muted" href="#"></a>

    <strong><a class="navbar-brand p-2 text-muted {{ Request::is('sport*') ? 'text-primary' : '' }}" href="{{ route('events.sport') }}">Sports</a></strong>
    <a class="p-2 text-muted" href="#"></a>

    <strong><a class="navbar-brand p-2 text-muted {{ Request::is('culture*') ? 'text-primary' : '' }}" href="{{ route('events.culture') }}">Culture</a></strong>
    <a class="p-2 text-muted"></a>

    <strong><a class="navbar-brand p-2 text-muted {{ Request::is('others*') ? 'text-primary' : '' }}" href="{{ route('events.others') }}">Others</a></strong>

    <strong><a class="navbar-brand p-2 text-muted {{ Request::is('contact*') ? 'text-primary' : '' }}" href="{{ route('events.contact') }}">Contacts</a></strong>
    <a class="p-2 text-muted"></a>
</nav>


    
   

  </nav>
</div>


            <div class="container">
                <a class= "navbar-brand p-2 text-muted" href="{{ url('/') }}">
            <!--         {{ config('app.Home', 'Home') }} -->
            <strong><a class="text-muted" href="{{ route('booking.index') }}">Booking list <span class="badge badge-pill badge-dark">{{ Cart::count() }}</span></a></strong>
                </a>
               
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    

                 </ul>

                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">



 <!-- Favicons -->
 <link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">

 
 <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
 <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
 <link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
 <link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
 <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
 <meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
 <meta name="theme-color" content="#563d7c">




                    

                    <!-- Right Side Of Navbar -->
                   
                </div>
            </div>
        </nav>

  <!-- this session is to alert when the event has been added successfully to the booking list -->
        @if (session('success'))
<div class="alert alert-success">
{{ session('success') }}
</div>
@endif
<!-- 
error session handling -->
@if (session('error'))
<div class="alert alert-danger">
{{ session('error') }}
</div>
@endif

<!-- if the user types 0 in the search they will receive an alert message. -->
@if (count($errors)> 0)
<div class="alert alert-danger">
<ul class="mb-0 mt-0"> 
@foreach ($errors->all() as $error) 
<li>{{ $error }} </li>
@endforeach
</ul>
</div>
@endif

<!-- @if (request()->input())
<h4> {{ $events->total() }} result(s) for "{{ request()->search }} "</h4>
@endif -->




<div class="row mb-2">
            @yield('content')


              

<footer class="blog-footer">


@yield('extra-js')

        </main>
    </div>
</body>
</html>






