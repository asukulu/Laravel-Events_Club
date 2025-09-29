@extends('layouts.app')

@section('content')
<style>
.search-results-container {
    max-width: 1100px;
    margin: 0 auto;
    padding: 40px 20px;
}

.search-header {
    text-align: center;
    margin-bottom: 40px;
}

.search-title {
    font-size: 2rem;
    font-weight: 700;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 10px;
}

.search-subtitle {
    font-size: 1rem;
    color: #666;
}

.event-card {
    display: flex;
    flex-direction: row;
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    margin-bottom: 30px;
    overflow: hidden;
    transition: transform 0.2s ease;
}

.event-card:hover {
    transform: translateY(-5px);
}

.event-image {
    flex: 0 0 280px;
    height: 220px;
    object-fit: cover;
    border-right: 1px solid #eee;
}

.event-content {
    padding: 25px;
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.event-title {
    font-size: 1.4rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 10px;
}

.event-meta {
    font-size: 0.95rem;
    color: #555;
    margin-bottom: 8px;
}

.event-price {
    font-weight: 600;
    color: #667eea;
    font-size: 1.1rem;
    margin-top: 10px;
}

.event-actions {
    display: flex;
    gap: 12px;
    margin-top: 20px;
}

.btn-modern {
    padding: 10px 18px;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.95rem;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.btn-primary-modern {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.btn-primary-modern:hover {
    box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
    transform: translateY(-2px);
    color: white;
}

.btn-secondary-modern {
    background: #f1f3f5;
    color: #2c3e50;
}

.btn-secondary-modern:hover {
    background: #e2e6ea;
    transform: translateY(-2px);
}

.like-btn {
    background: none;
    border: none;
    color: #667eea;
    font-weight: 600;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: transform 0.2s;
}

.like-btn:hover {
    transform: scale(1.1);
}
</style>

<div class="search-results-container">
    <div class="search-header">
        <h1 class="search-title">Search Results</h1>
        <p class="search-subtitle">
            Showing results for your query
        </p>
    </div>

    @forelse ($events as $event)
        <div class="event-card">
            <img src="{{ $event->image }}" alt="{{ $event->title }}" class="event-image">

            <div class="event-content">
                <div>
                    <h2 class="event-title">{{ $event->title }}</h2>
                    <div class="event-meta">Category: {{ $event->name }}</div>
                    <div class="event-meta">Date: {{ $event->date }}</div>
                    <div class="event-meta">Time: {{ $event->time }}</div>
                    <div class="event-meta">Organiser: {{ $event->organiser }}</div>
                    <div class="event-meta">Venue: {{ $event->venue }}</div>
                    <div class="event-price">£{{ $event->getPrice() }}</div>
                </div>

                <div class="event-actions">
                    <a href="{{ route('events.show', $event->slug) }}" class="btn-modern btn-primary-modern">
                        <i class="fas fa-eye"></i> View More
                    </a>
                    <button class="like-btn" onclick="toggleLike(this)">
                        <i class="far fa-thumbs-up"></i> <span>Like</span>
                    </button>
                </div>
            </div>
        </div>
    @empty
        <p>No events found for your search.</p>
    @endforelse
</div>

<script>
function toggleLike(button) {
    let icon = button.querySelector("i");
    let text = button.querySelector("span");
    if (icon.classList.contains("far")) {
        icon.classList.remove("far");
        icon.classList.add("fas");
        text.textContent = "Liked";
    } else {
        icon.classList.remove("fas");
        icon.classList.add("far");
        text.textContent = "Like";
    }
}
</script>
@endsection
