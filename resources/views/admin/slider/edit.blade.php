@extends('admin.layout')
@section('title', 'Edit Slider')
@section('content')

<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-8">
            <!-- Page Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="h3 mb-1 text-dark fw-bold">
                        <i class="fas fa-edit text-primary me-2"></i>
                        Edit Slider
                    </h2>
                    <p class="text-muted mb-0">Update slider image and settings</p>
                </div>
                <a href="{{ route('admin.sliders.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    Back to Sliders
                </a>
            </div>

            <!-- Main Card -->
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-gradient-primary text-white py-3">
                    <div class="d-flex align-items-center">
                        <div class="bg-white bg-opacity-25 rounded-circle p-2 me-3">
                            <i class="fas fa-images text-white fs-5"></i>
                        </div>
                        <div>
                            <h4 class="card-title mb-0 fw-bold">Slider Information</h4>
                            <small class="opacity-75">Current slider ID: #{{ $slider->id }}</small>
                        </div>
                    </div>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data" id="sliderForm">
                        @csrf
                        @method('PUT')

                        <!-- Current Image Display -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="current-image-section">
                                    <label class="form-label fw-semibold text-dark mb-3">
                                        <i class="fas fa-eye me-2 text-info"></i>
                                        Current Image
                                    </label>
                                    <div class="current-image-container text-center p-4 bg-light rounded-3 border-2 border-dashed border-secondary">
                                        @if($slider->image_path)
                                            <img src="{{ asset( $slider->image_path) }}" 
                                                 alt="Current Slider Image" 
                                                 class="img-fluid rounded shadow-sm" 
                                                 style="max-height: 200px; max-width: 100%;">
                                            <div class="mt-2">
                                                <small class="text-muted">Current image: {{ basename($slider->image_path) }}</small>
                                            </div>
                                        @else
                                            <div class="text-muted">
                                                <i class="fas fa-image fa-3x mb-3 opacity-50"></i>
                                                <p class="mb-0">No current image</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Image Upload Section -->
                        <div class="row mb-4">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="image_path" class="form-label fw-semibold text-dark">
                                        <i class="fas fa-upload me-2 text-primary"></i>
                                        New Image
                                    </label>
                                    <div class="input-group">
                                        <input type="file" 
                                               name="image_path" 
                                               id="image_path" 
                                               class="form-control @error('image_path') is-invalid @enderror"
                                               accept="image/*"
                                               onchange="previewImage(this)">
                                        <button class="btn btn-outline-secondary" type="button" onclick="document.getElementById('image_path').click()">
                                            <i class="fas fa-folder-open me-2"></i>Browse
                                        </button>
                                    </div>
                                    @error('image_path')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-triangle me-2"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    
                                    <!-- File Size Indicator -->
                                    <div class="mt-2">
                                        <div class="progress" style="height: 4px; display: none;" id="fileProgress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 0%"></div>
                                        </div>
                                        <small class="text-muted" id="fileInfo"></small>
                                    </div>
                                    <div class="form-text">
                                        <i class="fas fa-info-circle me-2 text-info"></i>
                                        Recommended: JPG, PNG, or GIF. Max size: 5MB. Optimal dimensions: 1920x800px
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Image Preview -->
                            <div class="col-md-4">
                                <div class="image-preview-section">
                                    <label class="form-label fw-semibold text-dark mb-3">
                                        <i class="fas fa-eye me-2 text-success"></i>
                                        Preview
                                    </label>
                                    <div id="imagePreview" class="image-preview-container text-center p-3 bg-light rounded-3 border-2 border-dashed border-success" style="min-height: 150px;">
                                        <div class="text-muted">
                                            <i class="fas fa-image fa-2x mb-2 opacity-50"></i>
                                            <p class="mb-0 small">Image preview will appear here</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Image Requirements & Tips -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="card border-0 bg-light-subtle">
                                    <div class="card-body p-3">
                                        <h6 class="fw-semibold text-dark mb-2">
                                            <i class="fas fa-info-circle text-info me-2"></i>
                                            Image Requirements
                                        </h6>
                                        <ul class="list-unstyled mb-0 small">
                                            <li class="mb-1"><i class="fas fa-check text-success me-2"></i>Format: JPG, PNG, GIF, WebP</li>
                                            <li class="mb-1"><i class="fas fa-check text-success me-2"></i>Max size: 5MB</li>
                                            <li class="mb-1"><i class="fas fa-check text-success me-2"></i>Optimal: 1920x800px</li>
                                            <li class="mb-0"><i class="fas fa-check text-success me-2"></i>Aspect ratio: 2.4:1</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card border-0 bg-warning-subtle">
                                    <div class="card-body p-3">
                                        <h6 class="fw-semibold text-dark mb-2">
                                            <i class="fas fa-lightbulb text-warning me-2"></i>
                                            Pro Tips
                                        </h6>
                                        <ul class="list-unstyled mb-0 small">
                                            <li class="mb-1"><i class="fas fa-star text-warning me-2"></i>Use high-quality, optimized images</li>
                                            <li class="mb-1"><i class="fas fa-star text-warning me-2"></i>Consider WebP for modern browsers</li>
                                            <li class="mb-0"><i class="fas fa-star text-warning me-2"></i>Ensure good contrast for text overlay</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex gap-3 justify-content-end">
                                    <a href="{{ route('admin.sliders.index') }}" class="btn btn-light px-4 py-2">
                                        <i class="fas fa-times me-2"></i>
                                        Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary px-4 py-2" id="submitBtn">
                                        <i class="fas fa-save me-2"></i>
                                        <span id="submitText">Update Slider</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom Styles -->
