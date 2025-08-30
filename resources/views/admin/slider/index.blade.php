@extends('admin.layout')
@section('title', 'Slider Management')
@section('content')

<style>
    .slider-card {
        transition: all 0.3s ease;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    }
    
    .slider-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 30px rgba(0,0,0,0.12);
    }
    
    .slider-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 12px;
        transition: all 0.3s ease;
    }
    
    .slider-image:hover {
        transform: scale(1.05);
    }
    
    .status-badge {
        position: absolute;
        top: 12px;
        right: 12px;
        z-index: 10;
    }
    
    .action-buttons {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }
    
    .btn-modern {
        border-radius: 8px;
        font-weight: 500;
        padding: 8px 16px;
        transition: all 0.3s ease;
        border: none;
    }
    
    .btn-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }
    
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #6c757d;
    }
    
    .empty-state i {
        font-size: 4rem;
        margin-bottom: 20px;
        opacity: 0.3;
    }
    
    .stats-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 16px;
        padding: 24px;
        margin-bottom: 24px;
    }
    
    .stats-number {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 8px;
    }
    
    .search-box {
        background: white;
        border-radius: 12px;
        padding: 16px;
        margin-bottom: 24px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
</style>

<div class="container-fluid">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="h3 mb-1 text-dark fw-bold">
                        <i class="fas fa-images text-primary me-3"></i>
                        Slider Management
                    </h2>
                    <p class="text-muted mb-0">Manage and organize your website slider images</p>
                </div>
                <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary btn-modern">
                    <i class="fas fa-plus me-2"></i>
                    Add New Slider
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="stats-card">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <i class="fas fa-images fa-2x opacity-75"></i>
                    </div>
                    <div>
                        <div class="stats-number">{{ $sliders->count() }}</div>
                        <div class="opacity-75">Total Sliders</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="stats-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <i class="fas fa-eye fa-2x opacity-75"></i>
                    </div>
                    <div>
                        <div class="stats-number">{{ $sliders->count() }}</div>
                        <div class="opacity-75">Active Sliders</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="stats-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <i class="fas fa-clock fa-2x opacity-75"></i>
                    </div>
                    <div>
                        <div class="stats-number">{{ $sliders->count() }}</div>
                        <div class="opacity-75">Published</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="stats-card" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <i class="fas fa-check-circle fa-2x opacity-75"></i>
                    </div>
                    <div>
                        <div class="stats-number">{{ $sliders->count() }}</div>
                        <div class="opacity-75">Ready</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Search and Filter Section -->
    <div class="search-box">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text bg-light border-0">
                        <i class="fas fa-search text-muted"></i>
                    </span>
                    <input type="text" class="form-control border-0 bg-light" placeholder="Search sliders..." id="searchInput">
                </div>
            </div>
            <div class="col-md-6 text-md-end mt-3 mt-md-0">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-outline-secondary btn-sm active">All</button>
                    <button type="button" class="btn btn-outline-secondary btn-sm">Active</button>
                    <button type="button" class="btn btn-outline-secondary btn-sm">Inactive</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Sliders Grid -->
    @if($sliders->count() > 0)
        <div class="row" id="slidersGrid">
            @foreach($sliders as $slider)
                <div class="col-lg-4 col-md-6 mb-4 slider-item">
                    <div class="slider-card h-100">
                        <div class="position-relative">
                            <img src="{{ asset($slider->image_path) }}" 
                                 alt="Slider Image" 
                                 class="slider-image"
                                 data-bs-toggle="modal" 
                                 data-bs-target="#imageModal{{ $slider->id }}">
                            
                            <!-- Status Badge -->
                            <span class="badge bg-success status-badge">
                                <i class="fas fa-check me-1"></i>Active
                            </span>
                            
                            <!-- Quick Actions Overlay -->
                            <div class="position-absolute bottom-0 start-0 end-0 p-3" 
                                 style="background: linear-gradient(transparent, rgba(0,0,0,0.7));">
                                <div class="action-buttons">
                                    <a href="{{ route('admin.sliders.edit', $slider->id) }}" 
                                       class="btn btn-light btn-sm btn-modern">
                                        <i class="fas fa-edit me-1"></i>Edit
                                    </a>
                                    <button type="button" 
                                            class="btn btn-outline-light btn-sm btn-modern"
                                            onclick="previewSlider({{ $slider->id }})">
                                        <i class="fas fa-eye me-1"></i>Preview
                                    </button>
                                    <button type="button" 
                                            class="btn btn-outline-danger btn-sm btn-modern"
                                            onclick="deleteSlider({{ $slider->id }})">
                                        <i class="fas fa-trash me-1"></i>Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>
                                    {{ $slider->created_at ? $slider->created_at->format('M d, Y') : 'N/A' }}
                                </small>
                                <small class="text-muted">
                                    <i class="fas fa-image me-1"></i>
                                    {{ $slider->id }}
                                </small>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="slider{{ $slider->id }}" checked>
                                    <label class="form-check-label small" for="slider{{ $slider->id }}">
                                        Published
                                    </label>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-link btn-sm text-muted p-0" type="button" data-bs-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('admin.sliders.edit', $slider->id) }}">
                                            <i class="fas fa-edit me-2"></i>Edit
                                        </a></li>
                                        <li><a class="dropdown-item" href="#" onclick="duplicateSlider({{ $slider->id }})">
                                            <i class="fas fa-copy me-2"></i>Duplicate
                                        </a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item text-danger" href="#" onclick="deleteSlider({{ $slider->id }})">
                                            <i class="fas fa-trash me-2"></i>Delete
                                        </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Image Modal -->
                <div class="modal fade" id="imageModal{{ $slider->id }}" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Slider Image Preview</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body text-center">
                                <img src="{{ asset($slider->image_path) }}" alt="Slider Image" class="img-fluid rounded">
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('admin.sliders.edit', $slider->id) }}" class="btn btn-primary">Edit Slider</a>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <!-- Empty State -->
        <div class="empty-state">
            <i class="fas fa-images"></i>
            <h4 class="mb-3">No Sliders Found</h4>
            <p class="mb-4">Get started by creating your first slider image to showcase your content.</p>
            <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-plus me-2"></i>
                Create Your First Slider
            </a>
        </div>
    @endif
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    Confirm Deletion
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this slider? This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Slider</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Search functionality
document.getElementById('searchInput').addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    const sliderItems = document.querySelectorAll('.slider-item');
    
    sliderItems.forEach(item => {
        const text = item.textContent.toLowerCase();
        if (text.includes(searchTerm)) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
});

// Delete slider function
function deleteSlider(sliderId) {
    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    const form = document.getElementById('deleteForm');
    form.action = `{{ route('admin.sliders.destroy', '') }}/${sliderId}`;
    modal.show();
}

// Preview slider function
function previewSlider(sliderId) {
    // You can implement a preview functionality here
    console.log('Previewing slider:', sliderId);
}

// Duplicate slider function
function duplicateSlider(sliderId) {
    // You can implement a duplicate functionality here
    console.log('Duplicating slider:', sliderId);
}

// Toggle slider status
document.querySelectorAll('.form-check-input').forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        const sliderId = this.id.replace('slider', '');
        const isPublished = this.checked;
        
        // You can implement AJAX call here to update the slider status
        console.log(`Slider ${sliderId} status changed to: ${isPublished ? 'Published' : 'Unpublished'}`);
    });
});
</script>

@endsection