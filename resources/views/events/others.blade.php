@extends('layouts.app')

@section('content')
<style>

</style>

<div class="events-index-container">
    <!-- Page Header -->
    <div class="page-header-section">
        <h1 class="page-main-title">Other Events</h1>
        <p class="page-description">
            Explore events that don’t fit into traditional categories – workshops, networking, comedy, and unique 
            experiences. Nas Active brings you diverse opportunities for fun and connection.
        </p>
    </div>

    @if($events->isEmpty())
        <!-- Empty State -->
        <div class="empty-state">
            <div class="empty-state-icon">
                <i class="fas fa-calendar-times"></i>
            </div>
            <h2 class="empty-state-title">No Other Events Found</h2>
            <p class="empty-state-text">
                There are currently no events in this category. Please check back soon!
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
