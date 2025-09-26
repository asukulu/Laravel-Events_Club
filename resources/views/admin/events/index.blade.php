@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Manage Events</h1>

    {{-- Success message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Admin check and Create button --}}
    @auth
        @if(auth()->user()->is_admin)
            <div class="mb-3">
                <a href="{{ route('events.create') }}" class="btn btn-primary">+ Create New Event</a>
            </div>
        @endif
    @endauth

    {{-- Events Table --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Venue</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($events as $event)
                <tr>
                    <td>{{ $event->id }}</td>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->date ?? 'N/A' }}</td>
                    <td>{{ $event->time ?? 'N/A' }}</td>
                    <td>{{ $event->venue ?? 'N/A' }}</td>
                    <td>£{{ $event->getPrice() ?? '0.00' }}</td>
                    <td>
                        {{-- View button (public) --}}
                        <a href="{{ route('events.show', $event->slug ?? $event->id) }}" class="btn btn-sm btn-info">View</a>
                        
                        {{-- Admin only buttons --}}
                        @auth
                            @if(auth()->user()->is_admin)
                                <a href="{{ route('events.edit', $event->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button 
                                        type="submit" 
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this event?')">
                                        Delete
                                    </button>
                                </form>
                            @endif
                        @endauth
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">No events found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Pagination --}}
    @if(method_exists($events, 'links'))
        <div class="d-flex justify-content-center">
            {{ $events->links() }}
        </div>
    @endif
</div>
@endsection