@extends('layouts.app') 
@section('content')

<style>
.event-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.event-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    overflow: hidden;
    margin-bottom: 30px;
}

.event-image {
    width: 100%;
    height: 400px;
    object-fit: cover;
}

.event-content {
    padding: 30px;
}

.event-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 15px;
}

.event-description {
    font-size: 1.1rem;
    color: #666;
    line-height: 1.6;
    margin-bottom: 25px;
}

.event-details {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.detail-item {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 10px;
    border-left: 4px solid #007bff;
}

.detail-label {
    font-size: 0.9rem;
    color: #666;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 5px;
}

.detail-value {
    font-size: 1.2rem;
    font-weight: 600;
    color: #2c3e50;
}

.price-value {
    color: #28a745;
    font-size: 1.5rem;
}

.action-buttons {
    display: flex;
    gap: 15px;
    align-items: center;
    flex-wrap: wrap;
}

.like-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 20px;
    background: white;
    font-size: 16px;
    font-weight: 600;
    border-radius: 50px;
    color: #666;
    border: 2px solid #e9ecef;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
}

.like-btn:hover {
    background: #fff5f5;
    border-color: #ff6b6b;
    color: #ff6b6b;
    transform: translateY(-2px);
}

.like-btn.liked {
    background: #fff5f5;
    border-color: #ff6b6b;
    color: #ff6b6b;
}

.like-btn i {
    font-size: 18px;
    transition: transform 0.2s ease;
}

.like-btn.liked i {
    color: #e74c3c;
    transform: scale(1.1);
}

.booking-btn {
    padding: 15px 30px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    border-radius: 50px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.booking-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
}

@media (max-width: 768px) {
    .event-title {
        font-size: 2rem;
    }
    
    .event-details {
        grid-template-columns: 1fr;
    }
    
    .action-buttons {
        flex-direction: column;
        align-items: stretch;
    }
    
    .like-btn, .booking-btn {
        justify-content: center;
    }
}

.auth-required {
    background: #fff3cd;
    color: #856404;
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 20px;
    text-align: center;
}
</style>

<div class="event-container">
    <div class="event-card">
        @if($event->image)
            <img src="{{ 
                str_starts_with($event->image, 'events/') ? 
                asset('storage/' . $event->image) : 
                asset($event->image) 
            }}" class="event-image" alt="{{ $event->title }}">
        @endif
        
        <div class="event-content">
            <h1 class="event-title">{{ $event->title }}</h1>
            
            @if($event->description)
                <p class="event-description">{{ $event->description }}</p>
            @endif
            
            <div class="event-details">
                <div class="detail-item">
                    <div class="detail-label">Date</div>
                    <div class="detail-value">{{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}</div>
                </div>
                
                @if($event->time)
                <div class="detail-item">
                    <div class="detail-label">Time</div>
                    <div class="detail-value">{{ $event->time }}</div>
                </div>
                @endif
                
                @if($event->venue)
                <div class="detail-item">
                    <div class="detail-label">Venue</div>
                    <div class="detail-value">{{ $event->venue }}</div>
                </div>
                @endif
                
                @if($event->organiser)
                <div class="detail-item">
                    <div class="detail-label">Organiser</div>
                    <div class="detail-value">{{ $event->organiser }}</div>
                </div>
                @endif
                
                <div class="detail-item">
                    <div class="detail-label">Price</div>
                    <div class="detail-value price-value">£{{ number_format($event->price / 100, 2) }}</div>
                </div>
            </div>
            
            <div class="action-buttons">
                @auth
                    <!-- Like Button for authenticated users -->
                    <button class="like-btn" id="likeBtn" data-event="{{ $event->id }}">
                        <i class="fas fa-heart" id="likeIcon"></i>
                        <span id="likeCount">{{ $event->likes_count ?? 0 }}</span>
                    </button>
                    
                    <!-- Booking Form -->
                    <form method="POST" action="{{ route('booking.store') }}" style="display: inline;">
                        @csrf
                        <input type="hidden" name="id" value="{{ $event->id }}">
                        <input type="hidden" name="name" value="{{ $event->name }}">
                        <input type="hidden" name="title" value="{{ $event->title }}">
                        <input type="hidden" name="price" value="{{ $event->price }}">
                        <button type="submit" class="booking-btn">Book Now</button>
                    </form>
                @else
                    <!-- For guest users -->
                    <div class="auth-required">
                        Please <a href="{{ route('login') }}">login</a> to like events and make bookings
                    </div>
                    
                    <div class="like-btn">
                        <i class="far fa-heart"></i>
                        <span>{{ $event->likes_count ?? 0 }}</span> Likes
                    </div>
                @endauth
            </div>
        </div>
    </div>
</div>

@auth
<script>
document.addEventListener("DOMContentLoaded", function() {
    const likeBtn = document.getElementById("likeBtn");
    const likeIcon = document.getElementById("likeIcon");
    const likeCount = document.getElementById("likeCount");
    
    // Set initial state based on user's like status
    @if(auth()->check() && method_exists($event, 'isLikedByUser') && $event->isLikedByUser(auth()->id()))
        likeBtn.classList.add('liked');
        likeIcon.classList.remove('far');
        likeIcon.classList.add('fas');
    @else
        likeIcon.classList.remove('fas');
        likeIcon.classList.add('far');
    @endif
    
    likeBtn.addEventListener("click", function() {
        const eventId = likeBtn.getAttribute("data-event");
        
        // Disable button during request
        likeBtn.disabled = true;
        
        fetch(`/events/${eventId}/like`, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Content-Type": "application/json",
                "Accept": "application/json"
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Update UI based on response
            if (data.liked) {
                likeBtn.classList.add('liked');
                likeIcon.classList.remove('far');
                likeIcon.classList.add('fas');
            } else {
                likeBtn.classList.remove('liked');
                likeIcon.classList.remove('fas');
                likeIcon.classList.add('far');
            }
            
            likeCount.textContent = data.count;
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Something went wrong. Please try again.');
        })
        .finally(() => {
            // Re-enable button
            likeBtn.disabled = false;
        });
    });
});
</script>
@endauth

@endsection