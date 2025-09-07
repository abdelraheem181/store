@extends('admin.layout')

@section('title', 'Books Management')

@section('content')

<div class="container-fluid px-4 py-4">
    <!-- Enhanced Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <div class="bg-gradient-primary rounded-circle p-3 me-3 shadow-sm">
                        <i class="fas fa-book text-white fa-2x"></i>
                    </div>
                    <div>
                        <h1 class="h2 mb-1 text-dark fw-bold">Books Management</h1>
                        <p class="text-muted mb-0 fs-6">
                            <i class="fas fa-chart-line me-1"></i>
                            Manage your bookstore inventory with ease
                        </p>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-primary btn-lg shadow-sm" id="bulkActionsBtn">
                        <i class="fas fa-tasks me-2"></i>
                        Bulk Actions
                    </button>
                    <a href="{{ route('admin.books.create') }}" class="btn btn-primary btn-lg shadow-sm">
                        <i class="fas fa-plus me-2"></i>
                        Add New Book
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Enhanced Page Header -->

<!-- Enhanced Stats Cards -->
<div class="row mb-4">
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="card border-0 shadow-sm h-100 position-relative overflow-hidden">
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="mb-2 fw-bold text-dark display-6">{{ count($books) }}</h3>
                        <p class="text-muted mb-0 fw-medium">Total Books</p>
                        <div class="mt-2">
                            <span class="badge bg-primary bg-opacity-10 text-primary">
                                <i class="fas fa-arrow-up me-1"></i>12% increase
                            </span>
                        </div>
                    </div>
                    <div class="bg-primary bg-opacity-10 rounded-circle p-3">
                        <i class="fas fa-book text-primary fa-2x"></i>
                    </div>
                </div>
                <div class="position-absolute top-0 end-0 bg-primary bg-opacity-5" style="width: 100px; height: 100px; border-radius: 50%; transform: translate(30px, -30px);"></div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="card border-0 shadow-sm h-100 position-relative overflow-hidden">
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="mb-2 fw-bold text-dark display-6">{{ $books->where('status', 'active')->count() }}</h3>
                        <p class="text-muted mb-0 fw-medium">Active Books</p>
                        <div class="mt-2">
                            <span class="badge bg-success bg-opacity-10 text-success">
                                <i class="fas fa-check me-1"></i>Available
                            </span>
                        </div>
                    </div>
                    <div class="bg-success bg-opacity-10 rounded-circle p-3">
                        <i class="fas fa-check-circle text-success fa-2x"></i>
                    </div>
                </div>
                <div class="position-absolute top-0 end-0 bg-success bg-opacity-5" style="width: 100px; height: 100px; border-radius: 50%; transform: translate(30px, -30px);"></div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="card border-0 shadow-sm h-100 position-relative overflow-hidden">
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="mb-2 fw-bold text-dark display-6">{{ $books->where('status', 'pending')->count() }}</h3>
                        <p class="text-muted mb-0 fw-medium">Pending Books</p>
                        <div class="mt-2">
                            <span class="badge bg-warning bg-opacity-10 text-warning">
                                <i class="fas fa-clock me-1"></i>Awaiting Review
                            </span>
                        </div>
                    </div>
                    <div class="bg-warning bg-opacity-10 rounded-circle p-3">
                        <i class="fas fa-clock text-warning fa-2x"></i>
                    </div>
                </div>
                <div class="position-absolute top-0 end-0 bg-warning bg-opacity-5" style="width: 100px; height: 100px; border-radius: 50%; transform: translate(30px, -30px);"></div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="card border-0 shadow-sm h-100 position-relative overflow-hidden">
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="mb-2 fw-bold text-dark display-6">{{ $books->sum('views') ?? 0 }}</h3>
                        <p class="text-muted mb-0 fw-medium">Total Views</p>
                        <div class="mt-2">
                            <span class="badge bg-info bg-opacity-10 text-info">
                                <i class="fas fa-eye me-1"></i>Engagement
                            </span>
                        </div>
                    </div>
                    <div class="bg-info bg-opacity-10 rounded-circle p-3">
                        <i class="fas fa-eye text-info fa-2x"></i>
                    </div>
                </div>
                <div class="position-absolute top-0 end-0 bg-info bg-opacity-5" style="width: 100px; height: 100px; border-radius: 50%; transform: translate(30px, -30px);"></div>
            </div>
        </div>
    </div>
