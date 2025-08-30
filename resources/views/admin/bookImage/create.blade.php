@extends('admin.layout')
@section('title', 'Book Image Management')
@section('content')
<div class="container-fluid">
    <!-- Breadcrumb -->
    <div class="row mb-3">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none"><i class="fas fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.book-images.index') }}" class="text-decoration-none"><i class="fas fa-images"></i> Book Images</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-plus"></i> Create New</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-plus-circle me-2 fs-4"></i>
                        <h4 class="card-title mb-0">Create New Book Image</h4>
                    </div>
                </div>

                <!-- Error Messages -->
                @if($errors->any())
                    <div class="card-body pb-0">
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                {{ $error }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endforeach
                    </div>
                @endif
                
                <div class="card-body p-4">
                    <form action="{{ route('admin.book-images.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="book_id" class="form-label fw-bold">
                                    <i class="fas fa-book me-2 text-primary"></i>Select Book
                                </label>
                                <select name="book_id" id="book_id" class="form-select @error('book_id') is-invalid @enderror" required>
                                    <option value="">Choose a book...</option>
                                    @foreach($books as $book)
                                        <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>
                                            {{ $book->getTranslation('name', 'en') }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please select a book.
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="image_path" class="form-label fw-bold">
                                    <i class="fas fa-image me-2 text-primary"></i>Upload Image
                                </label>
                                <div class="input-group">
                                    <input type="file" name="image_path" id="image_path" 
                                           class="form-control @error('image_path') is-invalid @enderror" 
                                           accept="image/*" required>
                                    <button class="btn btn-outline-secondary" type="button" onclick="document.getElementById('image_path').click()">
                                        <i class="fas fa-upload"></i>
                                    </button>
                                </div>
                                <div class="form-text">
                                    <i class="fas fa-info-circle me-1"></i>
                                    Supported formats: JPG, PNG, GIF. Max size: 2MB
                                </div>
                                <div class="invalid-feedback">
                                    Please select an image file.
                                </div>
                            </div>
                        </div>

                        <!-- Image Preview -->
                        <div class="row mb-3" id="imagePreviewContainer" style="display: none;">
                            <div class="col-12">
                                <label class="form-label fw-bold">
                                    <i class="fas fa-eye me-2 text-primary"></i>Image Preview
                                </label>
                                <div class="text-center">
                                    <img id="imagePreview" src="" alt="Preview" class="img-fluid rounded shadow-sm" style="max-height: 200px;">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary px-4 py-2">
                                        <i class="fas fa-save me-2"></i>Create Book Image
                                    </button>
                                    <a href="{{ route('admin.book-images.index') }}" class="btn btn-secondary px-4 py-2">
                                        <i class="fas fa-arrow-left me-2"></i>Back to List
                                    </a>
                                    <button type="reset" class="btn btn-outline-secondary px-4 py-2">
                                        <i class="fas fa-undo me-2"></i>Reset Form
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

<!-- Custom CSS -->
<style>
.card {
    border-radius: 15px;
    overflow: hidden;
}

.card-header {
    border-bottom: none;
    padding: 1.5rem;
}

.breadcrumb {
    background: transparent;
    padding: 0;
    margin: 0;
}

.breadcrumb-item a {
    color: #6c757d;
    transition: color 0.3s ease;
}

.breadcrumb-item a:hover {
    color: #0d6efd;
}

.form-label {
    color: #495057;
    margin-bottom: 0.5rem;
}

.form-control, .form-select {
    border-radius: 8px;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
    padding: 0.75rem 1rem;
}

.form-control:focus, .form-select:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
}

.btn {
    border-radius: 8px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-primary {
    background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
    border: none;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3);
}

.alert {
    border-radius: 10px;
    border: none;
}

.alert-danger {
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
    color: white;
}

#imagePreviewContainer {
    background: #f8f9fa;
    padding: 1rem;
    border-radius: 10px;
    border: 2px dashed #dee2e6;
}

.input-group .btn-outline-secondary {
    border-left: none;
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
}

.input-group .form-control {
    border-right: none;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}
</style>

<!-- JavaScript for Image Preview -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const imageInput = document.getElementById('image_path');
    const imagePreview = document.getElementById('imagePreview');
    const imagePreviewContainer = document.getElementById('imagePreviewContainer');

    imageInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreviewContainer.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                alert('Please select a valid image file.');
                imageInput.value = '';
                imagePreviewContainer.style.display = 'none';
            }
        } else {
            imagePreviewContainer.style.display = 'none';
        }
    });

    // Form validation
    const form = document.querySelector('.needs-validation');
    form.addEventListener('submit', function(event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    });
});
</script>
@endsection
