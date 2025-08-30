@extends('admin.layout')

@section('title', 'Edit Country')

@section('content')
<div class="container-fluid">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none"><i class="fas fa-home me-2"></i>Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.countries.index') }}" class="text-decoration-none"><i class="fas fa-globe me-2"></i>Countries</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Country</li>
        </ol>
    </nav>

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">
                <i class="fas fa-edit text-primary me-2"></i>Edit Country
            </h1>
            <p class="text-muted mb-0">Update country information and settings</p>
        </div>
        <a href="{{ route('admin.countries.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Countries
        </a>
    </div>

    <!-- Edit Form Card -->
    <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <h5 class="card-title mb-0 text-primary">
                        <i class="fas fa-globe-americas me-2"></i>Country Details
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.countries.update', $country->id) }}" method="post">
                        @csrf
                        @method('put')
                        
                        <!-- Name in Arabic -->
                        <div class="mb-4">
                            <label for="name_ar" class="form-label fw-semibold">
                                <i class="fas fa-language me-2 text-primary"></i>Name in Arabic
                            </label>
                            <input type="text" 
                                   name="name_ar" 
                                   id="name_ar"
                                   class="form-control form-control-lg @error('name_ar') is-invalid @enderror" 
                                   value="{{ old('name_ar', $country->name_ar) }}"
                                   placeholder="Enter country name in Arabic"
                                   dir="rtl">
                            @error('name_ar')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Name in English -->
                        <div class="mb-4">
                            <label for="name_en" class="form-label fw-semibold">
                                <i class="fas fa-language me-2 text-primary"></i>Name in English
                            </label>
                            <input type="text" 
                                   name="name_en" 
                                   id="name_en"
                                   class="form-control form-control-lg @error('name_en') is-invalid @enderror" 
                                   value="{{ old('name_en', $country->name_en) }}"
                                   placeholder="Enter country name in English">
                            @error('name_en')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Country Code -->
                        <div class="mb-4">
                            <label for="code" class="form-label fw-semibold">
                                <i class="fas fa-code me-2 text-primary"></i>Country Code
                            </label>
                            <input type="text" 
                                   name="code" 
                                   id="code"
                                   class="form-control form-control-lg @error('code') is-invalid @enderror" 
                                   value="{{ old('code', $country->code) }}"
                                   placeholder="e.g., US, GB, FR"
                                   maxlength="3">
                            <div class="form-text">
                                <i class="fas fa-info-circle me-1"></i>Enter the ISO 3166-1 alpha-2 or alpha-3 country code
                            </div>
                            @error('code')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Currency -->
                        <div class="mb-4">
                            <label for="currency" class="form-label fw-semibold">
                                <i class="fas fa-coins me-2 text-primary"></i>Currency
                            </label>
                            <input type="text" 
                                   name="currency" 
                                   id="currency"
                                   class="form-control form-control-lg @error('currency') is-invalid @enderror" 
                                   value="{{ old('currency', $country->currency) }}"
                                   placeholder="e.g., USD, EUR, GBP"
                                   maxlength="3">
                            <div class="form-text">
                                <i class="fas fa-info-circle me-1"></i>Enter the ISO 4217 currency code
                            </div>
                            @error('currency')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex gap-3 pt-3">
                            <button type="submit" class="btn btn-primary btn-lg flex-fill">
                                <i class="fas fa-save me-2"></i>Update Country
                            </button>
                            <a href="{{ route('admin.countries.index') }}" class="btn btn-outline-secondary btn-lg">
                                <i class="fas fa-times me-2"></i>Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Additional Info Card -->
            <div class="card shadow-sm border-0 mt-4">
                <div class="card-header bg-light py-3">
                    <h6 class="card-title mb-0 text-muted">
                        <i class="fas fa-info-circle me-2"></i>Information
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-6">
                            <div class="p-3">
                                <i class="fas fa-calendar-alt text-primary fa-2x mb-2"></i>
                                <p class="mb-1 fw-semibold">Created</p>
                                <small class="text-muted">{{ $country->created_at ? $country->created_at->format('M d, Y') : 'N/A' }}</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-3">
                                <i class="fas fa-clock text-success fa-2x mb-2"></i>
                                <p class="mb-1 fw-semibold">Last Updated</p>
                                <small class="text-muted">{{ $country->updated_at ? $country->updated_at->format('M d, Y') : 'N/A' }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    border-radius: 12px;
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1) !important;
}

.card-header {
    border-bottom: 1px solid #e9ecef;
    border-radius: 12px 12px 0 0 !important;
}

.form-control {
    border-radius: 8px;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(79, 70, 229, 0.25);
}

.form-control-lg {
    padding: 0.75rem 1rem;
    font-size: 1rem;
}

.btn {
    border-radius: 8px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-lg {
    padding: 0.75rem 1.5rem;
    font-size: 1rem;
}

.btn-primary {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    border: none;
}

.btn-primary:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 15px rgba(79, 70, 229, 0.4);
}

.breadcrumb-item a {
    color: var(--primary-color);
    transition: color 0.3s ease;
}

.breadcrumb-item a:hover {
    color: var(--primary-dark);
}

.text-primary {
    color: var(--primary-color) !important;
}

.bg-light {
    background-color: #f8f9fa !important;
}
</style>
@endsection