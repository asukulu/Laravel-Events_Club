@extends('layouts.app')

@section('content')
<style>
.create-event-container {
    max-width: 900px;
    margin: 0 auto;
    padding: 40px 20px;
}

.form-header {
    text-align: center;
    margin-bottom: 50px;
}

.form-title {
    font-size: 2.5rem;
    font-weight: 700;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 15px;
}

.form-subtitle {
    font-size: 1.1rem;
    color: #666;
    line-height: 1.6;
}

.modern-form-card {
    background: white;
    border-radius: 25px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.1);
    padding: 50px 40px;
    position: relative;
    overflow: hidden;
}

.modern-form-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 5px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.form-section {
    margin-bottom: 35px;
}

.form-section-title {
    font-size: 1.3rem;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 25px;
    padding-bottom: 10px;
    border-bottom: 2px solid #e9ecef;
}

.form-group-modern {
    margin-bottom: 25px;
}

.form-label-modern {
    display: block;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 8px;
    font-size: 0.95rem;
}

.form-label-modern i {
    color: #667eea;
    margin-right: 8px;
    width: 16px;
}

.required-indicator {
    color: #e74c3c;
    margin-left: 3px;
}

.form-control-modern {
    width: 100%;
    padding: 12px 18px;
    border: 2px solid #e9ecef;
    border-radius: 12px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: #f8f9fa;
}

.form-control-modern:focus {
    outline: none;
    border-color: #667eea;
    background: white;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.form-control-modern.is-invalid {
    border-color: #e74c3c;
}

.form-control-modern.is-invalid:focus {
    box-shadow: 0 0 0 3px rgba(231, 76, 60, 0.1);
}

textarea.form-control-modern {
    resize: vertical;
    min-height: 120px;
}

.form-help-text {
    font-size: 0.85rem;
    color: #666;
    margin-top: 5px;
    display: block;
}

.invalid-feedback-modern {
    color: #e74c3c;
    font-size: 0.875rem;
    margin-top: 5px;
    display: block;
}

.file-input-wrapper {
    position: relative;
}

.file-input-modern {
    display: none;
}

.file-input-label {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 30px;
    border: 2px dashed #e9ecef;
    border-radius: 12px;
    background: #f8f9fa;
    cursor: pointer;
    transition: all 0.3s ease;
}

.file-input-label:hover {
    border-color: #667eea;
    background: rgba(102, 126, 234, 0.05);
}

.file-input-label i {
    font-size: 2rem;
    color: #667eea;
    margin-right: 15px;
}

.file-input-text {
    display: flex;
    flex-direction: column;
}

.file-input-title {
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 5px;
}

.file-input-subtitle {
    font-size: 0.85rem;
    color: #666;
}

.selected-file {
    margin-top: 10px;
    padding: 10px 15px;
    background: rgba(102, 126, 234, 0.1);
    border-radius: 8px;
    color: #667eea;
    font-size: 0.9rem;
}

.form-actions {
    display: flex;
    gap: 15px;
    justify-content: center;
    margin-top: 40px;
    padding-top: 30px;
    border-top: 2px solid #e9ecef;
}

.btn-modern {
    padding: 14px 35px;
    border-radius: 50px;
    font-weight: 600;
    font-size: 1rem;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.btn-primary-modern {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.btn-primary-modern:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
    color: white;
}

.btn-secondary-modern {
    background: #6c757d;
    color: white;
}

.btn-secondary-modern:hover {
    background: #5a6268;
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(108, 117, 125, 0.3);
    color: white;
    text-decoration: none;
}

.form-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
}

@media (max-width: 768px) {
    .modern-form-card {
        padding: 30px 20px;
    }
    
    .form-title {
        font-size: 2rem;
    }
    
    .form-actions {
        flex-direction: column;
    }
    
    .btn-modern {
        width: 100%;
        justify-content: center;
    }
    
    .form-row {
        grid-template-columns: 1fr;
    }
}
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