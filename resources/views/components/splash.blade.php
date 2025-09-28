@extends('layouts.app')

@section('content')
<style>
.homepage-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Hero Section */
.hero-section {
    position: relative;
    margin-bottom: 80px;
    overflow: hidden;
    border-radius: 25px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.1);
}

.hero-content {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    text-align: center;
    color: white;
}

.hero-title {
    font-size: 4rem;
    font-weight: 800;
    margin-bottom: 20px;
    text-shadow: 0 4px 15px rgba(0,0,0,0.3);
    letter-spacing: 2px;
}

.hero-subtitle {
    font-size: 1.3rem;
    font-weight: 300;
    opacity: 0.95;
    max-width: 600px;
    line-height: 1.6;
}

.slideshow-container {
    position: relative;
    height: 600px;
    width: 100%;
}

.slideshow-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: opacity 0.5s ease-in-out;
}

/* Section Headers */
.section-header {
    text-align: center;
    margin-bottom: 60px;
}

.section-title {
    font-size: 3rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 15px;
}

.section-subtitle {
    font-size: 1.2rem;
    color: #666;
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
}

/* Events Section */
.events-section {
    margin-bottom: 100px;
}

.event-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    height: 100%;
}

.event-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

.event-card-image {
    height: 250px;
    object-fit: cover;
    width: 100%;
    transition: transform 0.3s ease;
}

.event-card:hover .event-card-image {
    transform: scale(1.05);
}

.event-card-body {
    padding: 30px;
    display: flex;
    flex-direction: column;
    height: calc(100% - 250px);
}

.event-card-title {
    font-size: 1.4rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 15px;
}

.event-card-text {
    color: #666;
    line-height: 1.6;
    margin-bottom: 25px;
    flex-grow: 1;
}

.event-card-btn {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    padding: 12px 25px;
    border-radius: 25px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
    text-align: center;
}

.event-card-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
    color: white;
    text-decoration: none;
}

.browse-all-btn {
    background: transparent;
    color: #667eea;
    border: 2px solid #667eea;
    padding: 15px 40px;
    border-radius: 50px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
}

.browse-all-btn:hover {
    background: #667eea;
    color: white;
    transform: translateY(-2px);
    text-decoration: none;
}

/* About Section */
.about-section {
    background: white;
    padding: 80px 60px;
    border-radius: 25px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.1);
    text-align: center;
    margin-bottom: 100px;
}

.about-text {
    font-size: 1.2rem;
    color: #666;
    line-height: 1.8;
    max-width: 800px;
    margin: 0 auto;
}

/* Categories Section */
.categories-section {
    margin-bottom: 100px;
}

.category-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
}

.category-card {
    background: white;
    padding: 50px 30px;
    border-radius: 20px;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.category-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.category-card.sports::before {
    background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
}

.category-card.culture::before {
    background: linear-gradient(135deg, #a55eea 0%, #8854d0 100%);
}

.category-card.others::before {
    background: linear-gradient(135deg, #26de81 0%, #20bf6b 100%);
}

.category-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

.category-icon {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    margin: 0 auto 25px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    color: white;
}

.sports .category-icon {
    background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
}

.culture .category-icon {
    background: linear-gradient(135deg, #a55eea 0%, #8854d0 100%);
}

.others .category-icon {
    background: linear-gradient(135deg, #26de81 0%, #20bf6b 100%);
}

.category-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 15px;
}

.category-description {
    color: #666;
    line-height: 1.6;
}

/* Testimonials Section */
.testimonials-section {
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    padding: 80px 60px;
    border-radius: 25px;
    margin-bottom: 100px;
    text-align: center;
}

.testimonial-card {
    background: white;
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    max-width: 600px;
    margin: 0 auto;
}

.testimonial-quote {
    font-size: 1.3rem;
    font-style: italic;
    color: #2c3e50;
    line-height: 1.6;
    margin-bottom: 20px;
}

.testimonial-author {
    font-weight: 600;
    color: #667eea;
}

/* Gallery Section */
.gallery-section {
    margin-bottom: 100px;
}

.gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
}

.gallery-item {
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.gallery-item:hover {
    transform: scale(1.05);
}

.gallery-image {
    width: 100%;
    height: 250px;
    object-fit: cover;
}

/* Newsletter Section */
.newsletter-section {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 60px;
    border-radius: 25px;
    text-align: center;
    color: white;
    margin-bottom: 80px;
}

.newsletter-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 20px;
}

.newsletter-subtitle {
    font-size: 1.2rem;
    margin-bottom: 40px;
    opacity: 0.9;
}

.newsletter-form {
    display: flex;
    max-width: 500px;
    margin: 0 auto;
    gap: 15px;
}

.newsletter-input {
    flex: 1;
    padding: 15px 20px;
    border: none;
    border-radius: 50px;
    font-size: 1rem;
}

.newsletter-btn {
    background: white;
    color: #667eea;
    border: none;
    padding: 15px 30px;
    border-radius: 50px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.newsletter-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(255,255,255,0.3);
}

/* Contact Section */
.contact-section {
    background: white;
    padding: 60px;
    border-radius: 25px;
    text-align: center;
    box-shadow: 0 15px 40px rgba(0,0,0,0.1);
    margin-bottom: 50px;
}

.contact-info {
    display: flex;
    justify-content: center;
    gap: 40px;
    flex-wrap: wrap;
    margin-bottom: 30px;
}

.contact-item {
    color: #666;
    font-size: 1.1rem;
}

.contact-item a {
    color: #667eea;
    text-decoration: none;
}

.contact-item a:hover {
    text-decoration: underline;
}

.social-links {
    display: flex;
    justify-content: center;
    gap: 20px;
}

.social-links a {
    color: #667eea;
    font-weight: 600;
    text-decoration: none;
}

.social-links a:hover {
    text-decoration: underline;
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .newsletter-form {
        flex-direction: column;
    }
    
    .contact-info {
        flex-direction: column;
        gap: 20px;
    }
    
    .about-section,
    .newsletter-section,
    .contact-section {
        padding: 40px 30px;
    }
    
    .slideshow-container {
        height: 400px;
    }
}
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