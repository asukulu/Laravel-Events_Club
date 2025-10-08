@extends('layouts.app')

@section('content')
<style>

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
