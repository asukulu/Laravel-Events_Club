@extends('layouts.app')

@section('content')
<style>

</style>

<div class="create-event-container">
    <div class="form-header">
        <h1 class="form-title">Create New Event</h1>
        <p class="form-subtitle">
            Fill in the details below to create an exciting new event for your community
        </p>
    </div>

    <div class="modern-form-card">
        <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data" id="eventForm">
            @csrf

            <!-- Basic Information Section -->
            <div class="form-section">
                <h3 class="form-section-title">Basic Information</h3>
                
                <div class="form-group-modern">
                    <label for="title" class="form-label-modern">
                        <i class="fas fa-heading"></i>Event Title<span class="required-indicator">*</span>
                    </label>
                    <input id="title" type="text" 
                           class="form-control-modern @error('title') is-invalid @enderror" 
                           name="title" value="{{ old('title') }}" 
                           placeholder="e.g., Annual Sports Day 2024" required>
                    @error('title')
                        <span class="invalid-feedback-modern">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group-modern">
                    <label for="name" class="form-label-modern">
                        <i class="fas fa-tag"></i>Category<span class="required-indicator">*</span>
                    </label>
                    <input id="name" type="text" 
                           class="form-control-modern @error('name') is-invalid @enderror" 
                           name="name" value="{{ old('name') }}" 
                           placeholder="e.g., Sports, Culture, Others" required>
                    @error('name')
                        <span class="invalid-feedback-modern">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group-modern">
                    <label for="slug" class="form-label-modern">
                        <i class="fas fa-link"></i>URL Slug
                    </label>
                    <input id="slug" type="text" 
                           class="form-control-modern @error('slug') is-invalid @enderror" 
                           name="slug" value="{{ old('slug') }}" 
                           placeholder="Leave empty to auto-generate from title">
                    <small class="form-help-text">Optional: Custom URL for your event</small>
                    @error('slug')
                        <span class="invalid-feedback-modern">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group-modern">
                    <label for="description" class="form-label-modern">
                        <i class="fas fa-align-left"></i>Description
                    </label>
                    <textarea id="description" 
                              class="form-control-modern @error('description') is-invalid @enderror" 
                              name="description" rows="4" 
                              placeholder="Describe your event in detail...">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="invalid-feedback-modern">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Event Details Section -->
            <div class="form-section">
                <h3 class="form-section-title">Event Details</h3>
                
                <div class="form-row">
                    <div class="form-group-modern">
                        <label for="date" class="form-label-modern">
                            <i class="fas fa-calendar-alt"></i>Date<span class="required-indicator">*</span>
                        </label>
                        <input id="date" type="date" 
                               class="form-control-modern @error('date') is-invalid @enderror" 
                               name="date" value="{{ old('date') }}" required>
                        @error('date')
                            <span class="invalid-feedback-modern">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group-modern">
                        <label for="time" class="form-label-modern">
                            <i class="fas fa-clock"></i>Time<span class="required-indicator">*</span>
                        </label>
                        <input id="time" type="time" 
                               class="form-control-modern @error('time') is-invalid @enderror" 
                               name="time" value="{{ old('time') }}" required>
                        @error('time')
                            <span class="invalid-feedback-modern">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group-modern">
                    <label for="venue" class="form-label-modern">
                        <i class="fas fa-map-marker-alt"></i>Venue<span class="required-indicator">*</span>
                    </label>
                    <input id="venue" type="text" 
                           class="form-control-modern @error('venue') is-invalid @enderror" 
                           name="venue" value="{{ old('venue') }}" 
                           placeholder="e.g., Main Campus Stadium" required>
                    @error('venue')
                        <span class="invalid-feedback-modern">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group-modern">
                    <label for="organiser" class="form-label-modern">
                        <i class="fas fa-user"></i>Organizer<span class="required-indicator">*</span>
                    </label>
                    <input id="organiser" type="text" 
                           class="form-control-modern @error('organiser') is-invalid @enderror" 
                           name="organiser" value="{{ old('organiser') }}" 
                           placeholder="e.g., Student Union" required>
                    @error('organiser')
                        <span class="invalid-feedback-modern">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group-modern">
                    <label for="price" class="form-label-modern">
                        <i class="fas fa-pound-sign"></i>Price (£)<span class="required-indicator">*</span>
                    </label>
                    <input id="price" type="number" step="0.01" min="0" 
                           class="form-control-modern @error('price') is-invalid @enderror" 
                           name="price" value="{{ old('price') }}" 
                           placeholder="0.00" required>
                    <small class="form-help-text">Enter 0 for free events</small>
                    @error('price')
                        <span class="invalid-feedback-modern">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Image Upload Section -->
            <div class="form-section">
                <h3 class="form-section-title">Event Image</h3>
                
                <div class="form-group-modern">
                    <div class="file-input-wrapper">
                        <input id="image" type="file" 
                               class="file-input-modern @error('image') is-invalid @enderror" 
                               name="image" accept="image/*" onchange="updateFileName(this)">
                        <label for="image" class="file-input-label">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <div class="file-input-text">
                                <span class="file-input-title">Choose Event Image</span>
                                <span class="file-input-subtitle">Click to upload or drag and drop</span>
                                <span class="file-input-subtitle">PNG, JPG (MAX. 2MB)</span>
                            </div>
                        </label>
                        <div id="selectedFileName" class="selected-file" style="display: none;"></div>
                    </div>
                    @error('image')
                        <span class="invalid-feedback-modern">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Form Actions -->
            <div class="form-actions">
                <button type="submit" class="btn-modern btn-primary-modern">
                    <i class="fas fa-check"></i> Create Event
                </button>
                <a href="{{ route('events.index') }}" class="btn-modern btn-secondary-modern">
                    <i class="fas fa-times"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<script>
function updateFileName(input) {
    const fileName = input.files[0]?.name;
    const fileDisplay = document.getElementById('selectedFileName');
    
    if (fileName) {
        fileDisplay.textContent = `Selected: ${fileName}`;
        fileDisplay.style.display = 'block';
    } else {
        fileDisplay.style.display = 'none';
    }
}


// Auto-generate slug from title
document.getElementById('title').addEventListener('input', function(e) {
    const slugInput = document.getElementById('slug');
    if (!slugInput.value || slugInput.dataset.auto !== 'false') {
        const slug = e.target.value
            .toLowerCase()
            .replace(/[^a-z0-9]+/g, '-')
            .replace(/(^-|-$)/g, '');
        slugInput.value = slug;
    }
});

document.getElementById('slug').addEventListener('input', function() {
    this.dataset.auto = 'false';
});
</script>

@endsection