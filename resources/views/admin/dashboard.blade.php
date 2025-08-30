@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="dashboard-container">
    <!-- Welcome Section -->
    <div class="welcome-section mb-4">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h2 class="welcome-title">Welcome back, {{ Auth::user()->name ?? 'Admin' }}! 👋</h2>
                <p class="welcome-subtitle">Here's what's happening with your bookstore today.</p>
            </div>
            <div class="col-md-4 text-md-end">
                <div class="current-date">
                    <i class="fas fa-calendar-alt me-2"></i>
                    {{ now()->format('l, F j, Y') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Key Statistics Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="stat-card stat-card-primary">
                <div class="stat-card-body">
                    <div class="stat-card-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="stat-card-content">
                        <h3 class="stat-card-number">{{ number_format($books) }}</h3>
                        <p class="stat-card-title"> Books</p>
                        <div class="stat-card-trend">
                            <i class="fas fa-arrow-up text-success"></i>
                            <span class="text-success">+12%</span>
                            <span class="text-muted">from last month</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-3">
            <div class="stat-card stat-card-success">
                <div class="stat-card-body">
                    <div class="stat-card-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="stat-card-content">
                        <h3 class="stat-card-number">{{ number_format($orders) }}</h3>
                        <p class="stat-card-title"> Orders</p>
                        <div class="stat-card-trend">
                            <i class="fas fa-arrow-up text-success"></i>
                            <span class="text-success">+8%</span>
                            <span class="text-muted">from last month</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-3">
            <div class="stat-card stat-card-warning">
                <div class="stat-card-body">
                    <div class="stat-card-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-card-content">
                        <h3 class="stat-card-number">{{ number_format($users) }}</h3>
                        <p class="stat-card-title"> Users</p>
                        <div class="stat-card-trend">
                            <i class="fas fa-arrow-up text-success"></i>
                            <span class="text-success">+15%</span>
                            <span class="text-muted">from last month</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-3">
            <div class="stat-card stat-card-info">
                <div class="stat-card-body">
                    <div class="stat-card-icon">
                        <i class="fas fa-user-edit"></i>
                    </div>
                    <div class="stat-card-content">
                        <h3 class="stat-card-number">{{ number_format($authors) }}</h3>
                        <p class="stat-card-title"> Authors</p>
                        <div class="stat-card-trend">
                            <i class="fas fa-arrow-up text-success"></i>
                            <span class="text-success">+5%</span>
                            <span class="text-muted">from last month</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- end of contact cards -->
    <!-- end of key statistics cards -->

    <!-- Secondary Statistics Row -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="stat-card stat-card-secondary">
                <div class="stat-card-body">
                    <div class="stat-card-icon">
                        <i class="fas fa-tags"></i>
                    </div>
                    <div class="stat-card-content">
                        <h3 class="stat-card-number">{{ number_format($categories) }}</h3>
                        <p class="stat-card-title">Categories</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-3">
            <div class="stat-card stat-card-purple">
                <div class="stat-card-body">
                    <div class="stat-card-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="stat-card-content">
                        <h3 class="stat-card-number">{{ number_format($rates) }}</h3>
                        <p class="stat-card-title">Total Ratings</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-3">
            <div class="stat-card stat-card-teal">
                <div class="stat-card-body">
                    <div class="stat-card-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <div class="stat-card-content">
                        <h3 class="stat-card-number">{{ number_format($countries) }}</h3>
                        <p class="stat-card-title">Countries</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-3">
            <div class="stat-card stat-card-orange">
                <div class="stat-card-body">
                    <div class="stat-card-icon">
                        <i class="fas fa-image"></i>
                    </div>
                    <div class="stat-card-content">
                        <h3 class="stat-card-number">{{ number_format($book_images) }}</h3>
                        <p class="stat-card-title">Book Images</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    


    <!-- Charts and Analytics Section -->
    <div class="row mb-4">
        <div class="col-xl-8 mb-3">
            <div class="chart-card">
                <div class="chart-card-header">
                    <h5 class="chart-card-title">
                        <i class="fas fa-chart-line me-2"></i>
                        Sales Overview
                    </h5>
                    <div class="chart-card-actions">
                        <select class="form-select form-select-sm">
                            <option>Last 7 Days</option>
                            <option>Last 30 Days</option>
                            <option>Last 3 Months</option>
                        </select>
                    </div>
                </div>
                <div class="chart-card-body">
                    <div class="chart-placeholder">
                        <div class="chart-mock">
                            <div class="chart-bar" style="height: 60%"></div>
                            <div class="chart-bar" style="height: 80%"></div>
                            <div class="chart-bar" style="height: 45%"></div>
                            <div class="chart-bar" style="height: 90%"></div>
                            <div class="chart-bar" style="height: 70%"></div>
                            <div class="chart-bar" style="height: 85%"></div>
                            <div class="chart-bar" style="height: 95%"></div>
                        </div>
                        <div class="chart-labels">
                            <span>Mon</span>
                            <span>Tue</span>
                            <span>Wed</span>
                            <span>Thu</span>
                            <span>Fri</span>
                            <span>Sat</span>
                            <span>Sun</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 mb-3">
            <div class="chart-card">
                <div class="chart-card-header">
                    <h5 class="chart-card-title">
                        <i class="fas fa-chart-pie me-2"></i>
                        Top Categories
                    </h5>
                </div>
                <div class="chart-card-body">
                    <div class="category-stats">
                        <div class="category-item">
                            <div class="category-info">
                                <span class="category-name">Fiction</span>
                                <span class="category-percentage">35%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-primary" style="width: 35%"></div>
                            </div>
                        </div>
                        <div class="category-item">
                            <div class="category-info">
                                <span class="category-name">Non-Fiction</span>
                                <span class="category-percentage">28%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-success" style="width: 28%"></div>
                            </div>
                        </div>
                        <div class="category-item">
                            <div class="category-info">
                                <span class="category-name">Science</span>
                                <span class="category-percentage">22%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" style="width: 22%"></div>
                            </div>
                        </div>
                        <div class="category-item">
                            <div class="category-info">
                                <span class="category-name">History</span>
                                <span class="category-percentage">15%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-info" style="width: 15%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity and Quick Actions -->
    <div class="row">
        <div class="col-xl-6 mb-3">
            <div class="activity-card">
                <div class="activity-card-header">
                    <h5 class="activity-card-title">
                        <i class="fas fa-clock me-2"></i>
                        Recent Activity
                    </h5>
                </div>
                <div class="activity-card-body">
                    <div class="activity-list">
                        <div class="activity-item">
                            <div class="activity-icon bg-success">
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">New book added</div>
                                <div class="activity-desc">"The Great Adventure" by John Doe</div>
                                <div class="activity-time">2 hours ago</div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon bg-primary">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">New order received</div>
                                <div class="activity-desc">Order #12345 - $89.99</div>
                                <div class="activity-time">4 hours ago</div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon bg-warning">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">New user registered</div>
                                <div class="activity-desc">jane.smith@email.com</div>
                                <div class="activity-time">6 hours ago</div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon bg-info">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">New review posted</div>
                                <div class="activity-desc">5-star rating for "Mystery Novel"</div>
                                <div class="activity-time">8 hours ago</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 mb-3">
            <div class="quick-actions-card">
                <div class="quick-actions-card-header">
                    <h5 class="quick-actions-card-title">
                        <i class="fas fa-bolt me-2"></i>
                        Quick Actions
                    </h5>
                </div>
                <div class="quick-actions-card-body">
                    <div class="quick-actions-grid">
                        <a href="{{ route('admin.books.create') }}" class="quick-action-item">
                            <div class="quick-action-icon bg-primary">
                                <i class="fas fa-plus"></i>
                            </div>
                            <span>Add New Book</span>
                        </a>
                        <a href="{{ route('admin.authors.create') }}" class="quick-action-item">
                            <div class="quick-action-icon bg-success">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <span>Add Author</span>
                        </a>
                        <a href="{{ route('admin.categories.create') }}" class="quick-action-item">
                            <div class="quick-action-icon bg-warning">
                                <i class="fas fa-tag"></i>
                            </div>
                            <span>Add Category</span>
                        </a>
                        <a href="#" class="quick-action-item">
                            <div class="quick-action-icon bg-info">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                            <span>View Reports</span>
                        </a>
                        <a href="#" class="quick-action-item">
                            <div class="quick-action-icon bg-secondary">
                                <i class="fas fa-cog"></i>
                            </div>
                            <span>Settings</span>
                        </a>
                        <a href="#" class="quick-action-item">
                            <div class="quick-action-icon bg-danger">
                                <i class="fas fa-download"></i>
                            </div>
                            <span>Export Data</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Dashboard Specific Styles */
.dashboard-container {
    max-width: 100%;
}

.welcome-section {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    color: white;
    padding: 2rem;
    border-radius: 12px;
    margin-bottom: 2rem;
}

.welcome-title {
    font-size: 1.75rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.welcome-subtitle {
    font-size: 1rem;
    opacity: 0.9;
    margin-bottom: 0;
}

.current-date {
    font-size: 0.9rem;
    opacity: 0.8;
}

/* Statistics Cards */
.stat-card {
    background: white;
    border-radius: 12px;
    padding: 1.5rem;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    border: 1px solid var(--border-color);
    transition: all 0.3s ease;
    height: 100%;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.stat-card-primary {
    border-left: 4px solid var(--primary-color);
}

.stat-card-success {
    border-left: 4px solid var(--success-color);
}

.stat-card-warning {
    border-left: 4px solid var(--warning-color);
}

.stat-card-info {
    border-left: 4px solid #0dcaf0;
}

.stat-card-secondary {
    border-left: 4px solid #6c757d;
}

.stat-card-purple {
    border-left: 4px solid #6f42c1;
}

.stat-card-teal {
    border-left: 4px solid #20c997;
}

.stat-card-orange {
    border-left: 4px solid #fd7e14;
}

.stat-card-body {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.stat-card-icon {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
    flex-shrink: 0;
}

.stat-card-primary .stat-card-icon {
    background: var(--primary-color);
}

.stat-card-success .stat-card-icon {
    background: var(--success-color);
}

.stat-card-warning .stat-card-icon {
    background: var(--warning-color);
}

.stat-card-info .stat-card-icon {
    background: #0dcaf0;
}

.stat-card-secondary .stat-card-icon {
    background: #6c757d;
}

.stat-card-purple .stat-card-icon {
    background: #6f42c1;
}

.stat-card-teal .stat-card-icon {
    background: #20c997;
}

.stat-card-orange .stat-card-icon {
    background: #fd7e14;
}

.stat-card-content {
    flex: 1;
}

.stat-card-number {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 0.25rem;
    color: var(--text-primary);
}

.stat-card-title {
    font-size: 0.9rem;
    color: var(--text-secondary);
    margin-bottom: 0.5rem;
    font-weight: 500;
}

.stat-card-trend {
    font-size: 0.8rem;
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

/* Chart Cards */
.chart-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    border: 1px solid var(--border-color);
    height: 100%;
}

.chart-card-header {
    padding: 1.5rem 1.5rem 1rem;
    border-bottom: 1px solid var(--border-color);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.chart-card-title {
    font-size: 1.1rem;
    font-weight: 600;
    margin: 0;
    color: var(--text-primary);
}

.chart-card-body {
    padding: 1.5rem;
}

/* Mock Chart */
.chart-placeholder {
    height: 200px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.chart-mock {
    display: flex;
    align-items: end;
    justify-content: space-between;
    height: 150px;
    gap: 8px;
}

.chart-bar {
    background: linear-gradient(to top, var(--primary-color), #818cf8);
    border-radius: 4px 4px 0 0;
    min-width: 30px;
    transition: all 0.3s ease;
}

.chart-bar:hover {
    background: linear-gradient(to top, var(--primary-dark), var(--primary-color));
    transform: scaleY(1.1);
}

.chart-labels {
    display: flex;
    justify-content: space-between;
    font-size: 0.8rem;
    color: var(--text-secondary);
    font-weight: 500;
}

/* Category Statistics */
.category-stats {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.category-item {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.category-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.category-name {
    font-weight: 500;
    color: var(--text-primary);
}

.category-percentage {
    font-weight: 600;
    color: var(--text-secondary);
}

.progress {
    height: 8px;
    border-radius: 4px;
    background-color: #f1f5f9;
}

.progress-bar {
    border-radius: 4px;
}

/* Activity Card */
.activity-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    border: 1px solid var(--border-color);
    height: 100%;
}

.activity-card-header {
    padding: 1.5rem 1.5rem 1rem;
    border-bottom: 1px solid var(--border-color);
}

.activity-card-title {
    font-size: 1.1rem;
    font-weight: 600;
    margin: 0;
    color: var(--text-primary);
}

.activity-card-body {
    padding: 1.5rem;
}

.activity-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.activity-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    padding: 1rem;
    border-radius: 8px;
    transition: background-color 0.3s ease;
}

.activity-item:hover {
    background-color: var(--light-bg);
}

.activity-icon {
    width: 40px;
    height: 40px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 0.9rem;
    flex-shrink: 0;
}

.activity-content {
    flex: 1;
}

.activity-title {
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 0.25rem;
}

.activity-desc {
    font-size: 0.9rem;
    color: var(--text-secondary);
    margin-bottom: 0.25rem;
}

.activity-time {
    font-size: 0.8rem;
    color: var(--text-secondary);
}

/* Quick Actions Card */
.quick-actions-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    border: 1px solid var(--border-color);
    height: 100%;
}

.quick-actions-card-header {
    padding: 1.5rem 1.5rem 1rem;
    border-bottom: 1px solid var(--border-color);
}

.quick-actions-card-title {
    font-size: 1.1rem;
    font-weight: 600;
    margin: 0;
    color: var(--text-primary);
}

.quick-actions-card-body {
    padding: 1.5rem;
}

.quick-actions-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
}

.quick-action-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.75rem;
    padding: 1.5rem 1rem;
    border-radius: 8px;
    text-decoration: none;
    color: var(--text-primary);
    transition: all 0.3s ease;
    border: 1px solid var(--border-color);
}

.quick-action-item:hover {
    background-color: var(--light-bg);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    color: var(--text-primary);
}

.quick-action-icon {
    width: 50px;
    height: 50px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
}

.quick-action-item span {
    font-weight: 500;
    text-align: center;
    font-size: 0.9rem;
}

/* Responsive Design */
@media (max-width: 768px) {
    .welcome-section {
        padding: 1.5rem;
    }
    
    .welcome-title {
        font-size: 1.5rem;
    }
    
    .stat-card-body {
        flex-direction: column;
        text-align: center;
        gap: 0.75rem;
    }
    
    .stat-card-icon {
        width: 50px;
        height: 50px;
        font-size: 1.2rem;
    }
    
    .stat-card-number {
        font-size: 1.75rem;
    }
    
    .quick-actions-grid {
        grid-template-columns: 1fr;
    }
    
    .chart-mock {
        height: 120px;
    }
    
    .chart-labels {
        font-size: 0.7rem;
    }
}

/* Animation */
.stat-card, .chart-card, .activity-card, .quick-actions-card {
    animation: slideInUp 0.6s ease-out;
}

@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.stat-card:nth-child(1) { animation-delay: 0.1s; }
.stat-card:nth-child(2) { animation-delay: 0.2s; }
.stat-card:nth-child(3) { animation-delay: 0.3s; }
.stat-card:nth-child(4) { animation-delay: 0.4s; }
</style>
@endsection

