@extends('admin.layout')

@section('title', 'Edit Author')

@section('content')
<div class="container-fluid px-4 py-4">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="h3 mb-0 text-dark fw-bold">
                        <i class="fas fa-user-edit text-primary me-2"></i>
                        Edit Author
                    </h2>
                    <p class="text-muted mb-0">Update author information and details</p>
                </div>
                <div>
                    <a href="{{ route('admin.authors.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>
                        Back to Authors
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom">
                    <h5 class="card-title mb-0 text-primary fw-semibold">
                        <i class="fas fa-edit me-2"></i>
                        Author Information
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.authors.update', $author->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <!-- Name Section -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h6 class="text-dark fw-semibold mb-3 border-bottom pb-2">
                                    <i class="fas fa-user me-2 text-primary"></i>
                                    Basic Information
                                </h6>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="name_ar" class="form-label fw-medium text-dark">
                                    <i class="fas fa-language me-1 text-success"></i>
                                    Name in Arabic
                                </label>
                                <input type="text" name="name_ar" id="name_ar" 
                                       class="form-control form-control-lg @error('name_ar') is-invalid @enderror" 
                                       value="{{ $author->getTranslation('name', 'ar') }}"
                                       placeholder="Enter author name in Arabic">
                                @error('name_ar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="name_en" class="form-label fw-medium text-dark">
                                    <i class="fas fa-language me-1 text-info"></i>
                                    Name in English
                                </label>
                                <input type="text" name="name_en" id="name_en" 
                                       class="form-control form-control-lg @error('name_en') is-invalid @enderror" 
                                       value="{{ $author->getTranslation('name', 'en') }}"
                                       placeholder="Enter author name in English">
                                @error('name_en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Description Section -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h6 class="text-dark fw-semibold mb-3 border-bottom pb-2">
                                    <i class="fas fa-align-left me-2 text-primary"></i>
                                    Description
                                </h6>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="description_ar" class="form-label fw-medium text-dark">
                                    <i class="fas fa-language me-1 text-success"></i>
                                    Description in Arabic
                                </label>
                                <textarea name="description_ar" id="description_ar" rows="4"
                                          class="form-control @error('description_ar') is-invalid @enderror" 
                                          placeholder="Enter author description in Arabic">{{ $author->getTranslation('description', 'ar') }}</textarea>
                                @error('description_ar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="description_en" class="form-label fw-medium text-dark">
                                    <i class="fas fa-language me-1 text-info"></i>
                                    Description in English
                                </label>
                                <textarea name="description_en" id="description_en" rows="4"
                                          class="form-control @error('description_en') is-invalid @enderror" 
                                          placeholder="Enter author description in English">{{ $author->getTranslation('description', 'en') }}</textarea>
                                @error('description_en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Contact Information -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h6 class="text-dark fw-semibold mb-3 border-bottom pb-2">
                                    <i class="fas fa-address-book me-2 text-primary"></i>
                                    Contact Information
                                </h6>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label fw-medium text-dark">
                                    <i class="fas fa-envelope me-1 text-warning"></i>
                                    Email Address
                                </label>
                                <input type="email" name="email" id="email" 
                                       class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                       value="{{ $author->email }}"
                                       placeholder="Enter email address">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label fw-medium text-dark">
                                    <i class="fas fa-phone me-1 text-success"></i>
                                    Phone Number
                                </label>
                                <input type="text" name="phone" id="phone" 
                                       class="form-control form-control-lg @error('phone') is-invalid @enderror" 
                                       value="{{ $author->phone }}"
                                       placeholder="Enter phone number">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Additional Information -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h6 class="text-dark fw-semibold mb-3 border-bottom pb-2">
                                    <i class="fas fa-cog me-2 text-primary"></i>
                                    Additional Information
                                </h6>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="country_id" class="form-label fw-medium text-dark">
                                    <i class="fas fa-globe me-1 text-info"></i>
                                    Country
                                </label>
                                <select name="country_id" id="country_id" 
                                        class="form-select form-select-lg @error('country_id') is-invalid @enderror">
                                    <option value="">Select a country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" {{ $author->country_id == $country->id ? 'selected' : '' }}>
                                            {{ $country->getTranslation('name', 'en') }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="is_active" class="form-label fw-medium text-dark">
                                    <i class="fas fa-toggle-on me-1 text-success"></i>
                                    Status
                                </label>
                                <select name="is_active" id="is_active" 
                                        class="form-select form-select-lg @error('is_active') is-invalid @enderror">
                                    <option value="1" {{ $author->is_active ? 'selected' : '' }}>
                                        <i class="fas fa-check-circle text-success"></i> Active
                                    </option>
                                    <option value="0" {{ !$author->is_active ? 'selected' : '' }}>
                                        <i class="fas fa-times-circle text-danger"></i> Inactive
                                    </option>
                                </select>
                                @error('is_active')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Image Upload -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h6 class="text-dark fw-semibold mb-3 border-bottom pb-2">
                                    <i class="fas fa-image me-2 text-primary"></i>
                                    Author Image
                                </h6>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="image_path" class="form-label fw-medium text-dark">
                                    <i class="fas fa-upload me-1 text-primary"></i>
                                    Upload New Image
                                </label>
                                <input type="file" name="image_path" id="image_path" 
                                       class="form-control @error('image_path') is-invalid @enderror"
                                       accept="image/*">
                                <div class="form-text">Recommended size: 300x300 pixels. Max file size: 2MB</div>
                                @error('image_path')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-medium text-dark">
                                    <i class="fas fa-eye me-1 text-info"></i>
                                    Current Image
                                </label>
                                <div class="text-center">
                                    @if($author->image_path)
                                        <img src="{{ asset('images/authors/' . $author->image_path) }}" 
                                             alt="Author Image" 
                                             class="img-fluid rounded shadow-sm" 
                                             style="max-width: 200px; max-height: 200px;">
                                        <div class="mt-2">
                                            <small class="text-muted">{{ $author->image_path }}</small>
                                        </div>
                                    @else
                                        <div class="bg-light rounded p-4 text-muted">
                                            <i class="fas fa-user fa-3x mb-2"></i>
                                            <p class="mb-0">No image uploaded</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Slug -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h6 class="text-dark fw-semibold mb-3 border-bottom pb-2">
                                    <i class="fas fa-link me-2 text-primary"></i>
                                    SEO Information
                                </h6>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="slug" class="form-label fw-medium text-dark">
                                    <i class="fas fa-tag me-1 text-warning"></i>
                                    URL Slug
                                </label>
                                <input type="text" name="slug" id="slug" 
                                       class="form-control form-control-lg @error('slug') is-invalid @enderror" 
                                       value="{{ $author->slug }}"
                                       placeholder="Enter URL slug">
                                <div class="form-text">This will be used in the URL for the author page</div>
                                @error('slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                                    <a href="{{ route('admin.authors.index') }}" class="btn btn-outline-secondary btn-lg">
                                        <i class="fas fa-times me-2"></i>
                                        Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fas fa-save me-2"></i>
                                        Update Author
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
    border-radius: 15px;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}

.card-header {
    border-radius: 15px 15px 0 0 !important;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
}

.form-control, .form-select {
    border-radius: 10px;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
}

.form-control:focus, .form-select:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
    transform: translateY(-2px);
}

.form-control-lg, .form-select-lg {
    padding: 0.75rem 1rem;
    font-size: 1rem;
}

.btn {
    border-radius: 10px;
    padding: 0.75rem 1.5rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
}

.btn-lg {
    padding: 0.875rem 2rem;
    font-size: 1.1rem;
}

.border-bottom {
    border-bottom: 2px solid #e9ecef !important;
}

.text-primary {
    color: #0d6efd !important;
}

.text-success {
    color: #198754 !important;
}

.text-info {
    color: #0dcaf0 !important;
}

.text-warning {
    color: #ffc107 !important;
}

.text-danger {
    color: #dc3545 !important;
}

.shadow-sm {
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
}

.rounded {
    border-radius: 0.5rem !important;
}

.fw-semibold {
    font-weight: 600 !important;
}

.fw-medium {
    font-weight: 500 !important;
}
</style>

@endsection