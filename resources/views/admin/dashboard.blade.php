@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-2">Dashboard</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
        </div>
        <div class="text-muted">
            <i class="fas fa-calendar-alt me-2"></i>{{ date('l, F j, Y') }}
        </div>
    </div>

    <!-- Stats Cards Row -->
    <div class="row g-4 mb-4">
        <!-- Categories Card -->
        <div class="col-xl-3 col-md-6">
            <div class="stats-card bg-gradient-primary">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="stats-label">Categories</span>
                        <div class="stats-number">{{ $totalCategories }}</div>
                        <a href="{{ route('admin.categories.index') }}" class="stats-link">
                            View Details <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                    <div class="stats-icon">
                        <i class="fas fa-tags"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Card -->
        <div class="col-xl-3 col-md-6">
            <div class="stats-card bg-gradient-success">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="stats-label">Products</span>
                        <div class="stats-number">{{ $totalProducts }}</div>
                        <a href="{{ route('admin.products.index') }}" class="stats-link">
                            View Details <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                    <div class="stats-icon">
                        <i class="fas fa-capsules"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Inquiries Card -->
        <div class="col-xl-3 col-md-6">
            <div class="stats-card bg-gradient-info">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="stats-label">Inquiries</span>
                        <div class="stats-number">{{ $totalInquiries }}</div>
                        <a href="{{ route('admin.inquiries.index') }}" class="stats-link">
                            View Details <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                    <div class="stats-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Certificates Card -->
        <div class="col-xl-3 col-md-6">
            <div class="stats-card bg-gradient-warning">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="stats-label">Certificates</span>
                        <div class="stats-number">{{ $totalCertificates }}</div>
                        <a href="{{ route('admin.certificates.index') }}" class="stats-link">
                            View Details <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                    <div class="stats-icon">
                        <i class="fas fa-certificate"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Second Row - Additional Stats -->
    <div class="row g-4 mb-4">
        <!-- Unread Inquiries Card -->
        <div class="col-xl-3 col-md-6">
            <div class="stats-card bg-gradient-danger">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="stats-label">Unread Inquiries</span>
                        <div class="stats-number">{{ \App\Models\Inquiry::where('status', 0)->count() }}</div>
                        <a href="{{ route('admin.inquiries.index') }}?status=unread" class="stats-link">
                            View Unread <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                    <div class="stats-icon">
                        <i class="fas fa-envelope-open-text"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Active Products Card -->
        <div class="col-xl-3 col-md-6">
            <div class="stats-card bg-gradient-secondary">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="stats-label">Active Products</span>
                        <div class="stats-number">{{ \App\Models\Product::where('status', 1)->count() }}</div>
                        <a href="{{ route('admin.products.index') }}?status=active" class="stats-link">
                            View Active <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                    <div class="stats-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Active Categories Card -->
        <div class="col-xl-3 col-md-6">
            <div class="stats-card bg-gradient-dark">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="stats-label">Active Categories</span>
                        <div class="stats-number">{{ \App\Models\Category::where('status', 1)->count() }}</div>
                        <a href="{{ route('admin.categories.index') }}?status=active" class="stats-link">
                            View Active <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                    <div class="stats-icon">
                        <i class="fas fa-check-double"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Settings Card -->
        <div class="col-xl-3 col-md-6">
            <div class="stats-card bg-gradient-purple">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="stats-label">Settings</span>
                        <div class="stats-number">{{ $totalSettings ?? \App\Models\Setting::count() }}</div>
                        <a href="{{ route('admin.settings.index') }}" class="stats-link">
                            Manage <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                    <div class="stats-icon">
                        <i class="fas fa-cog"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row g-4 mb-4">
        <div class="col-xl-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0"><i class="fas fa-chart-line me-2 text-primary"></i>Activity Overview</h5>
                </div>
                <div class="card-body">
                    <canvas id="activityChart" height="100"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0"><i class="fas fa-chart-pie me-2 text-primary"></i>Distribution</h5>
                </div>
                <div class="card-body">
                    <canvas id="distributionChart" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Inquiries Table -->
    <div class="row g-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="fw-bold mb-0"><i class="fas fa-clock me-2 text-primary"></i>Recent Inquiries</h5>
                    </div>
                    <a href="{{ route('admin.inquiries.index') }}" class="btn btn-sm btn-outline-primary">
                        View All <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
                <div class="card-body">
                    @if($recentInquiries->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentInquiries as $index => $inquiry)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <div class="fw-semibold">{{ $inquiry->name }}</div>
                                        </td>
                                        <td>{{ $inquiry->email }}</td>
                                        <td>{{ $inquiry->phone }}</td>
                                        <td>
                                            <span class="text-muted small">
                                                <i class="far fa-calendar-alt me-1"></i>{{ $inquiry->created_at->format('d M Y') }}
                                                <br>
                                                <i class="far fa-clock me-1"></i>{{ $inquiry->created_at->format('h:i A') }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($inquiry->status)
                                                <span class="badge bg-success px-3 py-2">Read</span>
                                            @else
                                                <span class="badge bg-warning text-dark px-3 py-2">Unread</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.inquiries.show', $inquiry) }}" class="btn btn-sm btn-info text-white" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            @if(!$inquiry->status)
                                            <form action="{{ route('admin.inquiries.mark-read', $inquiry) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success" title="Mark as Read">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-inbox fa-4x text-muted mb-3"></i>
                            <h6 class="text-muted">No inquiries yet</h6>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions Row -->
    <div class="row g-4 mt-2">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0"><i class="fas fa-bolt me-2 text-primary"></i>Quick Actions</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-3 col-6">
                            <a href="{{ route('admin.products.create') }}" class="quick-action-card text-decoration-none">
                                <i class="fas fa-plus-circle text-success"></i>
                                <span>Add Product</span>
                            </a>
                        </div>
                        <div class="col-md-3 col-6">
                            <a href="{{ route('admin.categories.create') }}" class="quick-action-card text-decoration-none">
                                <i class="fas fa-folder-plus text-primary"></i>
                                <span>Add Category</span>
                            </a>
                        </div>
                        <div class="col-md-3 col-6">
                            <a href="{{ route('admin.certificates.create') }}" class="quick-action-card text-decoration-none">
                                <i class="fas fa-certificate text-warning"></i>
                                <span>Add Certificate</span>
                            </a>
                        </div>
                        <div class="col-md-3 col-6">
                            <a href="{{ route('admin.settings.index') }}" class="quick-action-card text-decoration-none">
                                <i class="fas fa-cog text-info"></i>
                                <span>Update Settings</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    /* Stats Cards */
    .stats-card {
        padding: 25px;
        border-radius: 15px;
        color: white;
        transition: transform 0.3s, box-shadow 0.3s;
        position: relative;
        overflow: hidden;
    }
    
    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.2);
    }
    
    .stats-card::after {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200px;
        height: 200px;
        background: rgba(255,255,255,0.1);
        border-radius: 50%;
        transition: all 0.5s;
    }
    
    .stats-card:hover::after {
        transform: scale(1.2);
    }
    
    .stats-label {
        font-size: 14px;
        opacity: 0.9;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    
    .stats-number {
        font-size: 42px;
        font-weight: 800;
        line-height: 1.2;
        margin: 10px 0;
    }
    
    .stats-link {
        color: white;
        text-decoration: none;
        font-size: 14px;
        opacity: 0.9;
        transition: opacity 0.3s;
    }
    
    .stats-link:hover {
        color: white;
        opacity: 1;
    }
    
    .stats-icon {
        font-size: 60px;
        opacity: 0.5;
        transition: all 0.3s;
    }
    
    .stats-card:hover .stats-icon {
        transform: scale(1.1);
        opacity: 0.8;
    }
    
    /* Gradient Backgrounds */
    .bg-gradient-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .bg-gradient-success {
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
    }
    
    .bg-gradient-info {
        background: linear-gradient(135deg, #3b8cff 0%, #2b78c4 100%);
    }
    
    .bg-gradient-warning {
        background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
    }
    
    .bg-gradient-danger {
        background: linear-gradient(135deg, #f83600 0%, #f9d423 100%);
    }
    
    .bg-gradient-secondary {
        background: linear-gradient(135deg, #757f9a 0%, #d7dde8 100%);
    }
    
    .bg-gradient-dark {
        background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
    }
    
    .bg-gradient-purple {
        background: linear-gradient(135deg, #a8c0ff 0%, #3f2b96 100%);
    }
    
    /* Table Styles */
    .table {
        margin-bottom: 0;
    }
    
    .table thead th {
        font-weight: 600;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom-width: 1px;
    }
    
    .badge {
        font-weight: 500;
        border-radius: 30px;
    }
    
    /* Quick Action Cards */
    .quick-action-card {
        display: block;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 12px;
        text-align: center;
        transition: all 0.3s;
    }
    
    .quick-action-card:hover {
        background: var(--secondary-color);
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(39, 174, 96, 0.2);
    }
    
    .quick-action-card i {
        font-size: 32px;
        display: block;
        margin-bottom: 10px;
    }
    
    .quick-action-card span {
        color: var(--primary-color);
        font-weight: 500;
        font-size: 14px;
    }
    
    .quick-action-card:hover span {
        color: white;
    }
    
    .quick-action-card:hover i {
        color: white !important;
    }
    
    /* Card Styles */
    .card {
        border-radius: 15px;
        overflow: hidden;
    }
    
    .card-header {
        padding: 1.25rem 1.5rem;
    }
    
    /* Breadcrumb */
    .breadcrumb {
        background: transparent;
        padding: 0;
        margin: 0;
    }
    
    .breadcrumb-item a {
        color: var(--secondary-color);
        text-decoration: none;
    }
    
    .breadcrumb-item.active {
        color: #6c757d;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Activity Chart
    const ctx1 = document.getElementById('activityChart').getContext('2d');
    new Chart(ctx1, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Inquiries',
                data: [12, 19, 15, 17, 14, 13, 15, 20, 18, 22, 25, 20],
                borderColor: '#27ae60',
                backgroundColor: 'rgba(39, 174, 96, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    // Distribution Chart
    const ctx2 = document.getElementById('distributionChart').getContext('2d');
    new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: ['Categories', 'Products', 'Certificates'],
            datasets: [{
                data: [{{ $totalCategories }}, {{ $totalProducts }}, {{ $totalCertificates }}],
                backgroundColor: ['#667eea', '#43e97b', '#fa709a'],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>
@endpush
@endsection