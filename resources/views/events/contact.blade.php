@extends('layouts.app')

@section('content')
<style>
.contact-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 40px 20px;
}

.page-header {
    text-align: center;
    margin-bottom: 60px;
}

.page-title {
    font-size: 3rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 15px;
}

.page-subtitle {
    font-size: 1.2rem;
    color: #666;
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
}

.organizers-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
    margin-bottom: 60px;
}

.organizer-card {
    background: white;
    border-radius: 20px;
    padding: 40px 30px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.organizer-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.organizer-card.sports::before {
    background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
}

.organizer-card.culture::before {
    background: linear-gradient(135deg, #a55eea 0%, #8854d0 100%);
}

.organizer-card.others::before {
    background: linear-gradient(135deg, #26de81 0%, #20bf6b 100%);
}

.organizer-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 25px 50px rgba(0,0,0,0.15);
}

.organizer-avatar {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    margin: 0 auto 25px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2.5rem;
    color: white;
    font-weight: bold;
}

.sports .organizer-avatar {
    background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
}

.culture .organizer-avatar {
    background: linear-gradient(135deg, #a55eea 0%, #8854d0 100%);
}

.others .organizer-avatar {
    background: linear-gradient(135deg, #26de81 0%, #20bf6b 100%);
}

.organizer-name {
    font-size: 1.8rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 8px;
}

.organizer-role {
    font-size: 1rem;
    color: #667eea;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: 600;
    margin-bottom: 20px;
}

.sports .organizer-role {
    color: #ff6b6b;
}

.culture .organizer-role {
    color: #a55eea;
}

.others .organizer-role {
    color: #26de81;
}

.organizer-description {
    color: #666;
    line-height: 1.6;
    margin-bottom: 25px;
    font-size: 1rem;
}

.contact-info {
    margin-bottom: 20px;
}

.contact-email {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #666;
    margin-bottom: 15px;
    font-size: 1rem;
}

.contact-email i {
    color: #667eea;
    font-size: 1.1rem;
}

.contact-btn {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 12px 25px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    border-radius: 50px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    min-width: 200px;
    justify-content: center;
}

.sports .contact-btn {
    background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
}

.culture .contact-btn {
    background: linear-gradient(135deg, #a55eea 0%, #8854d0 100%);
}

.others .contact-btn {
    background: linear-gradient(135deg, #26de81 0%, #20bf6b 100%);
}

.contact-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    color: white;
    text-decoration: none;
}

.contact-btn i {
    font-size: 1.1rem;
}

.general-contact {
    background: white;
    border-radius: 20px;
    padding: 40px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    text-align: center;
}

.general-contact h3 {
    font-size: 2rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 20px;
}

.general-contact p {
    color: #666;
    font-size: 1.1rem;
    line-height: 1.6;
    margin-bottom: 30px;
}

.contact-methods {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-top: 30px;
}

.contact-method {
    padding: 20px;
    background: #f8f9fa;
    border-radius: 15px;
    border-left: 4px solid #667eea;
}

.contact-method h4 {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 10px;
}

.contact-method p {
    color: #666;
    margin: 0;
    font-size: 1rem;
}

@media (max-width: 768px) {
    .organizers-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .organizer-card {
        padding: 30px 20px;
    }
    
    .page-title {
        font-size: 2.2rem;
    }
    
    .contact-methods {
        grid-template-columns: 1fr;
    }
}
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