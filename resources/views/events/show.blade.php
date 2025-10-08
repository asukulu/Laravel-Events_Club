@extends('layouts.app') 
@section('content')

<style>
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