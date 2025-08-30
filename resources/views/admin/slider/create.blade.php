@extends('admin.layout')
@section('title', 'Create Slider')
@section('content')

<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-8">
            <!-- Page Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="h3 mb-1 text-dark fw-bold">
                        <i class="fas fa-images text-primary me-2"></i>
                        Create New Slider
                    </h2>
                    <p class="text-muted mb-0">Add a new slider image to showcase on your website</p>
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
                        <div class="bg-white bg-opacity-20 rounded-circle p-2 me-3">
                            <i class="fas fa-plus-circle fs-4"></i>
                        </div>
                        <div>
                            <h5 class="card-title mb-1 fw-bold">Slider Information</h5>
                            <small class="text-white-75">Upload and configure your slider image</small>
                        </div>
                    </div>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data" id="sliderForm">
                        @csrf
                        
                        <div class="row g-4">
                            <!-- Image Upload Section -->
                            <div class="col-lg-8">
                                <div class="upload-section">
                                    <label for="image_path" class="form-label fw-semibold text-dark mb-3">
                                        <i class="fas fa-image text-primary me-2"></i>
                                        Slider Image
                                        <span class="text-danger">*</span>
                                    </label>
                                    
                                    <div class="upload-area border-2 border-dashed border-primary rounded-3 p-5 text-center position-relative" 
                                         id="uploadArea">
                                        <div class="upload-content">
                                            <div class="upload-icon mb-3">
                                                <i class="fas fa-cloud-upload-alt text-primary" style="font-size: 3rem;"></i>
                                            </div>
                                            <h5 class="text-dark mb-2">Drop your image here</h5>
                                            <p class="text-muted mb-3">or click to browse files</p>
                                            <button type="button" class="btn btn-primary btn-lg px-4" onclick="document.getElementById('image_path').click()">
                                                <i class="fas fa-folder-open me-2"></i>
                                                Choose File
                                            </button>
                                            <input type="file" name="image_path" id="image_path" class="d-none" 
                                                   accept="image/*" onchange="previewImage(this)">
                                        </div>
                                        
                                        <!-- Preview Container -->
                                        <div id="imagePreview" class="d-none position-absolute top-0 start-0 w-100 h-100">
                                            <img id="previewImg" src="" alt="Preview" class="w-100 h-100 object-fit-cover rounded-3">
                                            <div class="position-absolute top-0 end-0 p-2">
                                                <button type="button" class="btn btn-danger btn-sm rounded-circle" onclick="removeImage()">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    @error('image_path')
                                        <div class="alert alert-danger mt-3 d-flex align-items-center">
                                            <i class="fas fa-exclamation-triangle me-2"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    
                                    <div class="form-text mt-2">
                                        <i class="fas fa-info-circle text-info me-1"></i>
                                        Recommended size: 1920x600px. Supported formats: JPG, PNG, GIF. Max size: 5MB.
                                    </div>
                                </div>
                            </div>

                            <!-- Image Preview & Info -->
                            <div class="col-lg-4">
                                <div class="preview-info">
                                    <div class="card border-0 bg-light">
                                        <div class="card-header bg-white border-bottom">
                                            <h6 class="mb-0 fw-semibold">
                                                <i class="fas fa-eye text-primary me-2"></i>
                                                Preview & Info
                                            </h6>
                                        </div>
                                        <div class="card-body">
                                            <div id="previewInfo" class="text-center py-4">
                                                <i class="fas fa-image text-muted" style="font-size: 4rem;"></i>
                                                <p class="text-muted mt-2 mb-0">No image selected</p>
                                            </div>
                                            
                                            <div id="imageInfo" class="d-none">
                                                <div class="text-center mb-3">
                                                    <img id="infoImg" src="" alt="Preview" class="img-fluid rounded shadow-sm" style="max-height: 150px;">
                                                </div>
                                                <div class="image-details">
                                                    <div class="d-flex justify-content-between mb-2">
                                                        <span class="text-muted">File name:</span>
                                                        <span id="fileName" class="fw-semibold"></span>
                                                    </div>
                                                    <div class="d-flex justify-content-between mb-2">
                                                        <span class="text-muted">File size:</span>
                                                        <span id="fileSize" class="fw-semibold"></span>
                                                    </div>
                                                    <div class="d-flex justify-content-between mb-2">
                                                        <span class="text-muted">Dimensions:</span>
                                                        <span id="fileDimensions" class="fw-semibold"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="row mt-5">
                            <div class="col-12">
                                <div class="d-flex justify-content-end gap-3">
                                    <a href="{{ route('admin.sliders.index') }}" class="btn btn-outline-secondary btn-lg px-4">
                                        <i class="fas fa-times me-2"></i>
                                        Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary btn-lg px-5" id="submitBtn">
                                        <i class="fas fa-save me-2"></i>
                                        Create Slider
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