<style>
.bg-gradient-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.card {
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
}

.current-image-container, .image-preview-container {
    transition: all 0.3s ease;
    border-style: dashed !important;
}

.current-image-container:hover, .image-preview-container:hover {
    border-color: #6c757d !important;
    background-color: #f8f9fa !important;
}

.image-preview-container img {
    transition: all 0.3s ease;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.btn {
    border-radius: 8px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.form-control {
    border-radius: 8px;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
}

.alert {
    border-radius: 12px;
}

.invalid-feedback {
    font-size: 0.875rem;
    margin-top: 0.5rem;
}

.form-text {
    font-size: 0.875rem;
    margin-top: 0.5rem;
}

.bg-light-subtle {
    background-color: rgba(248, 249, 250, 0.8) !important;
}

.bg-warning-subtle {
    background-color: rgba(255, 193, 7, 0.1) !important;
}

.card.border-0 {
    transition: all 0.3s ease;
}

.card.border-0:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.list-unstyled li {
    transition: all 0.2s ease;
}

.list-unstyled li:hover {
    transform: translateX(5px);
    color: #495057;
}
</style>

<!-- JavaScript for Image Preview -->
<script>
function previewImage(input) {
    const preview = document.getElementById('imagePreview');
    const submitBtn = document.getElementById('submitBtn');
    const submitText = document.getElementById('submitText');
    const fileProgress = document.getElementById('fileProgress');
    const fileInfo = document.getElementById('fileInfo');
    
    if (input.files && input.files[0]) {
        const file = input.files[0];
        const fileSize = (file.size / 1024 / 1024).toFixed(2); // Convert to MB
        
        // Show file info
        fileInfo.innerHTML = `
            <i class="fas fa-file-image me-1"></i>
            <strong>${file.name}</strong> (${fileSize} MB)
        `;
        
        // Validate file size (5MB limit)
        if (file.size > 5 * 1024 * 1024) {
            fileInfo.innerHTML = `
                <i class="fas fa-exclamation-triangle text-danger me-1"></i>
                <span class="text-danger">File too large! Max size is 5MB</span>
            `;
            submitBtn.disabled = true;
            submitBtn.classList.remove('btn-primary');
            submitBtn.classList.add('btn-secondary');
            return;
        }
        
        // Show progress bar
        fileProgress.style.display = 'block';
        fileProgress.querySelector('.progress-bar').style.width = '0%';
        
        const reader = new FileReader();
        
        reader.onprogress = function(e) {
            if (e.lengthComputable) {
                const progress = (e.loaded / e.total) * 100;
                fileProgress.querySelector('.progress-bar').style.width = progress + '%';
            }
        };
        
        reader.onload = function(e) {
            // Hide progress bar
            fileProgress.style.display = 'none';
            
            preview.innerHTML = `
                <img src="${e.target.result}" 
                     alt="Image Preview" 
                     class="img-fluid rounded shadow-sm" 
                     style="max-height: 150px; max-width: 100%;">
                <div class="mt-2">
                    <small class="text-success fw-semibold">
                        <i class="fas fa-check-circle me-1"></i>
                        ${file.name}
                    </small>
                    <br>
                    <small class="text-muted">${fileSize} MB</small>
                </div>
            `;
            
            // Enable submit button
            submitBtn.disabled = false;
            submitBtn.classList.remove('btn-secondary');
            submitBtn.classList.add('btn-primary');
            
            // Show success message
            fileInfo.innerHTML = `
                <i class="fas fa-check-circle text-success me-1"></i>
                <span class="text-success">Image loaded successfully!</span>
            `;
        };
        
        reader.readAsDataURL(file);
    } else {
        preview.innerHTML = `
            <div class="text-muted">
                <i class="fas fa-image fa-2x mb-2 opacity-50"></i>
                <p class="mb-0 small">Image preview will appear here</p>
            </div>
        `;
        
        // Hide progress and clear file info
        fileProgress.style.display = 'none';
        fileInfo.innerHTML = '';
    }
}

// Form submission handling
document.getElementById('sliderForm').addEventListener('submit', function(e) {
    const submitBtn = document.getElementById('submitBtn');
    const submitText = document.getElementById('submitText');
    
    // Disable button and show loading state
    submitBtn.disabled = true;
    submitBtn.classList.remove('btn-primary');
    submitBtn.classList.add('btn-secondary');
    submitText.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Updating...';
});

// Initialize page
document.addEventListener('DOMContentLoaded', function() {
    // Add any initialization code here
    console.log('Slider edit page loaded successfully');
});
</script>

@endsection