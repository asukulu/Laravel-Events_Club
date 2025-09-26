@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Event</h1>

    {{-- Success/Error messages --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Title --}}
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $event->title) }}" required>
        </div>

        {{-- Name / Category --}}
        <div class="form-group">
            <label>Name (Category)</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $event->name) }}" required>
        </div>

        {{-- Slug --}}
        <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control" value="{{ old('slug', $event->slug) }}" required>
        </div>

        {{-- Organiser --}}
        <div class="form-group">
            <label>Organiser</label>
            <input type="text" name="organiser" class="form-control" value="{{ old('organiser', $event->organiser) }}" required>
        </div>

        {{-- Description --}}
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" required>{{ old('description', $event->description) }}</textarea>
        </div>

        {{-- Price --}}
        <div class="form-group">
            <label>Price (£)</label>
            <input type="number" name="price" class="form-control" value="{{ old('price', $event->price) }}" min="0" step="0.01" required>
        </div>

        {{-- Venue --}}
        <div class="form-group">
            <label>Venue</label>
            <input type="text" name="venue" class="form-control" value="{{ old('venue', $event->venue) }}" required>
        </div>

        {{-- Date --}}
        <div class="form-group">
            <label>Date</label>
            <input type="date" name="date" class="form-control" value="{{ old('date', $event->date) }}" required>
        </div>

        {{-- Time --}}
        <div class="form-group">
            <label>Time</label>
            <input type="time" name="time" class="form-control" value="{{ old('time', $event->time) }}" required>
        </div>

        {{-- Image --}}
        <div class="form-group">
            <label>Image</label>

            {{-- Current image preview --}}
            @if($event->image)
                <div class="mb-2">
                    <p>Current Image:</p>
                    <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" width="150">
                </div>
            @endif

            {{-- Upload new image --}}
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Update Event</button>
    </form>
</div>
@endsection
