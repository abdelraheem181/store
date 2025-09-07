@extends('admin.layout')

@section('title', 'Create Book')

@section('content')
<div class="container-fluid px-4 py-4">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1 text-dark fw-bold">
                        <i class="fas fa-plus-circle text-primary me-2"></i>
                        Create New Book
                    </h2>
                    <p class="text-muted mb-0">Add a new book to your collection</p>
                </div>
                <div>
                    <a href="{{ route('admin.books.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Books
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Form Card -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="card-title mb-0 text-dark fw-semibold">
                        <i class="fas fa-book me-2 text-primary"></i>
                        Book Information
                    </h5>
                </div>
                <div class="card-body p-4">
                    <!-- Error Messages -->
                    @if($errors->any())
                        <div class="alert alert-danger border-0 shadow-sm mb-4">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <strong>Please fix the following errors:</strong>
                            </div>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.books.store') }}" method="post" enctype="multipart/form-data" id="bookForm">
                        @csrf
                        
                        <!-- Basic Information Section -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h6 class="text-primary fw-semibold mb-3">
                                    <i class="fas fa-info-circle me-2"></i>Basic Information
                                </h6>
                            </div>
                            
                            <!-- Book Names -->
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="name_ar" class="form-label fw-semibold">
                                        <i class="fas fa-font me-1 text-muted"></i>Name in Arabic
                                    </label>
                                    <input type="text" name="name_ar" class="form-control @error('name_ar') is-invalid @enderror" 
                                           required id="name_ar" placeholder="Enter book name in Arabic">
                                    @error('name_ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="name_en" class="form-label fw-semibold">
                                        <i class="fas fa-font me-1 text-muted"></i>Name in English
                                    </label>
                                    <input type="text" name="name_en" class="form-control @error('name_en') is-invalid @enderror" 
                                           required id="name_en" placeholder="Enter book name in English">
                                    @error('name_en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Description Section -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h6 class="text-primary fw-semibold mb-3">
                                    <i class="fas fa-align-left me-2"></i>Description
                                </h6>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="description_ar" class="form-label fw-semibold">
                                        <i class="fas fa-align-right me-1 text-muted"></i>Description in Arabic
                                    </label>
                                    <textarea name="description_ar" class="form-control @error('description_ar') is-invalid @enderror" 
                                              required id="description_ar" rows="4" 
                                              placeholder="Enter book description in Arabic"></textarea>
                                    @error('description_ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="description_en" class="form-label fw-semibold">
                                        <i class="fas fa-align-left me-1 text-muted"></i>Description in English
                                    </label>
                                    <textarea name="description_en" class="form-control @error('description_en') is-invalid @enderror" 
                                              required id="description_en" rows="4" 
                                              placeholder="Enter book description in English"></textarea>
                                    @error('description_en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Category and Author Section -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h6 class="text-primary fw-semibold mb-3">
                                    <i class="fas fa-tags me-2"></i>Classification
                                </h6>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="category_id" class="form-label fw-semibold">
                                        <i class="fas fa-folder me-1 text-muted"></i>Category
                                    </label>
                                    <select name="category_id" class="form-select @error('category_id') is-invalid @enderror" 
                                            required id="category_id">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="author_id" class="form-label fw-semibold">
                                        <i class="fas fa-user me-1 text-muted"></i>Author
                                    </label>
                                    <select name="author_id" class="form-select @error('author_id') is-invalid @enderror" 
                                            required id="author_id">
                                        <option value="">Select Author</option>
                                        @foreach ($authors as $author)
                                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('author_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Pricing and Publication Section -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h6 class="text-primary fw-semibold mb-3">
                                    <i class="fas fa-dollar-sign me-2"></i>Pricing & Publication
                                </h6>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="price" class="form-label fw-semibold">
                                        <i class="fas fa-tag me-1 text-muted"></i>Price
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" 
                                               required id="price" step="0.01" placeholder="0.00">
                                    </div>
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="published_date" class="form-label fw-semibold">
                                        <i class="fas fa-calendar me-1 text-muted"></i>Published Date
                                    </label>
                                    <input type="date" name="published_date" class="form-control @error('published_date') is-invalid @enderror" 
                                           required id="published_date">
                                    @error('published_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="publish_year" class="form-label fw-semibold">
                                        <i class="fas fa-calendar-alt me-1 text-muted"></i>Publish Year
                                    </label>
                                    <input type="text" name="publish_year" class="form-control @error('publish_year') is-invalid @enderror" 
                                           required id="publish_year" placeholder="e.g., 2024">
                                    @error('publish_year')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Book Details Section -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h6 class="text-primary fw-semibold mb-3">
                                    <i class="fas fa-book-open me-2"></i>Book Details
                                </h6>
                            </div>
                            
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="pages" class="form-label fw-semibold">
                                        <i class="fas fa-file-alt me-1 text-muted"></i>Pages
                                    </label>
                                    <input type="number" name="pages" class="form-control @error('pages') is-invalid @enderror" 
                                           required id="pages" placeholder="Number of pages">
                                    @error('pages')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="isbn" class="form-label fw-semibold">
                                        <i class="fas fa-barcode me-1 text-muted"></i>ISBN
                                    </label>
                                    <input type="text" name="isbn" class="form-control @error('isbn') is-invalid @enderror" 
                                           required id="isbn" placeholder="ISBN number">
                                    @error('isbn')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="language" class="form-label fw-semibold">
                                        <i class="fas fa-language me-1 text-muted"></i>Language
                                    </label>
                                    <input type="text" name="language" class="form-control @error('language') is-invalid @enderror" 
                                           required id="language" placeholder="e.g., English">
                                    @error('language')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="format" class="form-label fw-semibold">
                                        <i class="fas fa-file me-1 text-muted"></i>Format
                                    </label>
                                    <input type="text" name="format" class="form-control @error('format') is-invalid @enderror" 
                                           required id="format" placeholder="e.g., Hardcover">
                                    @error('format')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- Avl Quantity Section -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h6 class="text-primary fw-semibold mb-3">
                                    <i class="fas fa-quantity me-2"></i>Avl Quantity
                                </h6>
                        </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="avl_qty" class="form-label fw-semibold">
                                        <i class="fas fa-quantity me-1 text-muted"></i>Avl Quantity
                                    </label>
                                    <input type="number" name="avl_qty" class="form-control @error('avl_qty') is-invalid @enderror" 
                                           required id="avl_qty" placeholder="e.g., 10">
                                    @error('avl_qty')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Additional Information Section -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h6 class="text-primary fw-semibold mb-3">
                                    <i class="fas fa-info me-2"></i>Additional Information
                                </h6>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="country_id" class="form-label fw-semibold">
                                        <i class="fas fa-globe me-1 text-muted"></i>Country
                                    </label>
                                    <select name="country_id" class="form-select @error('country_id') is-invalid @enderror" 
                                            required id="country_id">
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('country_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="weight" class="form-label fw-semibold">
                                        <i class="fas fa-weight me-1 text-muted"></i>Weight
                                    </label>
                                    <input type="text" name="weight" class="form-control @error('weight') is-invalid @enderror" 
                                           required id="weight" placeholder="e.g., 500g">
                                    @error('weight')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="tags" class="form-label fw-semibold">
                                        <i class="fas fa-tags me-1 text-muted"></i>Tags
                                    </label>
                                    <input type="text" name="tags" class="form-control @error('tags') is-invalid @enderror" 
                                           required id="tags" placeholder="e.g., fiction, mystery, thriller">
                                    @error('tags')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Image Upload Section -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h6 class="text-primary fw-semibold mb-3">
                                    <i class="fas fa-image me-2"></i>Book Cover Image
                                </h6>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="basic_image_path" class="form-label fw-semibold">
                                        <i class="fas fa-upload me-1 text-muted"></i>Upload Cover Image
                                    </label>
                                    <div class="input-group">
                                        <input type="file" name="basic_image_path" class="form-control @error('basic_image_path') is-invalid @enderror" 
                                               required id="basic_image_path" accept="image/*">
                                        <button class="btn btn-outline-secondary" type="button" onclick="document.getElementById('basic_image_path').click()">
                                            <i class="fas fa-folder-open"></i>
                                        </button>
                                    </div>
                                    <div class="form-text">
                                        <i class="fas fa-info-circle me-1"></i>
                                        Supported formats: JPG, PNG, GIF. Max size: 5MB
                                    </div>
                                    @error('basic_image_path')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="text-center">
                                    <div class="border rounded p-3 bg-light">
                                        <i class="fas fa-image fa-3x text-muted mb-2"></i>
                                        <p class="text-muted mb-0">Preview will appear here</p>
                                    </div>
                                </div>
                            </div>
                        </div>
               
                        
                        <!-- Submit Section -->
                        <div class="row">
                            <div class="col-12">
                                <hr class="my-4">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.books.index') }}" class="btn btn-outline-secondary">
                                        <i class="fas fa-times me-2"></i>Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary px-4" id="create">
                                        <i class="fas fa-save me-2"></i>Create Book
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

<!-- Custom CSS for enhanced styling -->
<style>
.card {
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
}

.card-header {
    border-radius: 12px 12px 0 0 !important;
}

.form-control, .form-select {
    border-radius: 8px;
    border: 1px solid #e1e5e9;
    transition: all 0.3s ease;
}

.form-control:focus, .form-select:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.15);
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
    background: linear-gradient(135deg, #0b5ed7 0%, #0a58ca 100%);
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

.text-primary {
    color: #0d6efd !important;
}

.input-group-text {
    background-color: #f8f9fa;
    border: 1px solid #e1e5e9;
    color: #6c757d;
}

.form-text {
    font-size: 0.875rem;
    color: #6c757d;
}

hr {
    border-color: #e1e5e9;
}

/* Hover effects */
.form-control:hover, .form-select:hover {
    border-color: #adb5bd;
}

/* Animation for form sections */
.row {
    animation: fadeInUp 0.5s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

<!-- JavaScript for enhanced functionality -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Image preview functionality
    const imageInput = document.getElementById('basic_image_path');
    const previewContainer = document.querySelector('.col-md-6 .text-center .border');
    
    imageInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewContainer.innerHTML = `
                    <img src="${e.target.result}" class="img-fluid rounded" style="max-height: 200px;">
                    <p class="text-muted mt-2 mb-0">${file.name}</p>
                `;
            };
            reader.readAsDataURL(file);
        }
    });
    
    // Form validation enhancement
    const form = document.getElementById('bookForm');
    form.addEventListener('submit', function(e) {
        const submitBtn = document.getElementById('create');
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Creating...';
        submitBtn.disabled = true;
    });
    
    // Auto-save draft functionality (optional)
    let autoSaveTimer;
    const inputs = form.querySelectorAll('input, textarea, select');
    inputs.forEach(input => {
        input.addEventListener('input', function() {
            clearTimeout(autoSaveTimer);
            autoSaveTimer = setTimeout(() => {
                // You can implement auto-save functionality here
                console.log('Auto-saving draft...');
            }, 2000);
        });
    });
});
</script>

@endsection