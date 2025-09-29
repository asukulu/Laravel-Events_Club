@extends('layouts.app')

@section('content')
<style>
    .events-index-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 40px 20px;
    }

    .page-header-section {
        text-align: center;
        margin-bottom: 60px;
    }

    .page-main-title {
        font-size: 3rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 15px;
    }

    .page-description {
        font-size: 1.2rem;
        color: #666;
        max-width: 700px;
        margin: 0 auto 30px;
        line-height: 1.6;
    }

    .events-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(500px, 1fr));
        gap: 30px;
        margin-bottom: 60px;
    }

    .event-item {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        display: flex;
        flex-direction: row;
        height: 320px;
    }

    .event-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }

    .event-content {
        flex: 1;
        padding: 30px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .event-category {
        display: inline-block;
        padding: 6px 15px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        margin-bottom: 8px;
        color: #a55eea;
        background: linear-gradient(135deg, rgba(165, 94, 234, 0.15), rgba(136, 84, 208, 0.15));
    }

    .event-title {
        font-size: 1.4rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 8px;
    }

    .event-details-list {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin-bottom: 15px;
        color: #666;
        font-size: 0.95rem;
    }

    .event-price {
        font-size: 1.3rem;
        font-weight: 700;
        color: #28a745;
        margin-bottom: 15px;
    }

    .event-actions {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .event-btn {
        padding: 10px 20px;
        border-radius: 25px;
        font-weight: 600;
        font-size: 0.9rem;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .btn-view {
        background: linear-gradient(135deg, #a55eea 0%, #764ba2 100%);
        color: white;
    }

    .btn-view:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(165, 94, 234, 0.4);
    }

    .event-image-container {
        width: 250px;
        min-width: 250px;
        height: 100%;
        overflow: hidden;
        position: relative;
    }

    .event-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .event-item:hover .event-image {
        transform: scale(1.1);
    }

    .empty-state {
        text-align: center;
        padding: 80px 20px;
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .empty-state-icon {
        font-size: 4rem;
        color: #e9ecef;
        margin-bottom: 20px;
    }

    .empty-state-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 15px;
    }

    .empty-state-text {
        color: #666;
        font-size: 1.1rem;
        margin-bottom: 30px;
    }
</style>

<div class="events-index-container">
    <!-- Page Header -->
    <div class="page-header-section">
        <h1 class="page-main-title">Culture Events</h1>
        <p class="page-description">
            Discover cultural events at Nas Active – music, theater, art, and performances that inspire and connect communities.
        </p>
    </div>

    @if($events->isEmpty())
        <!-- Empty State -->
        <div class="empty-state">
            <div class="empty-state-icon">
                <i class="fas fa-calendar-times"></i>
            </div>
            <h2 class="empty-state-title">No Culture Events Found</h2>
            <p class="empty-state-text">
                There are currently no cultural events. Please check back soon!
            </p>
        </div>
    @else
        <!-- Events Grid -->
        <div class="events-grid">
            @foreach ($events as $event)
                <div class="event-item">
                    <!-- Event Content -->
                    <div class="event-content">
                        <div>
                    
                             <span class="event-category category-{{ strtolower($event->name ?? 'others') }}">
                                {{ $event->name ?? 'Event' }}
                            </span>
                            
                            
                            <h3 class="event-title">{{ $event->title }}</h3>

                            <div class="event-details-list">
                                <span><i class="fas fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}</span>
                                <span><i class="fas fa-clock"></i> {{ $event->time }}</span>
                                <span><i class="fas fa-map-marker-alt"></i> {{ $event->venue }}</span>
                                <span><i class="fas fa-user"></i> {{ $event->organiser }}</span>
                            </div>

                            <div class="event-price">£{{ $event->getPrice() }}</div>
                        </div>

                        <div class="event-actions">
                            <a href="{{ route('events.show', $event->slug) }}" class="event-btn btn-view">
                                <i class="fas fa-eye"></i> View Details
                            </a>
                        </div>
                    </div>

                    <!-- Event Image -->
                    <div class="event-image-container">
                        @if($event->image)
                            <img src="{{ asset($event->image) }}" class="event-image" alt="{{ $event->title }}">
                        @else
                            <div class="no-image-placeholder">
                                <i class="fas fa-image"></i>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection