@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Hero Section -->
    <div class="hero text-center py-5" style="position: relative;">
        <h1><strong>WELCOME TO ASTON ACTIVE</strong></h1>
        <img name="slide" width="1200" height="600">
        <script>
            var i = 0; // Start point
            var images = [];
            var time = 4000;

            // Image List
            images[0] = '/img/ka.jpg';
            images[1] = '/img/ru.jpg';
            images[2] = '/img/sp.jpg';
            images[3] = '/img/swi.jpg';

            // Change Image
            function changeImg(){
                document.slide.src = images[i];

                if(i < images.length - 1){
                    i++;
                } else {
                    i = 0;
                }

                setTimeout("changeImg()", time);
            }

            window.onload = changeImg;
        </script>
    </div>

    <!-- Upcoming Events -->
    <div id="upcoming-events" class="my-5">
        <h2>Upcoming Events</h2>
        <div class="row">
            @foreach ($events as $event)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ $event->image }}" class="card-img-top" alt="{{ $event->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <p class="card-text">{{ Str::limit($event->description, 100) }}</p>
                            <a href="{{ route('events.show', $event->slug) }}" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- About Us -->
    <div id="about-us" class="my-5">
        <h2>About Us</h2>
        <p>
            Aston University Events is dedicated to providing engaging and enriching activities for our students, staff, and alumni.
            Our events span across various interests including sports, culture, workshops, and social gatherings. Join us to make
            the most out of your university experience.
        </p>
    </div>

    <!-- Testimonials -->
    <div id="testimonials" class="my-5">
        <h2>Testimonials</h2>
        <div class="row">
            <div class="col-md-4">
                <blockquote class="blockquote">
                    <p>"The events organized by Aston University have been a highlight of my university life. Highly recommend!"</p>
                    <footer class="blockquote-footer">John Doe</footer>
                </blockquote>
            </div>
            <!-- Add more testimonials as needed -->
        </div>
    </div>

    <!-- Event Categories -->
    <div id="categories" class="my-5">
        <h2>Event Categories</h2>
        <div class="row">
            <div class="col-md-4">
                <h3>Sports</h3>
                <p>Join our sports events to stay active and meet new friends.</p>
            </div>
            <div class="col-md-4">
                <h3>Culture</h3>
                <p>Experience the diverse culture of our university through various events.</p>
            </div>
            <div class="col-md-4">
                <h3>Others</h3>
                <p>Explore workshops, socials, and more unique events.</p>
            </div>
        </div>
    </div>

    <!-- Photo Gallery -->
    <div id="gallery" class="my-5">
        <h2>Photo Gallery</h2>
        <div class="row">
            <div class="col-md-3">
                <img src="image1.jpg" class="img-fluid" alt="Event Image">
            </div>
            <div class="col-md-3">
                <img src="image2.jpg" class="img-fluid" alt="Event Image">
            </div>
            <!-- Add more images as needed -->
        </div>
    </div>

    <!-- Newsletter Signup -->
    <div id="newsletter" class="my-5">
        <h2>Stay Updated</h2>
        <form action="{{ route('newsletter.subscribe') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Enter your email">
            </div>
            <button type="submit" class="btn btn-primary">Subscribe</button>
        </form>
    </div>

    <!-- Contact Information -->
    <div id="contact" class="my-5">
        <h2>Contact Us</h2>
        <p>Email: events@aston.ac.uk</p>
        <p>Phone: 0121 204 3000</p>
        <p>Follow us on <a href="#">Twitter</a>, <a href="#">Facebook</a>, and <a href="#">Instagram</a>.</p>
    </div>
</div>
@endsection
