@extends('layouts.app')

@section('content')
<style>
.event-item {
    display: flex;
    flex-direction: column;
    height: 100%;
    overflow: visible !important;
}

.event-content {
    display: flex;
    flex-direction: column;
    flex: 1;
    padding-bottom: 60px; /* Space for buttons */
}

.event-actions {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
    margin-top: auto;
    padding-top: 12px;
}

.event-btn {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 8px 16px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    transition: all 0.3s;
    border: none;
    cursor: pointer;
}

.btn-view {
    background: #6366f1;
    color: white;
}

.btn-view:hover {
    background: #4f46e5;
    color: white;
}

.btn-edit {
    background: #fbbf24;
    color: #1f2937;
}

.btn-edit:hover {
    background: #f59e0b;
}

.btn-delete {
    background: #ef4444;
    color: white;
}

.btn-delete:hover {
    background: #dc2626;
}

.event-actions form {
    margin: 0;
    display: inline-block;
}
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
                                {{ strtoupper($event->name) ?? 'EVENT' }}
                            </span>
                            
                            <h3 class="event-title">{{ $event->title }}</h3>
                            
                            <div class="event-details-list">
                                <div class="event-detail-item">
                                    <i class="fas fa-calendar-alt"></i>
                                    <span>{{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}</span>
                                </div>
                                <div class="event-detail-item">
                                    <i class="fas fa-clock"></i>
                                    <span>{{ \Carbon\Carbon::parse($event->time)->format('H:i') }}</span>
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
                        
                        <!-- Action Buttons -->
                        <div class="event-actions">
                            <a href="{{ route('events.show', $event->slug) }}" class="event-btn btn-view">
                                <i class="fas fa-eye"></i> View
                            </a>
                            
                            <a href="{{ route('events.edit', $event) }}" class="event-btn btn-edit">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            
                            <form action="{{ route('events.destroy', $event) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="event-btn btn-delete" 
                                        onclick="return confirm('Delete {{ $event->title }}?')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
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
            <a href="{{ route('events.create') }}" class="add-event-btn">
                <i class="fas fa-plus"></i> Create New Event
            </a>
        </div>
    @endif
</div>

@endsection