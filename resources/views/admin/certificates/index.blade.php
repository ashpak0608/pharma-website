@extends('admin.layouts.app')

@section('title', 'Certificates')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-2">Certificates Management</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Certificates</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('admin.certificates.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Add New Certificate
        </a>
    </div>

    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm bg-gradient-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="small opacity-75">Total Certificates</span>
                            <h3 class="mt-2 mb-0">{{ $certificates->total() }}</h3>
                        </div>
                        <i class="fas fa-certificate fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm bg-gradient-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="small opacity-75">Last Added</span>
                            <h6 class="mt-2 mb-0">{{ $certificates->first() ? $certificates->first()->created_at->format('d M Y') : 'N/A' }}</h6>
                        </div>
                        <i class="fas fa-calendar-check fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters Card -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('admin.certificates.index') }}" method="GET" class="row g-3">
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="fas fa-search text-primary"></i>
                        </span>
                        <input type="text" 
                               class="form-control border-start-0" 
                               name="search" 
                               placeholder="Search certificates by title or description..." 
                               value="{{ request('search') }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-filter me-2"></i>Filter
                    </button>
                </div>
                @if(request()->has('search') && !empty(request('search')))
                <div class="col-12">
                    <a href="{{ route('admin.certificates.index') }}" class="text-decoration-none small">
                        <i class="fas fa-times-circle me-1"></i>Clear Search
                    </a>
                </div>
                @endif
            </form>
        </div>
    </div>

    <!-- Certificates Grid -->
    <div class="row g-4">
        @forelse($certificates as $certificate)
        <div class="col-md-4">
            <div class="card border-0 shadow-sm certificate-card h-100">
                <div class="card-body text-center p-4">
                    <!-- Certificate Image -->
                    <div class="certificate-image-wrapper mb-3">
                        @if($certificate->image)
                            <img src="{{ asset($certificate->image) }}" 
                                 alt="{{ $certificate->title }}" 
                                 class="certificate-image"
                                 style="max-height: 120px; object-fit: contain;">
                        @else
                            <div class="no-image-placeholder">
                                <i class="fas fa-certificate fa-4x text-muted opacity-50"></i>
                            </div>
                        @endif
                    </div>

                    <!-- Certificate Title -->
                    <h5 class="fw-bold mb-2">{{ $certificate->title }}</h5>
                    
                    <!-- Certificate Description -->
                    @if($certificate->description)
                        <p class="text-muted small mb-3">{{ Str::limit($certificate->description, 80) }}</p>
                    @endif

                    <!-- Meta Info -->
                    <div class="d-flex justify-content-center gap-3 mb-3">
                        <span class="badge bg-light text-dark px-3 py-2">
                            <i class="far fa-calendar-alt me-1"></i>
                            {{ $certificate->created_at->format('d M Y') }}
                        </span>
                    </div>

                    <!-- Actions -->
                    <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('admin.certificates.edit', $certificate) }}" 
                           class="btn btn-sm btn-primary px-3">
                            <i class="fas fa-edit me-1"></i>Edit
                        </a>
                        <form action="{{ route('admin.certificates.destroy', $certificate) }}" 
                              method="POST" 
                              class="d-inline"
                              onsubmit="return confirm('Are you sure you want to delete this certificate?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger px-3">
                                <i class="fas fa-trash me-1"></i>Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center py-5">
                    <i class="fas fa-certificate fa-4x text-muted mb-3"></i>
                    <h6 class="text-muted">No certificates found</h6>
                    @if(request()->has('search') && !empty(request('search')))
                    <a href="{{ route('admin.certificates.index') }}" class="btn btn-secondary mt-3">
                        <i class="fas fa-times me-2"></i>Clear Search
                    </a>
                    @else
                    <a href="{{ route('admin.certificates.create') }}" class="btn btn-primary mt-3">
                        <i class="fas fa-plus me-2"></i>Add Your First Certificate
                    </a>
                    @endif
                </div>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($certificates instanceof \Illuminate\Pagination\LengthAwarePaginator && $certificates->hasPages())
    <div class="d-flex justify-content-between align-items-center mt-4">
        <div class="text-muted small">
            Showing {{ $certificates->firstItem() }} to {{ $certificates->lastItem() }} of {{ $certificates->total() }} certificates
        </div>
        <div>
            {{ $certificates->links() }}
        </div>
    </div>
    @endif
</div>

@push('styles')
<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .bg-gradient-success {
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
    }
    
    .certificate-card {
        transition: all 0.3s;
        border-radius: 15px;
        overflow: hidden;
    }
    
    .certificate-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.1) !important;
    }
    
    .certificate-image-wrapper {
        height: 120px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8f9fa;
        border-radius: 10px;
        padding: 10px;
    }
    
    .no-image-placeholder {
        width: 100%;
        height: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8f9fa;
        border-radius: 10px;
    }
    
    .form-control {
        border: 2px solid #e9ecef;
        border-radius: 10px;
        padding: 10px 15px;
    }
    
    .form-control:focus {
        border-color: var(--secondary-color);
        box-shadow: 0 0 0 0.2rem rgba(39, 174, 96, 0.1);
    }
    
    .input-group-text {
        border: 2px solid #e9ecef;
        border-right: none;
        border-radius: 10px 0 0 10px;
    }
    
    .btn-primary {
        background: var(--secondary-color);
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 500;
    }
    
    .btn-primary:hover {
        background: #219a52;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(39, 174, 96, 0.3);
    }
    
    .pagination {
        gap: 5px;
    }
    
    .page-link {
        border: none;
        border-radius: 8px;
        padding: 0.5rem 1rem;
        color: var(--secondary-color);
        font-weight: 500;
    }
    
    .page-link:hover {
        background: rgba(39, 174, 96, 0.1);
        color: var(--secondary-color);
    }
    
    .page-item.active .page-link {
        background: var(--secondary-color);
        color: white;
    }
</style>
@endpush
@endsection