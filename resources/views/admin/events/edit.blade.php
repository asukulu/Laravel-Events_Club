
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Event</h2>

    <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $event->title) }}" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="4" required>{{ old('description', $event->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" class="form-control" value="{{ old('date', $event->date) }}" required>
        </div>

        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            @if($event->image)
                <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" width="120" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-success">Update Event</button>
    </form>
</div>
@endsection