@extends('layouts.app')

@section('content')
<div class="events-index-container">
    <!-- Page Header -->
    <div class="page-header-section">
        <h1 class="page-main-title">All Events</h1>
        <p class="page-description">
            Discover exciting events happening at Nas Active. From sports to culture and everything in between, 
            find the perfect event for you and start making memories today.
        </p>
        
        <!-- Quick Filters -->
        <div class="filter-section">
            <a href="{{ route('events.index') }}" class="filter-btn {{ !request('category') ? 'active' : '' }}">
                <i class="fas fa-th me-1"></i> All Events
            </a>
            <a href="{{ route('events.sport') }}" class="filter-btn">
                <i class="fas fa-running me-1"></i> Sports
            </a>
            <a href="{{ route('events.culture') }}" class="filter-btn">
                <i class="fas fa-theater-masks me-1"></i> Culture
            </a>
            <a href="{{ route('events.others') }}" class="filter-btn">
                <i class="fas fa-star me-1"></i> Others
            </a>
        </div>
    </div>

    @if($events->count() > 0)
        <!-- Events Grid -->
        <div class="events-grid">
            @foreach ($events as $event)
                <div class="event-item">
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

                    <!-- Event Content -->
                    <div class="event-content">
                        <div>
                            <span class="event-category category-{{ strtolower($event->name ?? 'others') }}">
                                {{ ucfirst($event->name) ?? 'Event' }}
                            </span>
                            
                            <h3 class="event-title">{{ $event->title }}</h3>
                            
                            <div class="event-details-list">
                                <div class="event-detail-item">
                                    <i class="fas fa-calendar-alt"></i>
                                    <span>{{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}</span>
                                </div>
                                <div class="event-detail-item">
                                    <i class="fas fa-clock"></i>
                                    <span>{{ $event->time }}</span>
                                </div>
                                <div class="event-detail-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>{{ $event->venue }}</span>
                                </div>
                                <div class="event-detail-item">
                                    <i class="fas fa-user"></i>
                                    <span>{{ $event->organiser }}</span>
                                </div>
                            </div>
                            
                            <div class="event-price">£{{ number_format($event->price, 2) }}</div>
                        </div>
                        
                        <div class="event-actions">
                            <a href="{{ route('events.show', $event->slug) }}" class="event-btn btn-view">
                                <i class="fas fa-eye"></i> View Details
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="pagination-container">
            {{ $events->links() }}
        </div>
    @else
        <!-- Empty State -->
        <div class="empty-state">
            <div class="empty-state-icon">
                <i class="fas fa-calendar-times"></i>
            </div>
            <h2 class="empty-state-title">No Events Found</h2>
            <p class="empty-state-text">
                There are currently no events available. Check back soon or create your first event!
            </p>
            @auth
                <a href="{{ route('events.create') }}" class="add-event-btn">
                    <i class="fas fa-plus"></i> Create New Event
                </a>
            @endauth
        </div>
    @endif
</div>

@endsection