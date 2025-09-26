@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Event</div>

                <div class="card-body">
                    {{-- Display validation errors --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Title *</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name (Category) *</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug (optional)</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}">
                            <div class="form-text">If empty, it will be auto-generated from the title.</div>
                        </div>

                        <div class="mb-3">
                            <label for="organiser" class="form-label">Organiser *</label>
                            <input type="text" class="form-control" id="organiser" name="organiser" value="{{ old('organiser') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price (£) *</label>
                            <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" step="0.01" min="0" required>
                        </div>

                        <div class="mb-3">
                            <label for="venue" class="form-label">Venue *</label>
                            <input type="text" class="form-control" id="venue" name="venue" value="{{ old('venue') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="date" class="form-label">Date *</label>
                            <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="time" class="form-label">Time *</label>
                            <input type="time" class="form-control" id="time" name="time" value="{{ old('time') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image (optional)</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/jpg,image/jpeg,image/png">
                            <div class="form-text">Accepted formats: JPG, JPEG, PNG. Max size: 2MB</div>
                        </div>

                        <button type="submit" class="btn btn-primary">Create Event</button>
                        <a href="{{ route('events.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection