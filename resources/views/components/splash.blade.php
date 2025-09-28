@extends('layouts.app')

@section('content')
<style>

</style>

<div class="homepage-container">
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="slideshow-container">
            <img name="slide" class="slideshow-image" alt="Nas Active Events">
        </div>
        <div class="hero-content">
            <h1 class="hero-title">WELCOME TO NAS ACTIVE</h1>
            <p class="hero-subtitle">
                Discover amazing events, connect with your community, and create unforgettable experiences
            </p>
        </div>
        
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

    <!-- Upcoming Events Section -->
    <div class="events-section">
        <div class="section-header">
            <h2 class="section-title">Upcoming Events</h2>
            <p class="section-subtitle">
                Don't miss out on these exciting upcoming events. Book your spot now and join the fun!
            </p>
        </div>
        
        <div class="row g-4 mb-5">
            @if(isset($events) && $events->count())
                @foreach ($events->take(3) as $event)
                    <div class="col-lg-4 col-md-6">
                        <div class="event-card">
                            @if($event->image)
                                <img src="{{ 
                                    str_starts_with($event->image, 'events/') ? 
                                    asset('storage/' . $event->image) : 
                                    asset($event->image) 
                                }}" class="event-card-image" alt="{{ $event->title }}">
                            @endif
                            <div class="event-card-body">
                                <h5 class="event-card-title">{{ $event->title }}</h5>
                                <p class="event-card-text">{{ Str::limit($event->description, 100) }}</p>
                                <a href="{{ route('events.show', $event->slug) }}" class="event-card-btn">Learn More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center">
                    <p class="text-muted">No upcoming events at the moment. Check back soon!</p>
                </div>
            @endif
        </div>
        
        <div class="text-center">
            <a href="{{ route('events.index') }}" class="browse-all-btn">Browse All Events</a>
        </div>
    </div>

    <!-- About Section -->
    <div class="about-section">
        <h2 class="section-title mb-4">About Nas Active</h2>
        <p class="about-text">
            Nas Active Events is dedicated to providing engaging and enriching activities for our students, staff, and alumni. 
            Our events span across various interests including sports, culture, workshops, and social gatherings. Join us in 
            creating memorable experiences and building lasting connections within our vibrant community.
        </p>
    </div>

    <!-- Event Categories Section -->
    <div class="categories-section">
        <div class="section-header">
            <h2 class="section-title">Event Categories</h2>
            <p class="section-subtitle">
                Explore our diverse range of events designed to cater to all interests and passions
            </p>
        </div>
        
        <div class="category-cards">
            <div class="category-card sports">
                <div class="category-icon">🏃</div>
                <h3 class="category-title">Sports</h3>
                <p class="category-description">
                    Join our sports events to stay active, compete with peers, and meet new friends who share your passion for fitness and athletics.
                </p>
            </div>
            
            <div class="category-card culture">
                <div class="category-icon">🎭</div>
                <h3 class="category-title">Culture</h3>
                <p class="category-description">
                    Experience the diverse culture of our university through art exhibitions, music performances, theater, and cultural celebrations.
                </p>
            </div>
            
            <div class="category-card others">
                <div class="category-icon">🎯</div>
                <h3 class="category-title">Others</h3>
                <p class="category-description">
                    Explore workshops, networking events, career fairs, social gatherings, and other unique experiences designed to enrich your journey.
                </p>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="testimonials-section">
        <h2 class="section-title mb-4">What Our Community Says</h2>
        <div class="testimonial-card">
            <p class="testimonial-quote">
                "The events organized by Nas Active have been a highlight of my university life. The variety and quality of 
                events are outstanding, and I've made so many great memories and friendships through these experiences!"
            </p>
            <div class="testimonial-author">— John Doe, Student</div>
        </div>
    </div>

    <!-- Photo Gallery Section -->
    <div class="gallery-section">
        <div class="section-header">
            <h2 class="section-title">Photo Gallery</h2>
            <p class="section-subtitle">
                Glimpses from our recent events and the amazing moments we've shared together
            </p>
        </div>
        
        <div class="gallery-grid">
            <div class="gallery-item">
                <img src="{{ asset('img/1 (16).jpg') }}" class="gallery-image" alt="Event Photo">
            </div>
            <div class="gallery-item">
                <img src="{{ asset('img/2 (5).jpg') }}" class="gallery-image" alt="Event Photo">
            </div>
            <div class="gallery-item">
                <img src="{{ asset('img/1 (14).jpg') }}" class="gallery-image" alt="Event Photo">
            </div>
            <div class="gallery-item">
                <img src="{{ asset('img/1 (12).jpg') }}" class="gallery-image" alt="Event Photo">
            </div>
        </div>
    </div>

    <!-- Newsletter Section -->
    <div class="newsletter-section">
        <h2 class="newsletter-title">Stay In The Loop</h2>
        <p class="newsletter-subtitle">
            Subscribe to our newsletter and never miss an exciting event or important update
        </p>
        
        <form action="{{ route('newsletter.subscribe') }}" method="POST" class="newsletter-form">
            @csrf
            <input type="email" name="email" class="newsletter-input" placeholder="Enter your email address" required>
            <button type="submit" class="newsletter-btn">Subscribe Now</button>
        </form>
    </div>

    <!-- Contact Section -->
    <div class="contact-section">
        <h2 class="section-title mb-4">Get In Touch</h2>
        <div class="contact-info">
            <div class="contact-item">
                <strong>Email:</strong> <a href="mailto:events@nas.co.uk">events@nas.co.uk</a>
            </div>
            <div class="contact-item">
                <strong>Phone:</strong> 0121 204 3000
            </div>
        </div>
        
        <div class="social-links">
            <a href="#">Twitter</a>
            <a href="#">Facebook</a>
            <a href="#">Instagram</a>
        </div>
    </div>
</div>

@endsection