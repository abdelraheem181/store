@extends('admin.layout')
@section('title', 'Book Image Management')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="card-title mb-0">
                            <i class="fas fa-images me-2"></i>
                            Book Images Management
                        </h4>
                        <small class="text-white-50">Manage and organize book cover images</small>
                    </div>
                    <a href="{{ route('admin.book-images.create') }}" class="btn btn-light">
                        <i class="fas fa-plus me-2"></i>
                        Add New Image
                    </a>
                </div>  
                <div class="card-body p-0">
                    @if($bookImages->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="border-0 ps-4">
                                            <i class="fas fa-book me-2 text-primary"></i>
                                            Book Title
                                        </th>
                                        <th class="border-0">
                                            <i class="fas fa-image me-2 text-primary"></i>
                                            Image Preview
                                        </th>
                                        <th class="border-0">
                                            <i class="fas fa-cog me-2 text-primary"></i>
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bookImages as $bookImage)
                                        <tr class="align-middle">
                                            <td class="ps-4">
                                                <div class="d-flex align-items-center">
                                                    <div class="book-info">
                                                        <h6 class="mb-1 fw-semibold text-dark">
                                                            {{ $bookImage->book->getTranslation('name', 'en') }}
                                                        </h6>
                                                        <small class="text-muted">
                                                            <i class="fas fa-user me-1"></i>
                                                            {{ $bookImage->book->author->name ?? 'Unknown Author' }}
                                                        </small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="image-preview-container">
                                                    @if($bookImage->image_path)
                                                        <img src="{{ asset($bookImage->image_path) }}" 
                                                             alt="Book Cover" 
                                                             class="img-thumbnail book-cover-preview"
                                                             onerror="this.src='{{ asset('img/book/01.png') }}'">
                                                    @else
                                                        <div class="no-image-placeholder">
                                                            <i class="fas fa-image text-muted"></i>
                                                            <small class="d-block text-muted">No Image</small>
                                                        </div>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.book-images.edit', $bookImage->id) }}" 
                                                       class="btn btn-outline-primary btn-sm" 
                                                       title="Edit Image">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    
                                                    <a href="{{ route('admin.book-images.destroy', $bookImage->id) }}" 
                                                       class="btn btn-outline-danger btn-sm" 
                                                       title="Delete Image"
                                                       onclick="return confirm('Are you sure you want to delete this image?')">
                                                        <i class="fas fa-trash"></i>
                                                    </a>

                                                    
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <div class="empty-state">
                                <i class="fas fa-images fa-3x text-muted mb-3"></i>
                                <h5 class="text-muted">No Book Images Found</h5>
                                <p class="text-muted mb-3">Start by adding your first book image to get started.</p>
                                <a href="{{ route('admin.book-images.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus me-2"></i>
                                    Add First Image
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
                @if($bookImages->count() > 0)
                    <div class="card-footer bg-light">
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="fas fa-info-circle me-1"></i>
                                Showing {{ $bookImages->count() }} book image(s)
                            </small>
                            <small class="text-muted">
                                <i class="fas fa-clock me-1"></i>
                                Last updated: {{ now()->format('M d, Y H:i') }}
                            </small>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
.card {
    border-radius: 12px;
    overflow: hidden;
}

.card-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
    border: none;
}

.book-cover-preview {
    width: 80px;
    height: 100px;
    object-fit: cover;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    transition: transform 0.2s ease;
}

.book-cover-preview:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 16px rgba(0,0,0,0.15);
}

.image-preview-container {
    display: flex;
    align-items: center;
    justify-content: center;
}

.no-image-placeholder {
    width: 80px;
    height: 100px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background: #f8f9fa;
    border: 2px dashed #dee2e6;
    border-radius: 8px;
    color: #6c757d;
}

.table th {
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.85rem;
    letter-spacing: 0.5px;
    border: none;
    padding: 1rem 0.75rem;
}

.table td {
    padding: 1rem 0.75rem;
    vertical-align: middle;
    border: none;
    border-bottom: 1px solid #f1f3f4;
}

.table tbody tr:hover {
    background-color: #f8f9fa;
    transform: translateY(-1px);
    transition: all 0.2s ease;
}

.btn-group .btn {
    border-radius: 6px;
    margin: 0 2px;
    transition: all 0.2s ease;
}

.btn-group .btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 2px 8px rgba(0,0,0,0.15);
}

.empty-state {
    padding: 2rem;
}

.empty-state i {
    opacity: 0.5;
}

.book-info h6 {
    color: #2c3e50;
    font-weight: 600;
}

.book-info small {
    font-size: 0.8rem;
}

.card-footer {
    border-top: 1px solid #e9ecef;
    padding: 1rem 1.5rem;
}

@media (max-width: 768px) {
    .card-header {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
    }
    
    .btn-group {
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .book-cover-preview {
        width: 60px;
        height: 75px;
    }
    
    .no-image-placeholder {
        width: 60px;
        height: 75px;
    }
}
</style>
@endsection
