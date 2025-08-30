@extends('admin.layout')

@section('title', 'Authors Management')

@section('content')
<div class="container-fluid px-4 py-4">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="h3 mb-0 text-dark fw-bold">
                        <i class="fas fa-users text-primary me-3"></i>
                        Authors Management
                    </h2>
                    <p class="text-muted mb-0">Manage all authors in your bookstore</p>
                </div>
                <div>
                    <a href="{{ route('admin.authors.create') }}" class="btn btn-primary btn-lg shadow-sm">
                        <i class="fas fa-plus me-2"></i>
                        Add New Author
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="bg-primary bg-opacity-10 rounded-circle p-3">
                                <i class="fas fa-users text-primary fa-2x"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h4 class="mb-1 fw-bold text-dark">{{ count($authors) }}</h4>
                            <p class="text-muted mb-0">Total Authors</p>
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
                                <i class="fas fa-check-circle text-success fa-2x"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h4 class="mb-1 fw-bold text-dark">{{ $authors->where('is_active', true)->count() }}</h4>
                            <p class="text-muted mb-0">Active Authors</p>
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
                                <i class="fas fa-pause-circle text-warning fa-2x"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h4 class="mb-1 fw-bold text-dark">{{ $authors->where('is_active', false)->count() }}</h4>
                            <p class="text-muted mb-0">Inactive Authors</p>
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
                                <i class="fas fa-globe text-info fa-2x"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h4 class="mb-1 fw-bold text-dark">{{ $authors->unique('country_id')->count() }}</h4>
                            <p class="text-muted mb-0">Countries</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Authors Table -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0 fw-bold text-dark">
                            <i class="fas fa-list me-2 text-primary"></i>
                            Authors List
                        </h5>
                        <div class="d-flex gap-2">
                            <div class="input-group" style="width: 300px;">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-search text-muted"></i>
                                </span>
                                <input type="text" class="form-control border-start-0" id="searchInput" placeholder="Search authors...">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="authorsTable">
                            <thead class="table-light">
                                <tr>
                                    <th class="border-0 px-4 py-3 fw-semibold text-dark">
                                        <i class="fas fa-user me-2 text-primary"></i>Author
                                    </th>
                                    <th class="border-0 px-4 py-3 fw-semibold text-dark">
                                        <i class="fas fa-envelope me-2 text-primary"></i>Contact
                                    </th>
                                    <th class="border-0 px-4 py-3 fw-semibold text-dark">
                                        <i class="fas fa-globe me-2 text-primary"></i>Location
                                    </th>
                                    <th class="border-0 px-4 py-3 fw-semibold text-dark">
                                        <i class="fas fa-toggle-on me-2 text-primary"></i>Status
                                    </th>
                                    <th class="border-0 px-4 py-3 fw-semibold text-dark text-center">
                                        <i class="fas fa-cogs me-2 text-primary"></i>Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($authors as $author)
                                    <tr class="border-bottom">
                                        <td class="px-4 py-3">
                                          @if($author->image_path)
                                          <img src="{{ asset('images/authors/' .$author->image_path) }}" 
                                               class="rounded-circle border" 
                                               style="width: 50px; height: 50px; object-fit: cover;"
                                               alt="{{ $author->getTranslation('name', 'ar')}}">
                                        @else
                                          <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center" 
                                               style="width: 50px; height: 50px;">
                                              <i class="fas fa-user text-white"></i>
                                          </div>
                                         @endif
                                         <span class="text-dark">{{ $author->getTranslation('name', 'ar')}}</span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div>
                                                <div class="d-flex align-items-center mb-1">
                                                    <i class="fas fa-envelope text-muted me-2" style="width: 16px;"></i>
                                                    <span class="text-dark">{{ $author->email }}</span>
                                                </div>
                                                @if($author->phone)
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-phone text-muted me-2" style="width: 16px;"></i>
                                                        <span class="text-dark">{{ $author->phone }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-map-marker-alt text-danger me-2"></i>
                                                <span class="text-dark">{{ $author->country->getTranslation('name', 'en') }}</span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">
                                            @if($author->is_active)
                                                <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">
                                                    <i class="fas fa-check-circle me-1"></i>
                                                    Active
                                                </span>
                                            @else
                                                <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-2 rounded-pill">
                                                    <i class="fas fa-pause-circle me-1"></i>
                                                    Inactive
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-center">
                                            <div class="d-flex gap-2 justify-content-center">
                                                <a href="{{ route('admin.authors.edit', $author->id) }}" 
                                                   class="btn btn-outline-primary btn-sm" 
                                                   title="Edit Author">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.authors.destroy', $author->id) }}" 
                                                      method="POST" 
                                                      style="display: inline;"
                                                      onsubmit="return confirm('Are you sure you want to delete this author?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="btn btn-outline-danger btn-sm" 
                                                            title="Delete Author">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-5">
                                            <div class="text-muted">
                                                <i class="fas fa-users fa-3x mb-3 text-muted"></i>
                                                <h5 class="text-muted">No Authors Found</h5>
                                                <p class="text-muted">Start by adding your first author to the system.</p>
                                                <a href="{{ route('admin.authors.create') }}" class="btn btn-primary">
                                                    <i class="fas fa-plus me-2"></i>
                                                    Add First Author
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                
                @if($authors->count() > 0)
                    <div class="card-footer bg-white border-0 py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-muted">
                                Showing <strong>{{ $authors->count() }}</strong> authors
                            </div>
                            <div class="text-muted">
                                <i class="fas fa-info-circle me-1"></i>
                                Click on action buttons to manage authors
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
.card {
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-2px);
}

.table tbody tr:hover {
    background-color: rgba(0, 123, 255, 0.05);
}

.badge {
    font-weight: 500;
}

.btn-sm {
    padding: 0.375rem 0.75rem;
    font-size: 0.875rem;
}

.input-group-text {
    background-color: #f8f9fa;
    border-color: #dee2e6;
}

.form-control:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const table = document.getElementById('authorsTable');
    const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

    searchInput.addEventListener('keyup', function() {
        const searchTerm = this.value.toLowerCase();
        
        Array.from(rows).forEach(row => {
            const text = row.textContent.toLowerCase();
            if (text.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
});
</script>
@endsection