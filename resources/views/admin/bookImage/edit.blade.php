@extends('admin.layout')
@section('title', 'Book Image Management')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-edit me-2"></i>
                        <h4 class="card-title mb-0">Edit Book Image</h4>
                    </div>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.book-images.update', $bookImage->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label for="book_id" class="form-label fw-semibold">
                                        <i class="fas fa-book me-2 text-primary"></i>Select Book
                                    </label>
                                    <select name="book_id" id="book_id" class="form-select form-select-lg shadow-sm">
                                        <option value="">Choose a book...</option>
                                        @foreach($books as $book)
                                            <option value="{{ $book->id }}" {{ $bookImage->book_id == $book->id ? 'selected' : '' }}>
                                                {{ $book->getTranslation('name', 'en') }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label for="image_path" class="form-label fw-semibold">
                                        <i class="fas fa-image me-2 text-primary"></i>Upload Image
                                    </label>
                                    <div class="input-group input-group-lg shadow-sm">
                                        <input type="file" name="image_path" id="image_path" class="form-control" accept="image/*">
                                        <button class="btn btn-outline-secondary" type="button" onclick="document.getElementById('image_path').click()">
                                            <i class="fas fa-upload"></i>
                                        </button>
                                    </div>
                                    <div class="form-text text-muted">
                                        <i class="fas fa-info-circle me-1"></i>
                                        Supported formats: JPG, PNG, GIF. Max size: 5MB
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Current Image Preview -->
                        @if($bookImage->image_path)
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label fw-semibold">
                                        <i class="fas fa-eye me-2 text-primary"></i>Current Image
                                    </label>
                                    <div class="text-center p-3 bg-light rounded border">
                                        <img src="{{ asset($bookImage->image_path) }}" 
                                             alt="Current book image" 
                                             class="img-thumbnail" 
                                             style="max-height: 200px; max-width: 100%;">
                                        <div class="mt-2">
                                            <small class="text-muted">{{ $bookImage->image_path }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Action Buttons -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="d-flex gap-3 justify-content-end">
                                    <a href="{{ route('admin.book-images.index') }}" class="btn btn-outline-secondary btn-lg">
                                        <i class="fas fa-arrow-left me-2"></i>Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fas fa-save me-2"></i>Update Image
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
    overflow: hidden;
}

.card-header {
    border-bottom: none;
    padding: 1.5rem;
}

.form-control, .form-select {
    border-radius: 10px;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
}

.form-control:focus, .form-select:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
}

.btn {
    border-radius: 10px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.form-label {
    color: #495057;
    margin-bottom: 0.5rem;
}

.img-thumbnail {
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.bg-light {
    background-color: #f8f9fa !important;
}

@media (max-width: 768px) {
    .card-body {
        padding: 1.5rem;
    }
    
    .d-flex.gap-3 {
        flex-direction: column;
    }
    
    .btn {
        width: 100%;
        margin-bottom: 0.5rem;
    }
}
</style>
@endsection