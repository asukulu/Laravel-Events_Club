@extends('layouts.app')

@section('content')

@if (Cart::count() > 0)



<style>
    
</style>

<div class="booking-container">
    <div class="booking-card">
        <h2 class="booking-title">My Bookings</h2>

        <div class="table-responsive">
            <table class="table-modern">
                <thead>
                    <tr>
                        <th>Event</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>Bookings</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                @foreach (Cart::content() as $event)
                    <tr>
                        <td data-label="Event">
                            <div style="display:flex; align-items:center; gap:15px;">
                                <img src="{{ $event->model->image }}" alt="{{ $event->model->title }}" width="70" height="70">
                                <span style="font-weight:600;">{{ $event->model->title }}</span>
                            </div>
                        </td>
                        <td data-label="Price"><strong>£{{ $event->model->getPrice() }}</strong></td>
                        <td data-label="Date">{{ $event->model->date }}</td>
                        <td data-label="Bookings">1</td>
                        <td data-label="Remove">
                            <form id="delete-form-{{ $event->rowId }}" action="{{ route('booking.destroy', $event->rowId) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('Do you want to remove this event?')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@else
<div class="empty-message">
    <p>Your booking list is empty.</p>
    <a href="{{ route('events.index') }}" class="btn btn-primary mt-3">Browse Events</a>
</div>
@endif

@endsection
