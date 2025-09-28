@extends('layouts.app')

@section('content')
<style>

</style>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="contact-container">
    <div class="page-header">
        <h1 class="page-title">Meet Our Event Organizers</h1>
        <p class="page-subtitle">
            Our dedicated team of event organizers work tirelessly to bring you the best experiences. 
            Get in touch with them directly for any questions about specific event categories.
        </p>
    </div>

    <div class="organizers-grid">
        <div class="organizer-card sports">
            <div class="organizer-avatar">JD</div>
            <h2 class="organizer-name">Jane Doe</h2>
            <p class="organizer-role">Sports Coordinator</p>
            <p class="organizer-description">
                Passionate about bringing athletic excellence to our community. Jane manages all sports events 
                from competitive tournaments to recreational activities for all skill levels.
            </p>
            <div class="contact-info">
                <div class="contact-email">
                    <i class="fas fa-envelope"></i>
                    jane.doe@nasevents.com
                </div>
            </div>
            <a href="tel:0765646246" class="contact-btn">
                <i class="fas fa-phone"></i>
                Call: 076 564 6246
            </a>
        </div>

        <div class="organizer-card culture">
            <div class="organizer-avatar">MR</div>
            <h2 class="organizer-name">Mike Ross</h2>
            <p class="organizer-role">Culture & Arts Director</p>
            <p class="organizer-description">
                Dedicated to celebrating diversity and creativity through cultural events. Mike curates 
                exhibitions, performances, and festivals that enrich our community's cultural landscape.
            </p>
            <div class="contact-info">
                <div class="contact-email">
                    <i class="fas fa-envelope"></i>
                    mike.ross@nasevents.com
                </div>
            </div>
            <a href="tel:0745473272" class="contact-btn">
                <i class="fas fa-phone"></i>
                Call: 074 547 3272
            </a>
        </div>

        <div class="organizer-card others">
            <div class="organizer-avatar">JD</div>
            <h2 class="organizer-name">John Doe</h2>
            <p class="organizer-role">General Events Manager</p>
            <p class="organizer-description">
                Versatile event coordinator handling workshops, conferences, and special occasions. 
                John ensures every event runs smoothly and creates memorable experiences for all attendees.
            </p>
            <div class="contact-info">
                <div class="contact-email">
                    <i class="fas fa-envelope"></i>
                    john.doe@nasevents.com
                </div>
            </div>
            <a href="tel:07453462728" class="contact-btn">
                <i class="fas fa-phone"></i>
                Call: 074 534 62728
            </a>
        </div>
    </div>

    <div class="general-contact">
        <h3>General Inquiries</h3>
        <p>
            Have questions about events, bookings, or partnerships? Our main office is here to help 
            with any general inquiries or to direct you to the right person.
        </p>
        
        <div class="contact-methods">
            <div class="contact-method">
                <h4><i class="fas fa-building"></i> Main Office</h4>
                <p>Nas Events Headquarters<br>123 University Avenue<br>Birmingham, UK</p>
            </div>
            
            <div class="contact-method">
                <h4><i class="fas fa-envelope"></i> Email</h4>
                <p>info@nasevents.com<br>support@nasevents.com</p>
            </div>
            
            <div class="contact-method">
                <h4><i class="fas fa-phone"></i> Phone</h4>
                <p>Main: 0121 234 5678<br>Emergency: 0800 123 456</p>
            </div>
            
            <div class="contact-method">
                <h4><i class="fas fa-clock"></i> Office Hours</h4>
                <p>Mon - Fri: 9:00 AM - 6:00 PM<br>Sat: 10:00 AM - 4:00 PM</p>
            </div>
        </div>
    </div>
</div>

@endsection