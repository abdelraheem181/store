@extends('admin.layout')
@section('title', 'Edit About')
@section('content')
<div class="container-fluid">
    <!-- Breadcrumb -->
    <div class="row mb-4">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none"><i class="fas fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.abouts.index') }}" class="text-decoration-none">About Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit About</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1 fw-bold text-dark">Edit About Page</h2>
                    <p class="text-muted mb-0">Update the about page content and information</p>
                </div>
                <div>
                    <a href="{{ route('admin.abouts.index') }}" class="btn btn-outline-secondary me-2">
                        <i class="fas fa-arrow-left me-2"></i>Back to List
                    </a>

                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom">
                    <h5 class="card-title mb-0 fw-semibold text-dark">
                        <i class="fas fa-edit me-2 text-primary"></i>Edit About Information
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.abouts.update', $about->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <!-- Title Field -->
                        <div class="mb-4">
                            <label for="title_ar" class="form-label fw-semibold text-dark">
                                <i class="fas fa-heading me-2 text-primary"></i>Page Title (Arabic)
                            </label>
                            <input type="text" 
                                   name="title_ar" 
                                   id="title_ar"
                                   class="form-control form-control-lg @error('title_ar') is-invalid @enderror" 
                                   value="{{ old('title_ar', $about->getTranslation('title', 'ar')) }}"
                                   placeholder="Enter page title..."
                                   required>
                            @error('title_ar')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                            <div class="form-text">
                                <i class="fas fa-info-circle me-1"></i>This will be the main heading of your about page
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="title_en" class="form-label fw-semibold text-dark">
                                <i class="fas fa-heading me-2 text-primary"></i>Page Title (English)
                            </label>
                            <input type="text" 
                                   name="title_en" 
                                   id="title_en"
                                   class="form-control form-control-lg @error('title_en') is-invalid @enderror" 
                                   value="{{ old('title_en', $about->getTranslation('title', 'en')) }}"
                                   placeholder="Enter page title..."
                                   required>
                            @error('title_en')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                            <div class="form-text">
                                <i class="fas fa-info-circle me-1"></i>This will be the main heading of your about page
                            </div>
                        </div>

                        <!-- Content Field -->
                        <div class="mb-4">
                            <label for="content_ar" class="form-label fw-semibold text-dark">
                                <i class="fas fa-align-left me-2 text-primary"></i>Page Content (Arabic)
                            </label>
                            <textarea name="content_ar" 
                                      id="content_ar"
                                      class="form-control @error('content_ar') is-invalid @enderror" 
                                      rows="12"
                                      placeholder="Enter detailed content for the about page..."
                                      required>{{ old('content_ar', $about->getTranslation('content', 'ar')) }}</textarea>
                            @error('content_ar')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                            <div class="form-text">
                                <i class="fas fa-info-circle me-1"></i>You can use HTML tags for formatting. Recommended: 500-2000 characters
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="content_en" class="form-label fw-semibold text-dark">
                                <i class="fas fa-align-left me-2 text-primary"></i>Page Content (English)
                            </label>
                            <textarea name="content_en" 
                                      id="content_en"
                                      class="form-control @error('content_en') is-invalid @enderror" 
                                      rows="12"
                                      placeholder="Enter detailed content for the about page..."
                                      required>{{ old('content_en', $about->getTranslation('content', 'en')) }}</textarea>
                            @error('content_en')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                            <div class="form-text">
                                <i class="fas fa-info-circle me-1"></i>You can use HTML tags for formatting. Recommended: 500-2000 characters
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex gap-3 pt-3 border-top">
                            <button type="submit" class="btn btn-primary btn-lg px-4">
                                <i class="fas fa-save me-2"></i>Update About Page
                            </button>
                            <a href="{{ route('admin.abouts.index') }}" class="btn btn-outline-secondary btn-lg px-4">
                                <i class="fas fa-times me-2"></i>Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Quick Stats -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white border-bottom">
                    <h6 class="card-title mb-0 fw-semibold text-dark">
                        <i class="fas fa-chart-bar me-2 text-primary"></i>Quick Stats
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-6">
                            <div class="p-3">
                                <div class="h4 mb-1 text-primary fw-bold">{{ strlen($about->title) }}</div>
                                <small class="text-muted">Title Length</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-3">
                                <div class="h4 mb-1 text-success fw-bold">{{ strlen($about->content) }}</div>
                                <small class="text-muted">Content Length</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page Info -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white border-bottom">
                    <h6 class="card-title mb-0 fw-semibold text-dark">
                        <i class="fas fa-info-circle me-2 text-primary"></i>Page Information
                    </h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label small text-muted">Created</label>
                        <div class="fw-semibold">{{ $about->created_at->format('M d, Y \a\t g:i A') }}</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small text-muted">Last Updated</label>
                        <div class="fw-semibold">{{ $about->updated_at->format('M d, Y \a\t g:i A') }}</div>
                    </div>
                    <div>
                        <label class="form-label small text-muted">Page ID</label>
                        <div class="fw-semibold text-muted">#{{ $about->id }}</div>
                    </div>
                </div>
            </div>

            <!-- Tips -->
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom">
                    <h6 class="card-title mb-0 fw-semibold text-dark">
                        <i class="fas fa-lightbulb me-2 text-warning"></i>Writing Tips
                    </h6>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            Keep title concise and engaging
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            Use clear, professional language
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            Include your company's story and values
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            Add contact information if relevant
                        </li>
                        <li>
                            <i class="fas fa-check-circle text-success me-2"></i>
                            Use paragraphs for better readability
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.breadcrumb {
    background: transparent;
    padding: 0;
    margin: 0;
}

.breadcrumb-item a {
    color: var(--primary-color);
    transition: color 0.3s ease;
}

.breadcrumb-item a:hover {
    color: var(--primary-dark);
}

.breadcrumb-item.active {
    color: var(--text-secondary);
}

.card {
    border-radius: 12px;
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1) !important;
}

.form-control {
    border-radius: 8px;
    border: 2px solid #e2e8f0;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(79, 70, 229, 0.25);
}

.form-control-lg {
    font-size: 1.1rem;
}

.btn {
    border-radius: 8px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-lg {
    padding: 0.75rem 1.5rem;
}

.btn-primary {
    background: var(--primary-color);
    border-color: var(--primary-color);
}

.btn-primary:hover {
    background: var(--primary-dark);
    border-color: var(--primary-dark);
    transform: translateY(-1px);
}

.btn-outline-secondary:hover {
    transform: translateY(-1px);
}

.card-header {
    border-radius: 12px 12px 0 0 !important;
}

.list-unstyled li {
    padding: 0.5rem 0;
    border-bottom: 1px solid #f1f5f9;
}

.list-unstyled li:last-child {
    border-bottom: none;
}
</style>
@endsection
