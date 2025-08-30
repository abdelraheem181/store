@extends('admin.layout')
@section('title', 'About Management')
@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1 fw-bold text-dark">
                        <i class="fas fa-info-circle text-primary me-2"></i>
                        About Us Management
                    </h2>
                    <p class="text-muted mb-0">Manage your website's about information and company details</p>
                </div>
                <div>
                    <a href="{{ route('admin.abouts.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Add New About
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="bg-primary bg-opacity-10 rounded-circle p-3">
                                <i class="fas fa-file-alt text-primary fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-muted mb-1">Total Sections</h6>
                            <h4 class="mb-0 fw-bold">{{ $about->count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="bg-success bg-opacity-10 rounded-circle p-3">
                                <i class="fas fa-check-circle text-success fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-muted mb-1">Active Content</h6>
                            <h4 class="mb-0 fw-bold">{{ $about->where('content', '!=', '')->count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="bg-warning bg-opacity-10 rounded-circle p-3">
                                <i class="fas fa-clock text-warning fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-muted mb-1">Last Updated</h6>
                            <h6 class="mb-0 fw-bold"></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="bg-info bg-opacity-10 rounded-circle p-3">
                                <i class="fas fa-eye text-info fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-muted mb-1">View on Site</h6>
                            <a href="#" target="_blank" class="btn btn-sm btn-outline-info">
                                <i class="fas fa-external-link-alt me-1"></i>Preview
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About Content Cards -->
    <div class="row">
        @forelse($about as $index => $aboutItem)
        <div class="col-lg-6 col-xl-4 mb-4">
            <div class="card border-0 shadow-sm h-100 about-card">
                <div class="card-header bg-transparent border-0 pt-4 pb-0">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                <i class="fas fa-info-circle text-primary"></i>
                            </div>
                            <div>
                                <h6 class="mb-1 fw-bold text-dark">Section {{ $index + 1 }}</h6>
                                <small class="text-muted">ID: #{{ $aboutItem->id }}</small>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('admin.abouts.edit', $aboutItem->id) }}">
                                    <i class="fas fa-edit me-2"></i>Edit
                                </a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="#" onclick="confirmDelete({{ $aboutItem->id }})">
                                    <i class="fas fa-trash me-2"></i>Delete
                                </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label text-muted small fw-semibold mb-1">Title</label>
                        <h6 class="fw-bold text-dark mb-0">{{ $aboutItem->title ?: 'No title' }}</h6>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-muted small fw-semibold mb-1">Content</label>
                        <div class="content-preview">
                            @if($aboutItem->content)
                                <p class="text-dark mb-0">{{ Str::limit($aboutItem->content, 150) }}</p>
                                @if(strlen($aboutItem->content) > 150)
                                    <button class="btn btn-sm btn-link p-0 mt-1" onclick="toggleContent({{ $aboutItem->id }})">
                                        Read more
                                    </button>
                                    <div id="full-content-{{ $aboutItem->id }}" class="d-none mt-2">
                                        <p class="text-dark">{{ $aboutItem->content }}</p>
                                    </div>
                                @endif
                            @else
                                <p class="text-muted fst-italic mb-0">No content available</p>
                            @endif
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-calendar-alt text-muted me-2"></i>
                            <small class="text-muted">Updated {{ $aboutItem->updated_at->diffForHumans() }}</small>
                        </div>
                        <div class="btn-group" role="group">
                            <a href="{{ route('admin.abouts.edit', $aboutItem->id) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit me-1"></i>Edit
                            </a>
                            <button type="button" class="btn btn-sm btn-outline-danger" onclick="confirmDelete({{ $aboutItem->id }})">
                                <i class="fas fa-trash me-1"></i>Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center py-5">
                    <div class="mb-4">
                        <i class="fas fa-info-circle text-muted" style="font-size: 4rem;"></i>
                    </div>
                    <h5 class="text-muted mb-3">No About Content Found</h5>
                    <p class="text-muted mb-4">Start by adding your first about section to showcase your company information.</p>
                    <a href="{{ route('admin.abouts.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Add First About Section
                    </a>
                </div>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Quick Actions -->
    @if($about->count() > 0)
    <div class="row mt-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="fw-bold mb-3">
                        <i class="fas fa-tools text-primary me-2"></i>Quick Actions
                    </h6>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('admin.abouts.create') }}" class="btn btn-outline-primary">
                            <i class="fas fa-plus me-2"></i>Add New Section
                        </a>
                        <a href="#" target="_blank" class="btn btn-outline-info">
                            <i class="fas fa-eye me-2"></i>View on Website
                        </a>
                        <button class="btn btn-outline-secondary" onclick="exportData()">
                            <i class="fas fa-download me-2"></i>Export Data
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-exclamation-triangle text-warning me-2"></i>Confirm Delete
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this about section? This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.about-card {
    transition: all 0.3s ease;
    border-radius: 12px;
}

.about-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1) !important;
}

.content-preview {
    background: #f8f9fa;
    padding: 1rem;
    border-radius: 8px;
    border-left: 4px solid var(--primary-color);
}

.card-header {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
}

.bg-opacity-10 {
    background-color: rgba(var(--bs-primary-rgb), 0.1) !important;
}

.btn-group .btn {
    border-radius: 6px !important;
}

.btn-group .btn:not(:last-child) {
    margin-right: 0.25rem;
}

.dropdown-menu {
    border: none;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

.dropdown-item:hover {
    background-color: var(--light-bg);
}

.modal-content {
    border: none;
    border-radius: 12px;
}

.modal-header {
    border-bottom: 1px solid var(--border-color);
}

.modal-footer {
    border-top: 1px solid var(--border-color);
}
</style>

<script>
function confirmDelete(id) {
    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    const form = document.getElementById('deleteForm');
    form.action = `/admin/abouts/${id}`;
    modal.show();
}

function toggleContent(id) {
    const fullContent = document.getElementById(`full-content-${id}`);
    const button = event.target;
    
    if (fullContent.classList.contains('d-none')) {
        fullContent.classList.remove('d-none');
        button.textContent = 'Show less';
    } else {
        fullContent.classList.add('d-none');
        button.textContent = 'Read more';
    }
}

function exportData() {
    // Implementation for exporting data
    alert('Export functionality will be implemented here');
}
</script>
@endsection