<style>
.bg-gradient-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.upload-area {
    transition: all 0.3s ease;
    cursor: pointer;
    min-height: 300px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.upload-area:hover {
    border-color: #667eea !important;
    background-color: rgba(102, 126, 234, 0.05);
}

.upload-area.dragover {
    border-color: #667eea !important;
    background-color: rgba(102, 126, 234, 0.1);
    transform: scale(1.02);
}

.object-fit-cover {
    object-fit: cover;
}

.card {
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-2px);
}

.btn {
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-1px);
}

.alert {
    border-radius: 0.75rem;
}

.form-control:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
}

.upload-icon {
    animation: bounce 2s infinite;
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
    }
    40% {
        transform: translateY(-10px);
    }
    60% {
        transform: translateY(-5px);
    }
}

.image-details {
    font-size: 0.9rem;
}

.preview-info .card {
    position: sticky;
    top: 20px;
}
</style>

<script>
function previewImage(input) {
    const file = input.files[0];
    if (file) {
        // Show preview
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('previewImg').src = e.target.result;
            document.getElementById('infoImg').src = e.target.result;
            document.getElementById('imagePreview').classList.remove('d-none');
            document.getElementById('uploadContent').classList.add('d-none');
            document.getElementById('previewInfo').classList.add('d-none');
            document.getElementById('imageInfo').classList.remove('d-none');
            
            // Update file info
            document.getElementById('fileName').textContent = file.name;
            document.getElementById('fileSize').textContent = formatFileSize(file.size);
            
            // Get image dimensions
            const img = new Image();
            img.onload = function() {
                document.getElementById('fileDimensions').textContent = `${this.width} × ${this.height}px`;
            };
            img.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
}

function removeImage() {
    document.getElementById('image_path').value = '';
    document.getElementById('imagePreview').classList.add('d-none');
    document.getElementById('uploadContent').classList.remove('d-none');
    document.getElementById('previewInfo').classList.remove('d-none');
    document.getElementById('imageInfo').classList.add('d-none');
}

function formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
}

// Drag and drop functionality
document.addEventListener('DOMContentLoaded', function() {
    const uploadArea = document.getElementById('uploadArea');
    const uploadContent = document.querySelector('.upload-content');
    
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        uploadArea.addEventListener(eventName, preventDefaults, false);
    });
    
    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }
    
    ['dragenter', 'dragover'].forEach(eventName => {
        uploadArea.addEventListener(eventName, highlight, false);
    });
    
    ['dragleave', 'drop'].forEach(eventName => {
        uploadArea.addEventListener(eventName, unhighlight, false);
    });
    
    function highlight(e) {
        uploadArea.classList.add('dragover');
    }
    
    function unhighlight(e) {
        uploadArea.classList.remove('dragover');
    }
    
    uploadArea.addEventListener('drop', handleDrop, false);
    
    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        document.getElementById('image_path').files = files;
        previewImage(document.getElementById('image_path'));
    }
    
    // Form validation
    document.getElementById('sliderForm').addEventListener('submit', function(e) {
        const fileInput = document.getElementById('image_path');
        if (!fileInput.files[0]) {
            e.preventDefault();
            alert('Please select an image file.');
            return false;
        }
        
        const submitBtn = document.getElementById('submitBtn');
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Creating...';
        submitBtn.disabled = true;
    });
});
</script>

@endsection