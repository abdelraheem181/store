@extends('admin.layout')

@section('title', 'Create Author')

@section('content')

<div class="container-fluid px-4 py-4">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-8">
            <!-- Page Header -->
            <div class="d-flex align-items-center mb-4">
                <div class="me-3">
                    <div class="bg-primary bg-gradient rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <i class="fas fa-user-plus text-white fs-4"></i>
                    </div>
                </div>
                <div>
                    <h4 class="mb-1 fw-bold text-dark">Create New Author</h4>
                    <p class="text-muted mb-0">Add a new author to your platform</p>
                </div>
            </div>

            <!-- Main Card -->
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="card-title mb-0 fw-semibold text-dark">
                        <i class="fas fa-edit me-2 text-primary"></i>
                        Author Information
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.authors.store') }}" method="post" enctype="multipart/form-data" id="authorForm">
                        @csrf
                        
                        <!-- Personal Information Section -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h6 class="text-primary fw-semibold mb-3">
                                    <i class="fas fa-user me-2"></i>Personal Information
                                </h6>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="name_ar" class="form-label fw-medium">
                                    <i class="fas fa-language me-1 text-info"></i>Name in Arabic
                                </label>
                                <input type="text" name="name_ar" id="name_ar" class="form-control form-control-lg @error('name_ar') is-invalid @enderror" 
                                       placeholder="Enter name in Arabic" value="{{ old('name_ar') }}">
                                @error('name_ar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="name_en" class="form-label fw-medium">
                                    <i class="fas fa-language me-1 text-info"></i>Name in English
                                </label>
                                <input type="text" name="name_en" id="name_en" class="form-control form-control-lg @error('name_en') is-invalid @enderror" 
                                       placeholder="Enter name in English" value="{{ old('name_en') }}">
                                @error('name_en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
                                <label for="description_ar" class="form-label fw-medium">
                                    <i class="fas fa-language me-1 text-info"></i>Description in Arabic
                                </label>
                                <textarea name="description_ar" id="description_ar" class="form-control @error('description_ar') is-invalid @enderror" 
                                          rows="4" placeholder="Enter description in Arabic">{{ old('description_ar') }}</textarea>
                                @error('description_ar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="description_en" class="form-label fw-medium">
                                    <i class="fas fa-language me-1 text-info"></i>Description in English
                                </label>
                                <textarea name="description_en" id="description_en" class="form-control @error('description_en') is-invalid @enderror" 
                                          rows="4" placeholder="Enter description in English">{{ old('description_en') }}</textarea>
                                @error('description_en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Contact Information Section -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h6 class="text-primary fw-semibold mb-3">
                                    <i class="fas fa-address-book me-2"></i>Contact Information
                                </h6>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label fw-medium">
                                    <i class="fas fa-envelope me-1 text-success"></i>Email Address
                                </label>
                                <input type="email" name="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                       placeholder="author@example.com" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label fw-medium">
                                    <i class="fas fa-phone me-1 text-success"></i>Phone Number
                                </label>
                                <input type="text" name="phone" id="phone" class="form-control form-control-lg @error('phone') is-invalid @enderror" 
                                       placeholder="+1234567890" value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Additional Details Section -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h6 class="text-primary fw-semibold mb-3">
                                    <i class="fas fa-cog me-2"></i>Additional Details
                                </h6>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="country_id" class="form-label fw-medium">
                                    <i class="fas fa-globe me-1 text-warning"></i>Country
                                </label>
                                <select name="country_id" id="country_id" class="form-select form-select-lg @error('country_id') is-invalid @enderror">
                                    <option value="">Select a country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                            {{ $country->getTranslation('name', 'en') }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="is_active" class="form-label fw-medium">
                                    <i class="fas fa-toggle-on me-1 text-info"></i>Status
                                </label>
                                <select name="is_active" id="is_active" class="form-select form-select-lg @error('is_active') is-invalid @enderror">
                                    <option value="1" {{ old('is_active', '1') == '1' ? 'selected' : '' }}>
                                        <i class="fas fa-check-circle text-success"></i> Active
                                    </option>
                                    <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>
                                        <i class="fas fa-times-circle text-danger"></i> Inactive
                                    </option>
                                </select>
                                @error('is_active')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Media & SEO Section -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h6 class="text-primary fw-semibold mb-3">
                                    <i class="fas fa-image me-2"></i>Media & SEO
                                </h6>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="image_path" class="form-label fw-medium">
                                    <i class="fas fa-camera me-1 text-warning"></i>Profile Image
                                </label>
                                <div class="input-group">
                                    <input type="file" name="image_path" id="image_path" class="form-control @error('image_path') is-invalid @enderror" 
                                           accept="image/*">
                                    <button class="btn btn-outline-secondary" type="button" onclick="document.getElementById('image_path').click()">
                                        <i class="fas fa-upload"></i>
                                    </button>
                                </div>
                                <small class="form-text text-muted">Recommended size: 400x400px, Max: 2MB</small>
                                @error('image_path')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="slug" class="form-label fw-medium">
                                    <i class="fas fa-link me-1 text-secondary"></i>URL Slug
                                </label>
                                <input type="text" name="slug" id="slug" class="form-control form-control-lg @error('slug') is-invalid @enderror" 
                                       placeholder="author-name" value="{{ old('slug') }}">
                                <small class="form-text text-muted">Leave empty to auto-generate from name</small>
                                @error('slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="row mt-5">
                            <div class="col-12">
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="{{ route('admin.authors.index') }}" class="btn btn-outline-secondary btn-lg">
                                        <i class="fas fa-arrow-left me-2"></i>Back to Authors
                                    </a>
                                    <div>
                                        <button type="reset" class="btn btn-outline-warning btn-lg me-2">
                                            <i class="fas fa-undo me-2"></i>Reset Form
                                        </button>
                                        <button type="submit" class="btn btn-primary btn-lg">
                                            <i class="fas fa-save me-2"></i>Create Author
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Auto-generate slug from name -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const nameEnInput = document.getElementById('name_en');
    const slugInput = document.getElementById('slug');
    
    nameEnInput.addEventListener('input', function() {
        if (slugInput.value === '') {
            const slug = this.value
                .toLowerCase()
                .replace(/[^a-z0-9 -]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .trim('-');
            slugInput.value = slug;
        }
    });
});
</script>

@endsection       

    