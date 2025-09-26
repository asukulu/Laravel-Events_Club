@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    @foreach ($events as $event)
      <div class="col-md-6">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-5 shadow-sm h-md-280 position-relative">
          <div class="col p-5 d-flex flex-column position-static">
            <strong class="d-inline-block mb-5 text-primary">{{ $event->title }}</strong>
            <h6 class="mb-1">{{ $event->name }}</h6>
            <div class="mb-1 text-muted">Date: {{ $event->date }}</div>
            <div class="mb-1 text-muted">Time: {{ $event->time }}</div>
            <p class="card-text mb-auto">Organiser: {{ $event->organiser }}</p>
            <p class="card-text mb-auto">Venue: {{ $event->venue }}</p>
            <strong class="mb-auto">Price: £{{ $event->getPrice() }}</strong>

            <a href="{{ route('events.show', $event->slug) }}" class="btn btn-info">View more</a>

            @auth
              @if(auth()->user()->is_admin)
                <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-warning mt-2">Edit</a>
                <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger mt-2">Delete</button>
                </form>
              @endif
            @endauth
          </div>
          <div class="col-auto d-none d-lg-block">
            <img src="{{ asset('storage/' . $event->image) }}" class="img-rounded" alt="{{ $event->title }}" width="300" height="300">
          </div>
        </div>
      </div>
    @endforeach
  </div>

  @auth
    <a href="{{ route('events.create') }}" class="btn btn-primary">+ Add Event</a>
  @endauth

  <div class="d-flex justify-content-center">
    {{ $events->links() }}
  </div>
</div>
@endsection
