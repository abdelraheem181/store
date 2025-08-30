@extends('admin.layout')

@section('title', 'Edit Book')

@section('content')
<div class="container-fluid px-4 py-4">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1 text-dark fw-bold">
                        <i class="fas fa-edit me-2 text-primary"></i>Edit Book
                    </h2>
                    <p class="text-muted mb-0">Update book information and details</p>
                </div>
                <div>
                    <a href="{{ route('admin.books.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Books
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Alert Messages -->
    @if($errors->any())
        <div class="row mb-4">
            <div class="col-12">
                <div class="alert alert-danger border-0 shadow-sm">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-exclamation-triangle me-3 text-danger"></i>
                        <div>
                            <h6 class="alert-heading mb-1">Please fix the following errors:</h6>
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <form action="{{ route('admin.books.update', $book->id) }}" method="post" enctype="multipart/form-data" id="bookForm">
        @csrf
        @method('put')
        
        <div class="row">
            <!-- Left Column - Basic Information -->
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">
                            <i class="fas fa-info-circle me-2"></i>Basic Information
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <!-- Name in Arabic -->
                            <div class="col-md-6 mb-3">
                                <label for="name_ar" class="form-label fw-semibold">
                                    <i class="fas fa-font me-1 text-primary"></i>Name in Arabic
                                </label>
                                <input type="text" name="name_ar" class="form-control form-control-lg" required 
                                       id="name_ar" value="{{ $book->getTranslation('name', 'ar') }}"
                                       placeholder="Enter book name in Arabic">
                                @error('name_ar')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Name in English -->
                            <div class="col-md-6 mb-3">
                                <label for="name_en" class="form-label fw-semibold">
                                    <i class="fas fa-font me-1 text-primary"></i>Name in English
                                </label>
                                <input type="text" name="name_en" class="form-control form-control-lg" required 
                                       id="name_en" value="{{ $book->getTranslation('name', 'en') }}"
                                       placeholder="Enter book name in English">
                                @error('name_en')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Description in Arabic -->
                            <div class="col-md-6 mb-3">
                                <label for="description_ar" class="form-label fw-semibold">
                                    <i class="fas fa-align-right me-1 text-primary"></i>Description in Arabic
                                </label>
                                <textarea name="description_ar" class="form-control" required id="description_ar" 
                                          rows="4" placeholder="Enter book description in Arabic">{{ $book->getTranslation('description', 'ar') }}</textarea>
                                @error('description_ar')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Description in English -->
                            <div class="col-md-6 mb-3">
                                <label for="description_en" class="form-label fw-semibold">
                                    <i class="fas fa-align-left me-1 text-primary"></i>Description in English
                                </label>
                                <textarea name="description_en" class="form-control" required id="description_en" 
                                          rows="4" placeholder="Enter book description in English">{{ $book->getTranslation('description', 'en') }}</textarea>
                                @error('description_en')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Book Details -->
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">
                            <i class="fas fa-book me-2"></i>Book Details
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <!-- Category -->
                            <div class="col-md-6 mb-3">
                                <label for="category_id" class="form-label fw-semibold">
                                    <i class="fas fa-tags me-1 text-success"></i>Category
                                </label>
                                <select name="category_id" class="form-select form-select-lg" required id="category_id">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Author -->
                            <div class="col-md-6 mb-3">
                                <label for="author_id" class="form-label fw-semibold">
                                    <i class="fas fa-user me-1 text-success"></i>Author
                                </label>
                                <select name="author_id" class="form-select form-select-lg" required id="author_id">
                                    <option value="">Select Author</option>
                                    @foreach ($authors as $author)
                                        <option value="{{ $author->id }}" {{ $book->author_id == $author->id ? 'selected' : '' }}>
                                            {{ $author->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('author_id')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Price -->
                            <div class="col-md-6 mb-3">
                                <label for="price" class="form-label fw-semibold">
                                    <i class="fas fa-dollar-sign me-1 text-success"></i>Price
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" name="price" class="form-control form-control-lg" required 
                                           id="price" value="{{ $book->price }}" step="0.01" min="0"
                                           placeholder="0.00">
                                </div>
                                @error('price')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Published Date -->
                            <div class="col-md-6 mb-3">
                                <label for="published_date" class="form-label fw-semibold">
                                    <i class="fas fa-calendar me-1 text-success"></i>Published Date
                                </label>
                                <input type="date" name="published_date" class="form-control form-control-lg" required 
                                       id="published_date" value="{{ $book->published_date }}">
                                @error('published_date')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Pages -->
                            <div class="col-md-6 mb-3">
                                <label for="pages" class="form-label fw-semibold">
                                    <i class="fas fa-file-alt me-1 text-success"></i>Pages
                                </label>
                                <input type="number" name="pages" class="form-control form-control-lg" required 
                                       id="pages" value="{{ $book->pages }}" min="1"
                                       placeholder="Number of pages">
                                @error('pages')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- ISBN -->
                            <div class="col-md-6 mb-3">
                                <label for="isbn" class="form-label fw-semibold">
                                    <i class="fas fa-barcode me-1 text-success"></i>ISBN
                                </label>
                                <input type="text" name="isbn" class="form-control form-control-lg" required 
                                       id="isbn" value="{{ $book->isbn }}"
                                       placeholder="Enter ISBN number">
                                @error('isbn')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Language -->
                            <div class="col-md-6 mb-3">
                                <label for="language" class="form-label fw-semibold">
                                    <i class="fas fa-language me-1 text-success"></i>Language
                                </label>
                                <input type="text" name="language" class="form-control form-control-lg" required 
                                       id="language" value="{{ $book->language }}"
                                       placeholder="e.g., English, Arabic">
                                @error('language')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Country -->
                            <div class="col-md-6 mb-3">
                                <label for="country_id" class="form-label fw-semibold">
                                    <i class="fas fa-flag me-1 text-success"></i>Country
                                </label>
                                <select name="country_id" class="form-select form-select-lg" required id="country_id">
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" {{ $book->country_id == $country->id ? 'selected' : '' }}>
                                            {{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Weight -->
                            <div class="col-md-6 mb-3">
                                <label for="weight" class="form-label fw-semibold">
                                    <i class="fas fa-weight-hanging me-1 text-success"></i>Weight
                                </label>
                                <div class="input-group">
                                    <input type="text" name="weight" class="form-control form-control-lg" required 
                                           id="weight" value="{{ $book->weight }}"
                                           placeholder="e.g., 500g">
                                    <span class="input-group-text">grams</span>
                                </div>
                                @error('weight')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tags -->
                            <div class="col-md-6 mb-3">
                                <label for="tags" class="form-label fw-semibold">
                                    <i class="fas fa-tags me-1 text-success"></i>Tags
                                </label>
                                <input type="text" name="tags" class="form-control form-control-lg" required 
                                       id="tags" value="{{ $book->tags }}"
                                       placeholder="Enter tags separated by commas">
                                @error('tags')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Format -->
                            <div class="col-md-6 mb-3">
                                <label for="format" class="form-label fw-semibold">
                                    <i class="fas fa-file me-1 text-success"></i>Format
                                </label>
                                <input type="text" name="format" class="form-control form-control-lg" required 
                                       id="format" value="{{ $book->format }}"
                                       placeholder="e.g., Hardcover, Paperback">
                                @error('format')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Publish Year -->
                            <div class="col-md-6 mb-3">
                                <label for="publish_year" class="form-label fw-semibold">
                                    <i class="fas fa-calendar-alt me-1 text-success"></i>Publish Year
                                </label>
                                <input type="text" name="publish_year" class="form-control form-control-lg" required 
                                       id="publish_year" value="{{ $book->publish_year }}"
                                       placeholder="e.g., 2024">
                                @error('publish_year')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Image Upload & Actions -->
            <div class="col-lg-4">
                <!-- Image Upload -->
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0">
                            <i class="fas fa-image me-2"></i>Book Cover
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <!-- Current Image Preview -->
                        @if($book->basic_image_path)
                            <div class="text-center mb-3">
                                <img src="{{ asset('images/books/' . $book->basic_image_path) }}" 
                                     alt="Current Book Cover" 
                                     class="img-fluid rounded shadow-sm" 
                                     style="max-height: 200px; max-width: 100%;">
                                <p class="text-muted small mt-2">Current cover image</p>
                            </div>
                        @endif

                        <!-- File Upload -->
                        <div class="mb-3">
                            <label for="basic_image_path" class="form-label fw-semibold">
                                <i class="fas fa-upload me-1 text-info"></i>Upload New Image
                            </label>
                            <div class="upload-area border-2 border-dashed border-info rounded p-4 text-center" 
                                 style="background-color: #f8f9fa;">
                                <input type="file" name="basic_image_path" class="form-control" 
                                       id="basic_image_path" accept="image/*">
                                <div class="mt-2">
                                    <i class="fas fa-cloud-upload-alt fa-2x text-info mb-2"></i>
                                    <p class="text-muted small mb-0">Click to browse or drag and drop</p>
                                    <p class="text-muted small">Supports: JPG, PNG, GIF (Max: 5MB)</p>
                                </div>
                            </div>
                            @error('basic_image_path')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="mb-0">
                            <i class="fas fa-cogs me-2"></i>Actions
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg" id="update">
                                <i class="fas fa-save me-2"></i>Update Book
                            </button>
                            <a href="{{ route('admin.books.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-2"></i>Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<style>
.card {
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.1) !important;
}

.form-control, .form-select {
    border-radius: 8px;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
}

.form-control:focus, .form-select:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
}

.card-header {
    border-radius: 8px 8px 0 0 !important;
}

.upload-area {
    transition: all 0.3s ease;
    cursor: pointer;
}

.upload-area:hover {
    background-color: #e3f2fd !important;
    border-color: #2196f3 !important;
}

.btn {
    border-radius: 8px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-1px);
}

.alert {
    border-radius: 8px;
    border: none;
}

.form-label {
    color: #495057;
    margin-bottom: 0.5rem;
}

.invalid-feedback {
    font-size: 0.875rem;
    margin-top: 0.25rem;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // File upload preview
    const fileInput = document.getElementById('basic_image_path');
    const uploadArea = document.querySelector('.upload-area');
    
    if (fileInput && uploadArea) {
        uploadArea.addEventListener('click', () => fileInput.click());
        
        fileInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Create preview image
                    const preview = document.createElement('img');
                    preview.src = e.target.result;
                    preview.className = 'img-fluid rounded shadow-sm mb-2';
                    preview.style.maxHeight = '150px';
                    preview.style.maxWidth = '100%';
                    
                    // Clear previous preview and add new one
                    uploadArea.innerHTML = '';
                    uploadArea.appendChild(preview);
                    uploadArea.appendChild(fileInput);
                };
                reader.readAsDataURL(file);
            }
        });
    }
    
    // Form validation enhancement
    const form = document.getElementById('bookForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            const submitBtn = document.getElementById('update');
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Updating...';
        });
    }
});
</script>

@endsection