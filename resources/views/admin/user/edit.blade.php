@extends('admin.layout')

@section('title', 'Edit User')
@section('content')
<div class="container-fluid">
    <!-- Breadcrumb -->
    <div class="row mb-4">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}" class="text-decoration-none">
                            <i class="fas fa-home me-1"></i>Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.users.index') }}" class="text-decoration-none">
                            <i class="fas fa-users me-1"></i>Users
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <i class="fas fa-user-edit me-1"></i>Edit User
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1">
                        <i class="fas fa-user-edit text-primary me-2"></i>
                        Edit User
                    </h2>
                    <p class="text-muted mb-0">Update user information and permissions</p>
                </div>
                <div>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-1"></i>Back to Users
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="row">
        <div class="col-lg-8 col-xl-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-user-circle text-primary me-2"></i>
                        User Information
                    </h5>
                </div>
                <div class="card-body p-4">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <strong>Please fix the following errors:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        @method('PUT')
                        
                        <!-- Name Field -->
                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold">
                                <i class="fas fa-user me-1 text-primary"></i>Full Name
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-user text-muted"></i>
                                </span>
                                <input 
                                    type="text" 
                                    name="name" 
                                    id="name"
                                    class="form-control border-start-0 @error('name') is-invalid @enderror" 
                                    value="{{ old('name', $user->name) }}"
                                    placeholder="Enter full name"
                                    required
                                >
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Email Field -->
                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold">
                                <i class="fas fa-envelope me-1 text-primary"></i>Email Address
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-envelope text-muted"></i>
                                </span>
                                <input 
                                    type="email" 
                                    name="email" 
                                    id="email"
                                    class="form-control border-start-0 @error('email') is-invalid @enderror" 
                                    value="{{ old('email', $user->email) }}"
                                    placeholder="Enter email address"
                                    required
                                >
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Role Field -->
                        <div class="mb-4">
                            <label for="role" class="form-label fw-semibold">
                                <i class="fas fa-shield-alt me-1 text-primary"></i>User Role
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-shield-alt text-muted"></i>
                                </span>
                                <select 
                                    name="role" 
                                    id="role"
                                    class="form-select border-start-0 @error('role') is-invalid @enderror"
                                    required
                                >
                                    <option value="">Select user role</option>
                                    <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>
                                        <i class="fas fa-user"></i> User
                                    </option>
                                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>
                                        <i class="fas fa-user-shield"></i> Administrator
                                    </option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex gap-3 pt-3">
                            <button type="submit" class="btn btn-primary px-4 py-2">
                                <i class="fas fa-save me-2"></i>Update User
                            </button>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary px-4 py-2">
                                <i class="fas fa-times me-2"></i>Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- User Info Sidebar -->
        <div class="col-lg-4 col-xl-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-info-circle text-primary me-2"></i>
                        User Details
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <div class="user-avatar-large mx-auto mb-3">
                            <i class="fas fa-user fa-2x"></i>
                        </div>
                        <h5 class="mb-1">{{ $user->name }}</h5>
                        <span class="badge bg-{{ $user->role == 'admin' ? 'danger' : 'primary' }} px-3 py-2">
                            <i class="fas fa-{{ $user->role == 'admin' ? 'user-shield' : 'user' }} me-1"></i>
                            {{ ucfirst($user->role) }}
                        </span>
                    </div>

                    <div class="user-info-list">
                        <div class="info-item d-flex align-items-center py-2 border-bottom">
                            <div class="info-icon me-3">
                                <i class="fas fa-envelope text-primary"></i>
                            </div>
                            <div class="info-content">
                                <small class="text-muted d-block">Email</small>
                                <span class="fw-medium">{{ $user->email }}</span>
                            </div>
                        </div>

                        <div class="info-item d-flex align-items-center py-2 border-bottom">
                            <div class="info-icon me-3">
                                <i class="fas fa-calendar-alt text-primary"></i>
                            </div>
                            <div class="info-content">
                                <small class="text-muted d-block">Joined</small>
                                <span class="fw-medium">{{ $user->created_at->format('M d, Y') }}</span>
                            </div>
                        </div>

                        <div class="info-item d-flex align-items-center py-2">
                            <div class="info-icon me-3">
                                <i class="fas fa-clock text-primary"></i>
                            </div>
                            <div class="info-content">
                                <small class="text-muted d-block">Last Updated</small>
                                <span class="fw-medium">{{ $user->updated_at->format('M d, Y H:i') }}</span>
                            </div>
                        </div>
                    </div>
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

.breadcrumb-item + .breadcrumb-item::before {
    content: "›";
    color: var(--text-secondary);
}

.user-avatar-large {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
}

.user-info-list .info-item:last-child {
    border-bottom: none !important;
}

.info-icon {
    width: 40px;
    height: 40px;
    background: var(--light-bg);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.card {
    border-radius: 12px;
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1) !important;
}

.form-control, .form-select {
    border-radius: 8px;
    border: 1px solid var(--border-color);
    padding: 0.75rem 1rem;
    transition: all 0.3s ease;
}

.form-control:focus, .form-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(79, 70, 229, 0.25);
}

.input-group-text {
    border-radius: 8px 0 0 8px;
    border: 1px solid var(--border-color);
}

.btn {
    border-radius: 8px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-primary {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    border: none;
}

.btn-primary:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(79, 70, 229, 0.4);
}

.badge {
    border-radius: 20px;
    font-weight: 500;
}
</style>

<script>
// Form validation
(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
</script>
@endsection
