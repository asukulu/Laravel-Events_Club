@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Hero Section -->
    <div class="hero text-center mb-5 position-relative">
        <h1 class="fw-bold mb-4" style="font-size:2.2rem;">WELCOME TO NAS ACTIVE</h1>
        <img name="slide" class="img-fluid rounded shadow" style="width:100%; max-height:500px; object-fit:cover;">
        <script>
            var i = 0;
            var images = [
                '{{ asset("img/ka.jpg") }}',
                '{{ asset("img/ru.jpg") }}',
                '{{ asset("img/1 (12).jpg") }}',
                '{{ asset("img/1 (5).jpg") }}',
                '{{ asset("img/1 (2).jpg") }}'
                
            ];
            var time = 4000;
            function changeImg() {
                document.slide.src = images[i];
                i = (i + 1) % images.length;
                setTimeout(changeImg, time);
            }
            window.onload = changeImg;
        </script>
    </div>

    <!-- Upcoming Events -->
    <div id="upcoming-events" class="my-5">
        <h2 class="text-center fw-bold mb-4">Upcoming Events</h2>
        <div class="row">
            @if(isset($events) && $events->count())
                @foreach ($events->take(3) as $event)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ $event->image }}" class="card-img-top" alt="{{ $event->title }}" style="height:200px; object-fit:cover;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $event->title }}</h5>
                                <p class="card-text">{{ Str::limit($event->description, 100) }}</p>
                                <a href="{{ route('events.show', $event->slug) }}" class="btn btn-primary mt-auto">Learn More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('events.index') }}" class="btn btn-outline-primary">Browse All Events</a>
        </div>
    </div>

    <!-- About Us -->
    <div id="about-us" class="my-5 text-center">
        <h2 class="fw-bold mb-3">About Us</h2>
        <p class="text-muted">
            Nas Active Events is dedicated to providing engaging and enriching activities for our students, staff, and alumni.
            Our events span across various interests including sports, culture, workshops, and social gatherings.
        </p>
    </div>

    <!-- Testimonials -->
    <div id="testimonials" class="my-5">
        <h2 class="text-center fw-bold mb-4">Testimonials</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <blockquote class="blockquote text-center">
                    <p>"The events organized by Nas Active have been a highlight of my university life. Highly recommend!"</p>
                    <footer class="blockquote-footer">John Doe</footer>
                </blockquote>
            </div>
        </div>
    </div>

    <!-- Event Categories -->
    <div id="categories" class="my-5">
        <h2 class="text-center fw-bold mb-4">Event Categories</h2>
        <div class="row text-center">
            <div class="col-md-4"><h3>Sports</h3><p>Join our sports events to stay active and meet new friends.</p></div>
            <div class="col-md-4"><h3>Culture</h3><p>Experience the diverse culture of our university through various events.</p></div>
            <div class="col-md-4"><h3>Others</h3><p>Explore workshops, socials, and more unique events.</p></div>
        </div>
    </div>

    <!-- Photo Gallery -->
    <div id="gallery" class="my-5">
        <h2 class="text-center fw-bold mb-4">Photo Gallery</h2>
        <div class="row g-3">
            <div class="col-md-3"><img src="{{ asset('img/1 (16).jpg') }}" class="img-fluid rounded shadow-sm" alt="Event Image"></div>
            <div class="col-md-3"><img src="{{ asset('img/2 (5).jpg') }}" class="img-fluid rounded shadow-sm" alt="Event Image"></div>
            <div class="col-md-3"><img src="{{ asset('img/1 (14).jpg') }}" class="img-fluid rounded shadow-sm" alt="Event Image"></div>
            <div class="col-md-3"><img src="{{ asset('img/1 (12).jpg') }}" class="img-fluid rounded shadow-sm" alt="Event Image"></div>
        </div>
    </div>

    <!-- Newsletter Signup -->
    <div id="newsletter" class="my-5 text-center">
        <h2 class="fw-bold mb-3">Stay Updated</h2>
        <form action="{{ route('newsletter.subscribe') }}" method="POST" class="d-flex justify-content-center gap-2">
            @csrf
            <input type="email" class="form-control w-50" name="email" placeholder="Enter your email">
            <button type="submit" class="btn btn-primary">Subscribe</button>
        </form>
    </div>

    <!-- Contact Information -->
    <div id="contact" class="my-5 text-center">
        <h2 class="fw-bold mb-3">Contact Us</h2>
        <p>Email: <a href="mailto:events@nas.co.uk">events@nas.co.uk</a></p>
        <p>Phone: 0121 204 3000</p>
        <p>Follow us on <a href="#">Twitter</a>, <a href="#">Facebook</a>, and <a href="#">Instagram</a>.</p>
    </div>
</div>
@endsection
