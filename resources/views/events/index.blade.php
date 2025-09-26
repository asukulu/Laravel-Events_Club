@extends('layouts.app')

@section('content')

<style>
@import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap");

body {
  background: #e8efff;
  /* background-image: linear-gradient(rgba(0, 0, 255, 0.5), rgba(255, 255, 0, 0.5)), url("/img/like.jpg"); */
  display: flex;
  width: 100%;
  height: 100vh;
}

.like__btn {
  padding: 10px 15px;
  background: #0080ff;
  font-size: 18px;
  font-family: "Open Sans", sans-serif;
  border-radius: 5px;
  color: #e8efff;
  outline: none;
  border: none;
  cursor: pointer;
}
</style>

<script src="./app.js"></script>

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
            <a href="{{ route('events.show', $event->slug) }}" class="link btn btn-info">View more</a>

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
            <img src="{{ $event->image }}" class="img-rounded" alt="Event Image" width="300" height="300">
          </div>
        </div>
      </div>
    @endforeach
  </div>
  
  @foreach($events as $event)
  <tr>
      <td>{{ $event->title }}</td>
      <td>{{ $event->date }}</td>
      <td>
          @auth
            @if(auth()->user()->is_admin)
              <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-warning btn-sm">Edit</a>

              <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm"
                      onclick="return confirm('Are you sure?')">Delete</button>
              </form>
            @endif
          @endauth
      </td>
  </tr>
  @endforeach

  @auth
    @if(auth()->user()->is_admin)
      <a href="{{ route('admin.events.create') }}" class="btn btn-primary">+ Add Event</a> 
      <a href="{{ route('events.create') }}" class="btn btn-primary">+ Add Event</a> 
      
    @endif
  @endauth
  
  <!-- showing paginating links -->
  <div class="d-flex justify-content-center">
    {{ $events->links() }}
  </div>
</div>

@yield('extra-js')
@endsection