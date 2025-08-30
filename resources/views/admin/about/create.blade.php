@extends('admin.layout')
@section('title', 'Create About')
@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="page-header">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="header-content">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.dashboard') }}" class="text-decoration-none">
                                        <i class="fas fa-home me-1"></i>Dashboard
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.abouts.index') }}" class="text-decoration-none">About</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Create</li>
                            </ol>
                        </nav>
                        <h1 class="page-title">
                            <i class="fas fa-plus-circle me-2 text-primary"></i>
                            Create About Section
                        </h1>
                        <p class="page-subtitle text-muted">Add a new about section to your website</p>
                    </div>
                    <div class="header-actions">
                        <a href="{{ route('admin.abouts.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="card-icon me-3">
                            <i class="fas fa-edit text-primary"></i>
                        </div>
                        <div>
                            <h5 class="card-title mb-0">About Information</h5>
                            <small class="text-muted">Fill in the details below to create a new about section</small>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.abouts.store') }}" method="POST" id="createAboutForm">
                        @csrf
                        <!-- Title Field -->
                        <div class="form-group mb-4">
                            <label for="title_ar" class="form-label fw-semibold">
                                <i class="fas fa-heading me-2 text-primary"></i>Title (Arabic)
                                <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                name="title_ar" 
                                id="title_ar"
                                class="form-control form-control-lg @error('title_ar') is-invalid @enderror" 
                                placeholder="Enter about section title..."
                                value="{{ old('title_ar') }}"
                                required
                            >
                            @error('title_ar')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                            <div class="form-text">
                                <i class="fas fa-info-circle me-1"></i>
                                This will be the main heading for your about section in Arabic
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="title_en" class="form-label fw-semibold">
                                <i class="fas fa-heading me-2 text-primary"></i>Title (English)
                                <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                name="title_en" 
                                id="title_en"
                                class="form-control form-control-lg @error('title_en') is-invalid @enderror" 
                                placeholder="Enter about section title..."
                                value="{{ old('title_en') }}"
                                required
                            >
                            @error('title_en')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                            <div class="form-text">
                                <i class="fas fa-info-circle me-1"></i>
                                This will be the main heading for your about section in English
                            </div>
                        </div>
                        <div class="form-group mb-4">

                        <!-- Content Field -->
                        <div class="form-group mb-4">
                            <label for="content" class="form-label fw-semibold">
                                <i class="fas fa-align-left me-2 text-primary"></i>Content (Arabic)
                                <span class="text-danger">*</span>
                            </label>
                            <textarea 
                                name="content_ar" 
                                id="content_ar"
                                class="form-control @error('content_ar') is-invalid @enderror" 
                                rows="8"
                                placeholder="Write your about content here..."
                                required
                            >{{ old('content_ar') }}</textarea>
                            @error('content_ar')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                            <div class="form-text">
                                <i class="fas fa-info-circle me-1"></i>
                                Provide detailed information about your company, mission, or story in Arabic
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="content_en" class="form-label fw-semibold">
                                <i class="fas fa-align-left me-2 text-primary"></i>Content (English)
                                <span class="text-danger">*</span>
                            </label>
                            <textarea 
                                name="content_en" 
                                id="content_en"
                                class="form-control @error('content_en') is-invalid @enderror" 
                                rows="8"
                                placeholder="Write your about content here..."
                                required
                            >{{ old('content_en') }}</textarea> 
                        @error('content_en')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                            <div class="form-text">
                                <i class="fas fa-info-circle me-1"></i>
                                Provide detailed information about your company, mission, or story in English
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="form-actions">
                            <hr class="my-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="publishNow" checked>
                                    <label class="form-check-label" for="publishNow">
                                        <i class="fas fa-globe me-1"></i>Publish immediately
                                    </label>
                                </div>
                                <div class="action-buttons">
                                    <button type="button" class="btn btn-outline-secondary me-2" onclick="resetForm()">
                                        <i class="fas fa-undo me-2"></i>Reset
                                    </button>
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fas fa-save me-2"></i>Create About Section
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Preview Section -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="card-icon me-3">
                            <i class="fas fa-eye text-info"></i>
                        </div>
                        <div>
                            <h5 class="card-title mb-0">Live Preview</h5>
                            <small class="text-muted">See how your about section will look</small>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div id="previewContent" class="preview-container">
                        <div class="text-center text-muted py-5">
                            <i class="fas fa-eye-slash fa-3x mb-3"></i>
                            <p>Start typing in the form above to see a live preview</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Page Header Styles */
.page-header {
    background: white;
    padding: 2rem;
    border-radius: 12px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    margin-bottom: 2rem;
}

.page-title {
    font-size: 2rem;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0.5rem 0 0.25rem 0;
}

.page-subtitle {
    font-size: 1rem;
    margin: 0;
}

/* Card Styles */
.card {
    border-radius: 12px;
    transition: all 0.3s ease;
}