</div>
<!-- End Enhanced Stats Cards -->

<!-- Enhanced Search and Filter Section -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="row g-3">
                    <div class="col-lg-4 col-md-6">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="fas fa-search text-muted"></i>
                            </span>
                            <input type="text" class="form-control border-start-0" id="searchInput" placeholder="Search books by title, author, or category...">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <select class="form-select form-select-lg" id="categoryFilter">
                            <option value="">All Categories</option>
                            @foreach($books->unique('category_id') as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <select class="form-select form-select-lg" id="authorFilter">
                            <option value="">All Authors</option>
                            @foreach($books->unique('author_id') as $author)
                                <option value="{{ $author->id }}">{{ $author->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <select class="form-select form-select-lg" id="statusFilter">
                            <option value="">All Status</option>
                            <option value="active">Active</option>
                            <option value="pending">Pending</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <button class="btn btn-outline-secondary btn-lg w-100" id="resetFilters">
                            <i class="fas fa-undo me-2"></i> Reset
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Enhanced Search and Filter Section -->

<!-- Enhanced Books Table -->
<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-0 py-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                            <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                <i class="fas fa-list text-primary"></i>
                            </div>
                        <div>
                            <h5 class="card-title mb-1 fw-bold text-dark">Books Collection</h5>
                            <p class="text-muted mb-0 small">Showing {{ $books->count() }} books</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary" id="exportBtn">
                            <i class="fas fa-download me-2"></i> Export
                        </button>
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="fas fa-cog me-2"></i> Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><i class="fas fa-eye me-2"></i>View All</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-edit me-2"></i>Edit Selected</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-trash me-2"></i>Delete Selected</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0" id="booksTable">
                        <thead class="table-light">
                            <tr>
                                <th class="border-0 px-4 py-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="selectAll">
                                    </div>
                                </th>
                                <th class="border-0 px-4 py-3 text-nowrap">
                                    <i class="fas fa-image me-2 text-muted"></i> Cover
                                </th>
                                <th class="border-0 px-4 py-3 text-nowrap">
                                    <i class="fas fa-book me-2 text-muted"></i> Book Information
                                </th>
                                <th class="border-0 px-4 py-3 text-nowrap">
                                    <i class="fas fa-user me-2 text-muted"></i> Author
                                </th>
                                <th class="border-0 px-4 py-3 text-nowrap">
                                    <i class="fas fa-tag me-2 text-muted"></i> Category
                                </th>
                                <th class="border-0 px-4 py-3 text-nowrap">
                                    <i class="fas fa-dollar-sign me-2 text-muted"></i> Price
                                </th>
                                <th class="border-0 px-4 py-3 text-nowrap">
                                    <i class="fas fa-calendar me-2 text-muted"></i> Published
                                </th>
                                <th class="border-0 px-4 py-3 text-nowrap">
                                    <i class="fas fa-cog me-2 text-muted"></i> Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($books as $book)
                                <tr class="book-row align-middle" data-category="{{ $book->category->id ?? '' }}" data-author="{{ $book->author->id ?? '' }}" data-status="{{ $book->status ?? '' }}">
                                    <td class="border-0 px-4 py-3">
                                        <div class="form-check">
                                            <input class="form-check-input book-checkbox" type="checkbox" value="{{ $book->id }}">
                                        </div>
                                    </td>
                                    <td class="border-0 px-4 py-3">
                                        <div class="d-flex align-items-center">
                                            @if($book->basic_image_path)
                                                <img src="{{ asset('images/books/' .$book->basic_image_path) }}" 
                                                     alt="{{ $book->name }}" 
                                                     class="rounded shadow-sm" 
                                                     style="width: 60px; height: 80px; object-fit: cover;">
                                            @else
                                                <div class="bg-light rounded shadow-sm d-flex align-items-center justify-content-center" 
                                                     style="width: 60px; height: 80px;">
                                                    <i class="fas fa-book text-muted fa-lg"></i>
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="border-0 px-4 py-3">
                                        <div>
                                            <h6 class="mb-2 fw-bold text-dark">{{ Str::limit($book->name, 35) }}</h6>
                                            <div class="small text-muted">
                                                <div class="mb-1 d-flex align-items-center">
                                                    <i class="fas fa-hashtag me-2 text-primary"></i> 
                                                    <span class="fw-medium">{{ $book->isbn ?? 'N/A' }}</span>
                                                </div>
                                                <div class="mb-1 d-flex align-items-center">
                                                    <i class="fas fa-file-text me-2 text-info"></i> 
                                                    <span>{{ $book->pages ?? 'N/A' }} pages</span>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-language me-2 text-success"></i> 
                                                    <span>{{ $book->language ?? 'N/A' }}</span>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-language me-2 text-success"></i> 
                                                    <span>{{ $book->avl_qty ?? 'N/A' }} avl quantity</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="border-0 px-4 py-3">
                                        <div class="d-flex align-items-center">
                                           
                                            <div>
                                                @if($book->author->image_path)
                                                    <img src="{{ asset('images/authors/' .$book->author->image_path) }}"    
                                                         alt="{{ $book->author->name }}" 
                                                        class="rounded-circle border" 
                                                        style="width: 50px; height: 50px; object-fit: cover;">
                                                @else
                                                    <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center" 
                                                         style="width: 50px; height: 50px;">
                                                        <i class="fas fa-user text-white"></i>
                                                    </div>
                                                @endif
                                                <span class="fw-medium text-dark">{{ $book->author->name }}</span>
                                                @if($book->author)
                                                    <div class="small text-muted">{{ $book->author->country->name }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="border-0 px-4 py-3">
                                       
                                            {{ $book->category->name }}
                                       
                                    </td>
                                    <td class="border-0 px-4 py-3">
                                        <div class="fw-bold text-success fs-5">${{ number_format($book->price, 2) }}</div>
                                        @if($book->discount_price)
                                            <div class="small text-muted text-decoration-line-through">
                                                ${{ number_format($book->discount_price, 2) }}
                                            </div>
                                        @endif
                                    </td>
                                    <td class="border-0 px-4 py-3">
                                        <div class="small">
                                            <div class="fw-medium text-dark">{{ $book->published_date ? \Carbon\Carbon::parse($book->published_date)->format('M d, Y') : 'N/A' }}</div>
                                            <div class="text-muted">{{ $book->publish_year ?? 'N/A' }}</div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        <div class="d-flex gap-2 justify-content-center">
                                            <a href="{{ route('admin.books.edit', $book->id) }}" 
                                               class="btn btn-outline-primary btn-sm" 
                                               title="Edit Book">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            {{-- <a href="#" 
                                               class="btn btn-outline-info btn-sm" 
                                               title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </a> --}}
                                            <form action="{{ route('admin.books.destroy', $book->id) }}" 
                                                      method="POST" 
                                                      style="display: inline;"
                                                      onsubmit="return confirm('Are you sure you want to delete this book?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="btn btn-outline-danger btn-sm" 
                                                            title="Delete Book">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-5">
                                        <div class="text-muted">
                                            <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                                <i class="fas fa-book fa-2x"></i>
                                            </div>
                                            <h5 class="fw-bold">No books found</h5>
                                            <p class="mb-4">Start building your collection by adding the first book.</p>
                                            <a href="{{ route('admin.books.create') }}" class="btn btn-primary btn-lg">
                                                <i class="fas fa-plus me-2"></i>Add First Book
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>    
                    <div class="d-flex justify-content-center">
                        {{ $books->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
            
         
      
    
        </div>
    </div>
</div>
<!-- End Enhanced Books Table -->

<!-- Enhanced Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-0 bg-danger text-white">
                <h5 class="modal-title" id="deleteModalLabel">
                    <i class="fas fa-exclamation-triangle me-2"></i>Confirm Delete
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="text-center mb-3">
                    <div class="bg-danger bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="fas fa-trash text-danger fa-lg"></i>
                    </div>
                    <h6 class="fw-bold">Are you sure you want to delete this book?</h6>
                    <p class="text-muted mb-0">This action cannot be undone and will permanently remove the book from your collection.</p>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Cancel
                </button>
                <button type="button" class="btn btn-danger" id="confirmDelete">
                    <i class="fas fa-trash me-2"></i>Delete Book
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
.bg-gradient-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.card {
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1) !important;
}

.table th {
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.75rem;
    letter-spacing: 0.5px;
}

.table tbody tr {
    transition: all 0.2s ease;
}

.table tbody tr:hover {
    background-color: rgba(102, 126, 234, 0.05);
    transform: scale(1.01);
}

.btn-group .btn {
    border-radius: 6px !important;
    margin: 0 2px;
}

.badge {
    font-size: 0.75rem;
    padding: 0.5rem 0.75rem;
}

.form-select, .form-control {
    border-radius: 8px;
    border: 1px solid #e9ecef;
}

.form-select:focus, .form-control:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
}

.input-group-text {
    border-radius: 8px 0 0 8px;
    border: 1px solid #e9ecef;
}

.input-group .form-control {
    border-radius: 0 8px 8px 0;
}

.pagination .page-link {
    border-radius: 6px;
    margin: 0 2px;
    border: none;
    color: #667eea;
}

.pagination .page-item.active .page-link {
    background-color: #667eea;
    border-color: #667eea;
}

.modal-content {
    border-radius: 12px;
}

.btn {
    border-radius: 8px;
    font-weight: 500;
}

.btn-lg {
    padding: 0.75rem 1.5rem;
}

.display-6 {
    font-size: 2.5rem;
    font-weight: 700;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Enhanced search functionality
    const searchInput = document.getElementById('searchInput');
    const bookRows = document.querySelectorAll('.book-row');
    
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        
        bookRows.forEach(row => {
            const bookName = row.querySelector('h6').textContent.toLowerCase();
            const authorName = row.querySelector('td:nth-child(4) span').textContent.toLowerCase();
            const categoryName = row.querySelector('td:nth-child(5) span').textContent.toLowerCase();
            
            if (bookName.includes(searchTerm) || authorName.includes(searchTerm) || categoryName.includes(searchTerm)) {
                row.style.display = '';
                row.style.opacity = '1';
            } else {
                row.style.display = 'none';
                row.style.opacity = '0';
            }
        });
    });
    
    // Enhanced category filter
    const categoryFilter = document.getElementById('categoryFilter');
    categoryFilter.addEventListener('change', function() {
        const selectedCategory = this.value;
        
        bookRows.forEach(row => {
            const categoryId = row.dataset.category;
            if (!selectedCategory || categoryId == selectedCategory) {
                row.style.display = '';
                row.style.opacity = '1';
            } else {
                row.style.display = 'none';
                row.style.opacity = '0';
            }
        });
    });
    
    // Enhanced author filter
    const authorFilter = document.getElementById('authorFilter');
    authorFilter.addEventListener('change', function() {
        const selectedAuthor = this.value;
        
        bookRows.forEach(row => {
            const authorId = row.dataset.author;
            if (!selectedAuthor || authorId == selectedAuthor) {
                row.style.display = '';
                row.style.opacity = '1';
            } else {
                row.style.display = 'none';
                row.style.opacity = '0';
            }
        });
    });
    
    // Status filter
    const statusFilter = document.getElementById('statusFilter');
    statusFilter.addEventListener('change', function() {
        const selectedStatus = this.value;
        
        bookRows.forEach(row => {
            const status = row.dataset.status;
            if (!selectedStatus || status == selectedStatus) {
                row.style.display = '';
                row.style.opacity = '1';
            } else {
                row.style.display = 'none';
                row.style.opacity = '0';
            }
        });
    });
    
    // Enhanced reset filters
    document.getElementById('resetFilters').addEventListener('click', function() {
        searchInput.value = '';
        categoryFilter.value = '';
        authorFilter.value = '';
        statusFilter.value = '';
        
        bookRows.forEach(row => {
            row.style.display = '';
            row.style.opacity = '1';
        });
        
        // Add animation effect
        this.innerHTML = '<i class="fas fa-check me-2"></i> Reset Complete';
        setTimeout(() => {
            this.innerHTML = '<i class="fas fa-undo me-2"></i> Reset';
        }, 2000);
    });
    
    // Enhanced select all functionality
    const selectAll = document.getElementById('selectAll');
    const bookCheckboxes = document.querySelectorAll('.book-checkbox');
    
    selectAll.addEventListener('change', function() {
        bookCheckboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
        
        // Update UI based on selection
        updateBulkActionsUI();
    });
    
    // Individual checkbox change
    bookCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            updateBulkActionsUI();
        });
    });
    
    function updateBulkActionsUI() {
        const selectedCount = document.querySelectorAll('.book-checkbox:checked').length;
        const bulkBtn = document.getElementById('bulkActionsBtn');
        
        if (selectedCount > 0) {
            bulkBtn.innerHTML = `<i class="fas fa-tasks me-2"></i> Actions (${selectedCount})`;
            bulkBtn.classList.remove('btn-outline-primary');
            bulkBtn.classList.add('btn-primary');
        } else {
            bulkBtn.innerHTML = '<i class="fas fa-tasks me-2"></i> Bulk Actions';
            bulkBtn.classList.remove('btn-primary');
            bulkBtn.classList.add('btn-outline-primary');
        }
    }
    
    // Enhanced delete functionality
    let bookIdToDelete = null;
    
    document.querySelectorAll('.delete-book').forEach(button => {
        button.addEventListener('click', function() {
            bookIdToDelete = this.dataset.id;
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            deleteModal.show();
        });
    });
    
    document.getElementById('confirmDelete').addEventListener('click', function() {
        if (bookIdToDelete) {
            // Show loading state
            this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Deleting...';
            this.disabled = true;
            
            // Create a form to submit the delete request
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/admin/books/${bookIdToDelete}`;
            
            const csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';
            
            const methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'DELETE';
            
            form.appendChild(csrfToken);
            form.appendChild(methodField);
            document.body.appendChild(form);
            form.submit();
        }
    });
    
    // Enhanced export functionality
    document.getElementById('exportBtn').addEventListener('click', function() {
        this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Exporting...';
        this.disabled = true;
        
        setTimeout(() => {
            this.innerHTML = '<i class="fas fa-download me-2"></i> Export';
            this.disabled = false;
            // Show success message
            showNotification('Export completed successfully!', 'success');
        }, 2000);
    });
    
    // Enhanced bulk actions
    document.getElementById('bulkActionsBtn').addEventListener('click', function() {
        const selectedBooks = Array.from(bookCheckboxes)
            .filter(checkbox => checkbox.checked)
            .map(checkbox => checkbox.value);
            
        if (selectedBooks.length === 0) {
            showNotification('Please select books to perform bulk actions', 'warning');
            return;
        }
        
        showNotification(`Bulk actions for ${selectedBooks.length} selected books will be implemented here`, 'info');
    });
    
    // showNotification function is now globally available from main.js
    
    // Add smooth animations
    bookRows.forEach((row, index) => {
        row.style.animationDelay = `${index * 0.1}s`;
        row.classList.add('animate__animated', 'animate__fadeInUp');
    });
});
</script>
@endpush