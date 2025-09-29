@extends('layouts.app')

@section('content')

@if (Cart::count() > 0)



<style>
.booking-container {
    max-width: 1100px;
    margin: 50px auto;
    padding: 30px 20px;
}

.booking-card {
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 12px 30px rgba(0,0,0,0.1);
    padding: 30px;
    overflow: hidden;
}

.booking-title {
    text-align: center;
    font-size: 2.2rem;
    font-weight: 700;
    margin-bottom: 30px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.table-modern {
    width: 100%;
    border-collapse: collapse;
}

.table-modern thead {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
}

.table-modern th, .table-modern td {
    padding: 18px;
    text-align: center;
    vertical-align: middle;
    font-size: 1rem;
}

.table-modern tbody tr {
    border-bottom: 1px solid #f1f1f1;
    transition: background 0.3s ease;
}

.table-modern tbody tr:hover {
    background: rgba(102, 126, 234, 0.05);
}

.table-modern img {
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
}

.btn-delete {
    background: #e74c3c;
    border: none;
    color: white;
    padding: 8px 18px;
    border-radius: 30px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-delete:hover {
    background: #c0392b;
    transform: translateY(-2px);
    box-shadow: 0 8px 18px rgba(231,76,60,0.3);
}

.empty-message {
    text-align: center;
    margin-top: 80px;
    font-size: 1.4rem;
    font-weight: 600;
    color: #555;
}

@media (max-width: 768px) {
    .table-modern thead {
        display: none;
    }

    .table-modern, .table-modern tbody, .table-modern tr, .table-modern td {
        display: block;
        width: 100%;
    }

    .table-modern tr {
        margin-bottom: 20px;
        border: 1px solid #eee;
        border-radius: 15px;
        padding: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }

    .table-modern td {
        text-align: left;
        padding: 12px;
    }

    .table-modern td::before {
        content: attr(data-label);
        font-weight: 700;
        display: block;
        margin-bottom: 6px;
        color: #667eea;
    }
    .table-modern td:last-child {
        text-align: right;
    }

    
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
