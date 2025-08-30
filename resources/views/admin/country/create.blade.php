@extends('admin.layout')

@section('title', 'Create Country')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-globe-americas me-2"></i>
                        <h4 class="mb-0">Create New Country</h4>
                    </div>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.countries.store') }}" method="post" class="needs-validation" novalidate>
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="name_ar" class="form-label fw-bold">
                                        <i class="fas fa-language me-1 text-primary"></i>
                                        Name in Arabic
                                    </label>
                                    <input type="text" 
                                           name="name_ar" 
                                           id="name_ar"
                                           class="form-control @error('name_ar') is-invalid @enderror" 
                                           value="{{ old('name_ar') }}"
                                           placeholder="أدخل اسم البلد بالعربية"
                                           required>
                                    @error('name_ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="name_en" class="form-label fw-bold">
                                        <i class="fas fa-language me-1 text-primary"></i>
                                        Name in English
                                    </label>
                                    <input type="text" 
                                           name="name_en" 
                                           id="name_en"
                                           class="form-control @error('name_en') is-invalid @enderror" 
                                           value="{{ old('name_en') }}"
                                           placeholder="Enter country name in English"
                                           required>
                                    @error('name_en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="code" class="form-label fw-bold">
                                        <i class="fas fa-code me-1 text-primary"></i>
                                        Country Code
                                    </label>
                                    <input type="text" 
                                           name="code" 
                                           id="code"
                                           class="form-control @error('code') is-invalid @enderror" 
                                           value="{{ old('code') }}"
                                           placeholder="e.g., US, GB, FR"
                                           maxlength="3"
                                           required>
                                    <div class="form-text">Enter the 2-3 letter ISO country code</div>
                                    @error('code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="currency" class="form-label fw-bold">
                                        <i class="fas fa-coins me-1 text-primary"></i>
                                        Currency
                                    </label>
                                    <input type="text" 
                                           name="currency" 
                                           id="currency"
                                           class="form-control @error('currency') is-invalid @enderror" 
                                           value="{{ old('currency') }}"
                                           placeholder="e.g., USD, EUR, GBP"
                                           maxlength="3"
                                           required>
                                    <div class="form-text">Enter the 3-letter currency code</div>
                                    @error('currency')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="{{ route('admin.countries.index') }}" class="btn btn-outline-secondary">
                                        <i class="fas fa-arrow-left me-1"></i>
                                        Back to Countries
                                    </a>
                                    <button type="submit" class="btn btn-primary btn-lg px-4">
                                        <i class="fas fa-save me-1"></i>
                                        Create Country
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
.card {
    border: none;
    border-radius: 15px;
    overflow: hidden;
}

.card-header {
    border-bottom: none;
    padding: 1.5rem;
}

.form-control {
    border-radius: 8px;
    border: 2px solid #e9ecef;
    padding: 12px 16px;
    font-size: 14px;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
    transform: translateY(-1px);
}

.form-label {
    color: #495057;
    margin-bottom: 8px;
}

.btn {
    border-radius: 8px;
    padding: 12px 24px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.btn-primary {
    background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
    border: none;
}

.btn-outline-secondary {
    border: 2px solid #6c757d;
}

.form-text {
    font-size: 12px;
    color: #6c757d;
    margin-top: 4px;
}

.invalid-feedback {
    font-size: 13px;
    margin-top: 4px;
}

.fas {
    width: 16px;
}
</style>

<script>
// Form validation
(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

// Auto-format country code and currency to uppercase
document.getElementById('code').addEventListener('input', function() {
    this.value = this.value.toUpperCase();
});

document.getElementById('currency').addEventListener('input', function() {
    this.value = this.value.toUpperCase();
});
</script>
@endsection
