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

.filter-section {
    display: flex;
    justify-content: center;
    gap: 15px;
    flex-wrap: wrap;
    margin-bottom: 50px;
}

.filter-btn {
    padding: 10px 25px;
    border-radius: 25px;
    border: 2px solid #e9ecef;
    background: white;
    color: #666;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
}

.filter-btn:hover {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-color: transparent;
    transform: translateY(-2px);
    text-decoration: none;
}

.filter-btn.active {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-color: transparent;
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
    letter-spacing: 0.5px;
    margin-bottom: -2px;
}

.category-sports {
    background: linear-gradient(135deg, rgba(255, 107, 107, 0.2) 0%, rgba(238, 90, 36, 0.2) 100%);
    color: #ff6b6b;
}

.category-culture {
    background: linear-gradient(135deg, rgba(165, 94, 234, 0.2) 0%, rgba(136, 84, 208, 0.2) 100%);
    color: #a55eea;
}

.category-others {
    background: linear-gradient(135deg, rgba(38, 222, 129, 0.2) 0%, rgba(32, 191, 107, 0.2) 100%);
    color: #26de81;
}

.event-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 8px;
    line-height: 1.3;
}

.event-name {
    font-size: 1rem;
    color: #667eea;
    font-weight: 600;
    margin-bottom: 15px;
}

.event-details-list {
    display: flex;
    flex-direction: column;
    gap: 8px;
    margin-bottom: 15px;
}

.event-detail-item {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #666;
    font-size: 0.9rem;
}

.event-detail-item i {
    width: 16px;
    color: #667eea;
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
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.btn-view:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
    color: white;
    text-decoration: none;
}

.btn-edit {
    background: #ffc107;
    color: #2c3e50;
}

.btn-edit:hover {
    background: #ffb300;
    transform: translateY(-2px);
    color: #2c3e50;
    text-decoration: none;
}

.btn-delete {
    background: #e74c3c;
    color: white;
}

.btn-delete:hover {
    background: #c0392b;
    transform: translateY(-2px);
}

.event-image-container {
    width: 250px;
    min-width: 300x;
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

.no-image-placeholder {
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
    font-weight: 600;
}

.pagination-container {
    display: flex;
    justify-content: center;
    margin-top: 50px;
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

.add-event-btn {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 15px 30px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 50px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    text-decoration: none;
    border: none;
    cursor: pointer;
}

.add-event-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
    color: white;
    text-decoration: none;
}

@media (max-width: 1200px) {
    .events-grid {
        grid-template-columns: repeat(auto-fill, minmax(450px, 1fr));
    }
}

@media (max-width: 768px) {
    .events-grid {
        grid-template-columns: 1fr;
    }
    
    .event-item {
        flex-direction: column;
        height: auto;
    }
    
    .event-image-container {
        width: 100%;
        min-width: 100%;
        height: 250px;
    }
    
    .event-content {
        padding: 25px;
    }
    
    .page-main-title {
        font-size: 2rem;
    }
    
    .filter-section {
        flex-direction: column;
        align-items: center;
    }
    
    .filter-btn {
        width: 200px;
        text-align: center;
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