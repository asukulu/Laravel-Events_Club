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
    margin-bottom: 40px;
}

.page-main-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 16px;
}

.page-description {
    font-size: 1.1rem;
    color: #6b7280;
    max-width: 700px;
    margin: 0 auto 30px;
}

.filter-section {
    display: flex;
    justify-content: center;
    gap: 12px;
    flex-wrap: wrap;
}

.filter-btn {
    padding: 10px 20px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 500;
    background: white;
    color: #4b5563;
    border: 2px solid #e5e7eb;
    transition: all 0.3s;
}

.filter-btn:hover, .filter-btn.active {
    background: #6366f1;
    color: white;
    border-color: #6366f1;
}

/* 2-Column Grid Layout */
.events-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 30px;
    margin-top: 40px;
}

.event-item {
    display: flex;
    background: white;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s, box-shadow 0.3s;
}

.event-item:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
}

/* Image on Left */
.event-image-container {
    width: 180px;
    min-width: 180px;
    position: relative;
    overflow: hidden;
}

.event-image-container img,
.event-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.no-image-placeholder {
    width: 100%;
    height: 100%;
    background: #f3f4f6;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #9ca3af;
}

.no-image-placeholder i {
    font-size: 2.5rem;
}

/* Content on Right */
.event-content {
    flex: 1;
    padding: 20px;
    display: flex;
    flex-direction: column;
}

.event-category {
    display: inline-block;
    padding: 4px 12px;
    border-radius: 6px;
    font-size: 0.7rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 8px;
    width: fit-content;
}

.category-sport {
    background: #dbeafe;
    color: #1e40af;
}

.category-culture {
    background: #fce7f3;
    color: #be185d;
}

.category-others {
    background: #d1fae5;
    color: #065f46;
}

.event-title {
    font-size: 1.15rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 12px;
    line-height: 1.3;
}

.event-details-list {
    display: flex;
    flex-direction: column;
    gap: 5px;
    margin-bottom: 12px;
}

.event-detail-item {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #6b7280;
    font-size: 0.85rem;
}

.event-detail-item i {
    width: 14px;
    color: #6366f1;
    font-size: 0.8rem;
}

.event-price {
    font-size: 1.4rem;
    font-weight: 700;
    color: #059669;
    margin-bottom: 12px;
}

.event-actions {
    display: flex;
    gap: 6px;
    flex-wrap: wrap;
    margin-top: auto;
}

.event-btn {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 7px 14px;
    border-radius: 8px;
    text-decoration: none;
    font-size: 0.8rem;
    font-weight: 600;
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

.pagination-container {
    display: flex;
    justify-content: center;
    margin-top: 40px;
}

.empty-state {
    text-align: center;
    padding: 60px 20px;
    grid-column: 1 / -1;
}

.empty-state-icon i {
    font-size: 4rem;
    color: #d1d5db;
    margin-bottom: 20px;
}

.empty-state-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: #4b5563;
    margin-bottom: 12px;
}

.empty-state-text {
    color: #9ca3af;
    margin-bottom: 24px;
}

.add-event-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 24px;
    background: #6366f1;
    color: white;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s;
}

.add-event-btn:hover {
    background: #4f46e5;
    color: white;
}

/* Responsive */
@media (max-width: 1024px) {
    .events-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 640px) {
    .event-item {
        flex-direction: column;
    }
    
    .event-image-container {
        width: 100%;
        height: 200px;
    }
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