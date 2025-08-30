@extends('admin.layout')

@section('title', 'Create Category')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="page-header mb-4">
        <div class="row align-items-center">
            <div class="col">
                <div class="page-title">
                    <h1 class="h3 mb-0">
                        <i class="fas fa-plus-circle text-primary me-2"></i>
                        Create New Category
                    </h1>
                    <p class="text-muted mb-0">Add a new category to organize your books</p>
                </div>
            </div>
            <div class="col-auto">
                <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    Back to Categories
                </a>
            </div>
        </div>
    </div>

    <!-- Form Card -->
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-edit text-primary me-2"></i>
                        Category Information
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.categories.store') }}" method="post" id="categoryForm">
                        @csrf
                        
                        <!-- Arabic Name -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name_ar" class="form-label fw-semibold">
                                        <i class="fas fa-language me-2 text-primary"></i>
                                        Name in Arabic
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-tag text-muted"></i>
                                        </span>
                                        <input 
                                            type="text" 
                                            name="name_ar" 
                                            id="name_ar"
                                            class="form-control border-start-0 @error('name_ar') is-invalid @enderror" 
                                            value="{{ old('name_ar') }}"
                                            placeholder="أدخل اسم الفئة"
                                            required
                                        >
                                    </div>
                                    @error('name_ar')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- English Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name_en" class="form-label fw-semibold">
                                        <i class="fas fa-language me-2 text-primary"></i>
                                        Name in English
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-tag text-muted"></i>
                                        </span>
                                        <input 
                                            type="text" 
                                            name="name_en" 
                                            id="name_en"
                                            class="form-control border-start-0 @error('name_en') is-invalid @enderror" 
                                            value="{{ old('name_en') }}"
                                            placeholder="Enter category name"
                                            required
                                        >
                                    </div>
                                    @error('name_en')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Arabic Description -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description_ar" class="form-label fw-semibold">
                                        <i class="fas fa-align-right me-2 text-primary"></i>
                                        Description in Arabic
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-file-text text-muted"></i>
                                        </span>
                                        <textarea 
                                            name="description_ar" 
                                            id="description_ar"
                                            class="form-control border-start-0 @error('description_ar') is-invalid @enderror" 
                                            rows="3"
                                            placeholder="أدخل وصف الفئة"
                                        >{{ old('description_ar') }}</textarea>
                                    </div>
                                    @error('description_ar')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- English Description -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description_en" class="form-label fw-semibold">
                                        <i class="fas fa-align-left me-2 text-primary"></i>
                                        Description in English
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-file-text text-muted"></i>
                                        </span>
                                        <textarea 
                                            name="description_en" 
                                            id="description_en"
                                            class="form-control border-start-0 @error('description_en') is-invalid @enderror" 
                                            rows="3"
                                            placeholder="Enter category description"
                                        >{{ old('description_en') }}</textarea>
                                    </div>
                                    @error('description_en')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="form-actions border-top pt-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-outline-secondary w-100" onclick="resetForm()">
                                        <i class="fas fa-undo me-2"></i>
                                        Reset Form
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary w-100">
                                        <i class="fas fa-save me-2"></i>
                                        Create Category
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Preview Card -->
    <div class="row justify-content-center mt-4">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-eye text-info me-2"></i>
                        Live Preview
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="preview-item">
                                <h6 class="text-muted mb-2">Arabic Preview</h6>
                                <div class="preview-content p-3 bg-light rounded">
                                    <h5 id="preview-name-ar" class="mb-2">اسم الفئة</h5>
                                    <p id="preview-desc-ar" class="text-muted mb-0">وصف الفئة</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="preview-item">
                                <h6 class="text-muted mb-2">English Preview</h6>
                                <div class="preview-content p-3 bg-light rounded">
                                    <h5 id="preview-name-en" class="mb-2">Category Name</h5>
                                    <p id="preview-desc-en" class="text-muted mb-0">Category description</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.page-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 2rem;
    border-radius: 15px;
    margin-bottom: 2rem;
}

.page-header .text-muted {
    color: rgba(255, 255, 255, 0.8) !important;
}

.card {
    border-radius: 15px;
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1) !important;
}

.card-header {
    border-bottom: 1px solid #e9ecef;
    border-radius: 15px 15px 0 0 !important;
}

.form-label {
    color: #495057;
    margin-bottom: 0.5rem;
}

.input-group-text {
    border-color: #e9ecef;
    background-color: #f8f9fa;
}

.form-control, .form-control:focus {
    border-color: #e9ecef;
    box-shadow: 0 0 0 0.2rem rgba(79, 70, 229, 0.1);
}

.form-control:focus {
    border-color: #4f46e5;
}

.btn {
    border-radius: 10px;
    padding: 0.75rem 1.5rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-primary {
    background: linear-gradient(135deg, #4f46e5 0%, #3730a3 100%);
    border: none;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #3730a3 0%, #1e1b4b 100%);
    transform: translateY(-1px);
}

.btn-outline-secondary {
    border-color: #6c757d;
    color: #6c757d;
}

.btn-outline-secondary:hover {
    background-color: #6c757d;
    border-color: #6c757d;
}

.preview-content {
    border: 1px solid #e9ecef;
    min-height: 80px;
}

.preview-item h6 {
    font-size: 0.875rem;
    font-weight: 600;
}

.invalid-feedback {
    font-size: 0.875rem;
    margin-top: 0.25rem;
}

.form-actions {
    background-color: #f8f9fa;
    margin: 0 -1.5rem -1.5rem -1.5rem;
    padding: 1.5rem;
    border-radius: 0 0 15px 15px;
}

@media (max-width: 768px) {
    .page-header {
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }
    
    .card-body {
        padding: 1.5rem;
    }
    
    .form-actions {
        margin: 0 -1.5rem -1.5rem -1.5rem;
        padding: 1.5rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Live preview functionality
    const nameAr = document.getElementById('name_ar');
    const nameEn = document.getElementById('name_en');
    const descAr = document.getElementById('description_ar');
    const descEn = document.getElementById('description_en');
    
    const previewNameAr = document.getElementById('preview-name-ar');
    const previewNameEn = document.getElementById('preview-name-en');
    const previewDescAr = document.getElementById('preview-desc-ar');
    const previewDescEn = document.getElementById('preview-desc-en');
    
    // Update previews
    function updatePreview() {
        previewNameAr.textContent = nameAr.value || 'اسم الفئة';
        previewNameEn.textContent = nameEn.value || 'Category Name';
        previewDescAr.textContent = descAr.value || 'وصف الفئة';
        previewDescEn.textContent = descEn.value || 'Category description';
    }
    
    // Add event listeners
    [nameAr, nameEn, descAr, descEn].forEach(input => {
        input.addEventListener('input', updatePreview);
    });
    
    // Form validation
    const form = document.getElementById('categoryForm');
    form.addEventListener('submit', function(e) {
        if (!nameAr.value.trim() || !nameEn.value.trim()) {
            e.preventDefault();
            alert('Please fill in both Arabic and English names');
            return false;
        }
    });
});

function resetForm() {
    if (confirm('Are you sure you want to reset the form? All entered data will be lost.')) {
        document.getElementById('categoryForm').reset();
        // Reset previews
        document.getElementById('preview-name-ar').textContent = 'اسم الفئة';
        document.getElementById('preview-name-en').textContent = 'Category Name';
        document.getElementById('preview-desc-ar').textContent = 'وصف الفئة';
        document.getElementById('preview-desc-en').textContent = 'Category description';
    }
}
</script>
@endsection
