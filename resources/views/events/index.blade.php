@extends('layouts.app')

@section('content')
<style>

</style>

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
                    <!-- Event Content -->
                    <div class="event-content">
                        <div>
                            <span class="event-category category-{{ strtolower($event->name ?? 'others') }}">
                                {{ $event->name ?? 'Event' }}
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
                            
                            <div class="event-price">£{{ number_format($event->price / 100, 2) }}</div>
                        </div>
                        
                        <div class="event-actions">
                            <a href="{{ route('events.show', $event->slug) }}" class="event-btn btn-view">
                                <i class="fas fa-eye"></i> View Details
                            </a>
                            
                            @auth
                                @if(auth()->user()->is_admin ?? false)
                                    <a href="{{ route('admin.events.edit', $event) }}" class="event-btn btn-edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="event-btn btn-delete" 
                                                onclick="return confirm('Are you sure you want to delete this event?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                @endif
                            @endauth
                        </div>
                    </div>
                    
                    <!-- Event Image -->
                    <div class="event-image-container">
                        @if($event->image)
                            @if(str_starts_with($event->image, 'events/'))
                                <img src="{{ asset('storage/' . $event->image) }}" class="event-image" alt="{{ $event->title }}">
                            @else
                                <img src="{{ asset($event->image) }}" class="event-image" alt="{{ $event->title }}">
                            @endif
                        @else
                            <div class="no-image-placeholder">
                                <i class="fas fa-image"></i>
                            </div>
                        @endif
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