.card:hover {
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1) !important;
}

.card-header {
    border-radius: 12px 12px 0 0 !important;
    padding: 1.5rem 2rem;
}

.card-icon {
    width: 48px;
    height: 48px;
    background: var(--light-bg);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
}

/* Form Styles */
.form-control {
    border: 2px solid var(--border-color);
    border-radius: 8px;
    padding: 0.75rem 1rem;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(79, 70, 229, 0.1);
}

.form-control-lg {
    padding: 1rem 1.25rem;
    font-size: 1.125rem;
}

.form-label {
    font-size: 1rem;
    margin-bottom: 0.5rem;
    color: var(--text-primary);
}

.form-text {
    font-size: 0.875rem;
    margin-top: 0.5rem;
}

/* Button Styles */
.btn {
    border-radius: 8px;
    font-weight: 500;
    padding: 0.75rem 1.5rem;
    transition: all 0.3s ease;
}

.btn-lg {
    padding: 1rem 2rem;
    font-size: 1.125rem;
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

.btn-outline-secondary {
    border-color: var(--border-color);
    color: var(--text-secondary);
}

.btn-outline-secondary:hover {
    background: var(--light-bg);
    border-color: var(--text-secondary);
    color: var(--text-primary);
}

/* Preview Styles */
.preview-container {
    min-height: 200px;
    border: 2px dashed var(--border-color);
    border-radius: 8px;
    background: var(--light-bg);
}

.preview-content {
    padding: 2rem;
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.preview-title {
    font-size: 2rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 1rem;
    border-bottom: 3px solid var(--primary-color);
    padding-bottom: 0.5rem;
}

.preview-text {
    font-size: 1.1rem;
    line-height: 1.8;
    color: var(--text-secondary);
}

/* Breadcrumb Styles */
.breadcrumb {
    background: transparent;
    padding: 0;
    margin: 0;
}

.breadcrumb-item a {
    color: var(--text-secondary);
    transition: color 0.3s ease;
}

.breadcrumb-item a:hover {
    color: var(--primary-color);
}

.breadcrumb-item.active {
    color: var(--text-primary);
    font-weight: 600;
}

/* Form Actions */
.form-actions {
    background: var(--light-bg);
    margin: 0 -2rem -2rem -2rem;
    padding: 2rem;
    border-radius: 0 0 12px 12px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .page-header {
        padding: 1.5rem;
    }
    
    .page-title {
        font-size: 1.5rem;
    }
    
    .card-header {
        padding: 1rem 1.5rem;
    }
    
    .card-body {
        padding: 1.5rem;
    }
    
    .form-actions {
        margin: 0 -1.5rem -1.5rem -1.5rem;
        padding: 1.5rem;
    }
    
    .action-buttons {
        flex-direction: column;
        gap: 1rem;
    }
    
    .action-buttons .btn {
        width: 100%;
    }
}
</style>

<script>
// Live Preview Functionality
document.addEventListener('DOMContentLoaded', function() {
    const titleInput = document.getElementById('title');
    const contentInput = document.getElementById('content');
    const previewContent = document.getElementById('previewContent');
    
    function updatePreview() {
        const title = titleInput.value.trim();
        const content = contentInput.value.trim();
        
        if (title || content) {
            previewContent.innerHTML = `
                <div class="preview-content">
                    ${title ? `<h2 class="preview-title">${title}</h2>` : ''}
                    ${content ? `<div class="preview-text">${content.replace(/\n/g, '<br>')}</div>` : ''}
                </div>
            `;
        } else {
            previewContent.innerHTML = `
                <div class="text-center text-muted py-5">
                    <i class="fas fa-eye-slash fa-3x mb-3"></i>
                    <p>Start typing in the form above to see a live preview</p>
                </div>
            `;
        }
    }
    
    titleInput.addEventListener('input', updatePreview);
    contentInput.addEventListener('input', updatePreview);
    
    // Form validation
    const form = document.getElementById('createAboutForm');
    form.addEventListener('submit', function(e) {
        const title = titleInput.value.trim();
        const content = contentInput.value.trim();
        
        if (!title || !content) {
            e.preventDefault();
            alert('Please fill in all required fields.');
            return false;
        }
    });
});

// Reset form function
function resetForm() {
    if (confirm('Are you sure you want to reset the form? All entered data will be lost.')) {
        document.getElementById('createAboutForm').reset();
        document.getElementById('previewContent').innerHTML = `
            <div class="text-center text-muted py-5">
                <i class="fas fa-eye-slash fa-3x mb-3"></i>
                <p>Start typing in the form above to see a live preview</p>
            </div>
        `;
    }
}

// Auto-resize textarea
document.addEventListener('DOMContentLoaded', function() {
    const textarea = document.getElementById('content');
    textarea.addEventListener('input', function() {
        this.style.height = 'auto';
        this.style.height = Math.min(this.scrollHeight, 400) + 'px';
    });
});
</script>
@endsection

