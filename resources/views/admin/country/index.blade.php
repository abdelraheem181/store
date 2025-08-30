@extends('admin.layout')

@section('title', 'Countries Management')
@section('subtitle', 'Manage countries, currencies, and regional settings')

@section('content')
<div class="container-fluid p-0">
    <!-- Page Header with Stats -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="bg-primary bg-opacity-10 rounded-circle p-3">
                                <i class="fas fa-globe text-primary fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="card-title mb-1 text-muted">Total Countries</h6>
                            <h3 class="mb-0 fw-bold text-primary">{{ $countries->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="bg-success bg-opacity-10 rounded-circle p-3">
                                <i class="fas fa-dollar-sign text-success fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="card-title mb-1 text-muted">Active Currencies</h6>
                            <h3 class="mb-0 fw-bold text-success">{{ $countries->unique('currency')->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="bg-warning bg-opacity-10 rounded-circle p-3">
                                <i class="fas fa-flag text-warning fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="card-title mb-1 text-muted">Regions</h6>
                            <h3 class="mb-0 fw-bold text-warning">{{ $countries->unique('code')->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="bg-info bg-opacity-10 rounded-circle p-3">
                                <i class="fas fa-chart-line text-info fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="card-title mb-1 text-muted">Growth</h6>
                            <h3 class="mb-0 fw-bold text-info">+12%</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Card -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-0 py-3">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h5 class="mb-0 fw-bold text-dark">
                        <i class="fas fa-list me-2 text-primary"></i>
                        Countries List
                    </h5>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-md-end gap-2">
                        <!-- Search Box -->
                        <div class="position-relative">
                            <input type="text" class="form-control form-control-sm" id="searchInput" placeholder="Search countries..." style="width: 250px;">
                            <i class="fas fa-search position-absolute top-50 end-0 translate-middle-y me-2 text-muted"></i>
                        </div>
                        <!-- Add Country Button -->
                        <a href="{{ route('admin.countries.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus me-1"></i>
                            Add Country
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card-body p-0">
            <!-- Enhanced Table -->
            <div class="table-responsive">
                <table class="table table-hover mb-0" id="countriesTable">
                    <thead class="table-light">
                        <tr>
                            <th class="border-0 py-3 px-4">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-flag me-2 text-primary"></i>
                                    Country Name
                                </div>
                            </th>
                            <th class="border-0 py-3">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-code me-2 text-secondary"></i>
                                    Country Code
                                </div>
                            </th>
                            <th class="border-0 py-3">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-dollar-sign me-2 text-success"></i>
                                    Currency
                                </div>
                            </th>
                            <th class="border-0 py-3 text-center">
                                <div class="d-flex align-items-center justify-content-center">
                                    <i class="fas fa-cogs me-2 text-info"></i>
                                    Actions
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($countries as $country)
                            <tr class="border-bottom">
                                <td class="py-3 px-4">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                            <i class="fas fa-globe text-primary"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 fw-semibold text-dark">{{ $country->name }}</h6>
                                            <small class="text-muted">Country ID: {{ $country->id }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3">
                                    <span class="badge bg-light text-dark border px-3 py-2">
                                        <i class="fas fa-code me-1"></i>
                                        {{ $country->code }}
                                    </span>
                                </td>
                                <td class="py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-success bg-opacity-10 rounded-circle p-2 me-2">
                                            <i class="fas fa-dollar-sign text-success"></i>
                                        </div>
                                        <span class="fw-semibold text-success">{{ $country->currency }}</span>
                                    </div>
                                </td>
                                <td class="py-3 text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.countries.edit', $country->id) }}" 
                                           class="btn btn-outline-primary btn-sm" 
                                           title="Edit Country">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" 
                                                class="btn btn-outline-danger btn-sm" 
                                                onclick="deleteCountry({{ $country->id }}, '{{ $country->name }}')"
                                                title="Delete Country">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5">
                                    <div class="text-muted">
                                        <i class="fas fa-inbox fa-3x mb-3"></i>
                                        <h5>No Countries Found</h5>
                                        <p>Start by adding your first country to the system.</p>
                                        <a href="{{ route('admin.countries.create') }}" class="btn btn-primary">
                                            <i class="fas fa-plus me-1"></i>
                                            Add First Country
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
        @if($countries->count() > 0)
            <div class="card-footer bg-white border-0 py-3">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p class="mb-0 text-muted">
                            Showing <strong>{{ $countries->count() }}</strong> countries
                        </p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <p class="mb-0 text-muted">
                            Last updated: {{ now()->format('M d, Y H:i') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title text-danger" id="deleteModalLabel">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    Confirm Deletion
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete <strong id="countryName"></strong>?</p>
                <p class="text-muted small">This action cannot be undone and will remove all associated data.</p>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>
                    Cancel
                </button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-1"></i>
                        Delete Country
                    </button>
                </form>
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
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1) !important;
}

.table tbody tr {
    transition: all 0.2s ease;
}

.table tbody tr:hover {
    background-color: #f8f9fa;
    transform: scale(1.01);
}

.btn-group .btn {
    border-radius: 6px !important;
    margin: 0 2px;
}

.badge {
    font-weight: 500;
}

.search-highlight {
    background-color: #fff3cd;
    padding: 2px 4px;
    border-radius: 3px;
}

.fade-in {
    animation: fadeIn 0.5s ease-in;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

<script>
// Search functionality
document.getElementById('searchInput').addEventListener('keyup', function() {
    const searchTerm = this.value.toLowerCase();
    const table = document.getElementById('countriesTable');
    const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    
    for (let row of rows) {
        const countryName = row.cells[0]?.textContent.toLowerCase() || '';
        const countryCode = row.cells[1]?.textContent.toLowerCase() || '';
        const currency = row.cells[2]?.textContent.toLowerCase() || '';
        
        if (countryName.includes(searchTerm) || countryCode.includes(searchTerm) || currency.includes(searchTerm)) {
            row.style.display = '';
            // Highlight search term
            if (searchTerm) {
                highlightText(row, searchTerm);
            }
        } else {
            row.style.display = 'none';
        }
    }
});

function highlightText(row, searchTerm) {
    const cells = row.getElementsByTagName('td');
    for (let cell of cells) {
        const text = cell.textContent;
        const regex = new RegExp(`(${searchTerm})`, 'gi');
        cell.innerHTML = text.replace(regex, '<span class="search-highlight">$1</span>');
    }
}

// Delete confirmation
function deleteCountry(countryId, countryName) {
    document.getElementById('countryName').textContent = countryName;
    document.getElementById('deleteForm').action = `/admin/countries/${countryId}`;
    
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    deleteModal.show();
}

// Add fade-in animation to cards
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.card');
    cards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
        card.classList.add('fade-in');
    });
});
</script>
@endsection

