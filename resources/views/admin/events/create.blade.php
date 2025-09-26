@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Event</h1>

    <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Name (Category)</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Organiser</label>
            <input type="text" name="organiser" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label>Price (£)</label>
            <input type="number" name="price" class="form-control" min="0" step="0.01" required>
        </div>

        <div class="form-group">
            <label>Venue</label>
            <input type="text" name="venue" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Time</label>
            <input type="time" name="time" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <input type="hidden" name="user_id" value="{{ auth()->id() }}">

        <button type="submit" class="btn btn-success">Create Event</button>
    </form>
</div>
@endsection