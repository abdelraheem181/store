@extends('admin.layout')

@section('title', 'Edit Category')

@section('content')
<div class="container-fluid px-4 py-4">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">
                <i class="fas fa-edit text-primary me-2"></i>
                Edit Category
            </h1>
            <p class="text-muted mb-0">Update category information and translations</p>
        </div>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>
            Back to Categories
        </a>
    </div>

    <!-- Main Form Card -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 text-gray-700">
                <i class="fas fa-info-circle text-info me-2"></i>
                Category Details
            </h5>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('admin.categories.update', $category->id) }}" method="post">
                @csrf
                @method('PUT')
                
                <!-- Arabic Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                <i class="fas fa-language text-primary"></i>
                            </div>
                            <h6 class="mb-0 text-primary fw-bold">Arabic Content</h6>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="name_ar" class="form-label fw-semibold">
                                <i class="fas fa-tag me-2 text-success"></i>
                                Name in Arabic
                            </label>
                            <input type="text" 
                                   name="name_ar" 
                                   id="name_ar"
                                   class="form-control @error('name_ar') is-invalid @enderror" 
                                   value="{{ $category->getTranslation('name', 'ar') }}"
                                   placeholder="أدخل اسم الفئة بالعربية">
                            @error('name_ar')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-triangle me-1"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="description_ar" class="form-label fw-semibold">
                                <i class="fas fa-align-right me-2 text-info"></i>
                                Description in Arabic
                            </label>
                            <input type="text" 
                                   name="description_ar" 
                                   id="description_ar"
                                   class="form-control @error('description_ar') is-invalid @enderror" 
                                   value="{{ $category->getTranslation('description', 'ar') }}"
                                   placeholder="أدخل وصف الفئة بالعربية">
                            @error('description_ar')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-triangle me-1"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- English Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-success bg-opacity-10 rounded-circle p-2 me-3">
                                <i class="fas fa-globe text-success"></i>
                            </div>
                            <h6 class="mb-0 text-success fw-bold">English Content</h6>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="name_en" class="form-label fw-semibold">
                                <i class="fas fa-tag me-2 text-success"></i>
                                Name in English
                            </label>
                            <input type="text" 
                                   name="name_en" 
                                   id="name_en"
                                   class="form-control @error('name_en') is-invalid @enderror" 
                                   value="{{ $category->getTranslation('name', 'en') }}"
                                   placeholder="Enter category name in English">
                            @error('name_en')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-triangle me-1"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="description_en" class="form-label fw-semibold">
                                <i class="fas fa-align-left me-2 text-info"></i>
                                Description in English
                            </label>
                            <input type="text" 
                                   name="description_en" 
                                   id="description_en"
                                   class="form-control @error('description_en') is-invalid @enderror" 
                                   value="{{ $category->getTranslation('description', 'en') }}"
                                   placeholder="Enter category description in English">
                            @error('description_en')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-triangle me-1"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-light px-4">
                        <i class="fas fa-times me-2"></i>
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save me-2"></i>
                        Update Category
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Preview Card -->
    <div class="card shadow-sm border-0 mt-4">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 text-gray-700">
                <i class="fas fa-eye text-warning me-2"></i>
                Preview
            </h5>
        </div>
        <div class="card-body p-4">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="text-primary mb-3">
                        <i class="fas fa-language me-2"></i>
                        Arabic Preview
                    </h6>
                    <div class="border rounded p-3 bg-light">
                        <strong>Name:</strong> <span id="preview-name-ar">{{ $category->getTranslation('name', 'ar') }}</span><br>
                        <strong>Description:</strong> <span id="preview-desc-ar">{{ $category->getTranslation('description', 'ar') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <h6 class="text-success mb-3">
                        <i class="fas fa-globe me-2"></i>
                        English Preview
                    </h6>
                    <div class="border rounded p-3 bg-light">
                        <strong>Name:</strong> <span id="preview-name-en">{{ $category->getTranslation('name', 'en') }}</span><br>
                        <strong>Description:</strong> <span id="preview-desc-en">{{ $category->getTranslation('description', 'en') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Live Preview JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const inputs = ['name_ar', 'name_en', 'description_ar', 'description_en'];
    
    inputs.forEach(inputId => {
        const input = document.getElementById(inputId);
        const previewId = 'preview-' + inputId.replace('_', '-');
        const previewElement = document.getElementById(previewId);
        
        if (input && previewElement) {
            input.addEventListener('input', function() {
                previewElement.textContent = this.value;
            });
        }
    });
});
</script>

<style>
.card {
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
}

.card-header {
    border-bottom: 1px solid #e9ecef;
    border-radius: 12px 12px 0 0 !important;
}

.form-control {
    border-radius: 8px;
    border: 1px solid #d1d3e2;
    padding: 0.75rem 1rem;
    transition: all 0.2s ease-in-out;
}

.form-control:focus {
    border-color: #4e73df;
    box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
}

.btn {
    border-radius: 8px;
    padding: 0.75rem 1.5rem;
    font-weight: 500;
    transition: all 0.2s ease-in-out;
}

.btn-primary {
    background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
    border: none;
}

.btn-primary:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(78, 115, 223, 0.4);
}

.bg-opacity-10 {
    background-color: rgba(0,0,0,0.1) !important;
}

.text-gray-800 {
    color: #5a5c69 !important;
}

.text-gray-700 {
    color: #6c757d !important;
}

.text-muted {
    color: #858796 !important;
}
</style>

@endsection

