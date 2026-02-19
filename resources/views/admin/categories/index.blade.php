@extends('admin.layouts.app')

@section('title', 'Categories')

@section('content')
<div class="container-fluid">
    <!-- Page Header - Make this match Products page exactly -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-2">Categories Management</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Categories</li>
                </ol>
            </nav>
        </div>
        <!-- Add New Category Button - Same style as Products page -->
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Add New Category
        </a>
    </div>

    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="small text-white opacity-75">Total Categories</span>
                            <h3 class="mt-2 mb-0 text-white">{{ \App\Models\Category::count() }}</h3>
                        </div>
                        <i class="fas fa-tags fa-3x text-white opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="small text-white opacity-75">Active Categories</span>
                            <h3 class="mt-2 mb-0 text-white">{{ \App\Models\Category::where('status', 1)->count() }}</h3>
                        </div>
                        <i class="fas fa-check-circle fa-3x text-white opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #3b8cff 0%, #2b78c4 100%);">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="small text-white opacity-75">Total Products</span>
                            <h3 class="mt-2 mb-0 text-white">{{ \App\Models\Product::count() }}</h3>
                        </div>
                        <i class="fas fa-capsules fa-3x text-white opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters Card - Match Products page styling -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('admin.categories.index') }}" method="GET" class="row g-3">
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="fas fa-search text-primary"></i>
                        </span>
                        <input type="text" 
                               class="form-control border-start-0" 
                               name="search" 
                               placeholder="Search categories by name or description..." 
                               value="{{ request('search') }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <select name="status" class="form-select">
                        <option value="">All Status</option>
                        <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-filter me-2"></i>Filter
                    </button>
                </div>
                @if(request()->anyFilled(['search', 'status']))
                <div class="col-12">
                    <a href="{{ route('admin.categories.index') }}" class="text-decoration-none small">
                        <i class="fas fa-times-circle me-1"></i>Clear Filters
                    </a>
                </div>
                @endif
            </form>
        </div>
    </div>

    <!-- Categories Table Card - Match Products page exactly -->
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="bg-light">
                        <tr>
                            <th style="width: 50px">#</th>
                            <th style="width: 80px">IMAGE</th>
                            <th>CATEGORY NAME</th>
                            <th>SLUG</th>
                            <th>DESCRIPTION</th>
                            <th style="width: 100px">PRODUCTS</th>
                            <th style="width: 100px">STATUS</th>
                            <th style="width: 150px">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $index => $category)
                        <tr>
                            <td>{{ $categories->firstItem() + $index }}</td>
                            <td>
                                @if($category->image)
                                    <img src="{{ asset($category->image) }}" 
                                         alt="{{ $category->name }}" 
                                         class="rounded" 
                                         style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                         style="width: 50px; height: 50px;">
                                        <i class="fas fa-tag text-muted"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="fw-semibold">{{ $category->name }}</div>
                            </td>
                            <td>
                                <code class="text-muted small">{{ $category->slug }}</code>
                            </td>
                            <td>
                                <span class="text-muted small">{{ Str::limit($category->description, 50) }}</span>
                            </td>
                            <td>
                                <span class="badge bg-info text-white px-3 py-2">
                                    {{ $category->products->count() }}
                                </span>
                            </td>
                            <td>
                                @if($category->status)
                                    <span class="badge bg-success px-3 py-2">Active</span>
                                @else
                                    <span class="badge bg-danger px-3 py-2">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.categories.edit', $category) }}" 
                                       class="btn btn-sm btn-primary" 
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @if($category->products->count() == 0)
                                    <form action="{{ route('admin.categories.destroy', $category) }}" 
                                          method="POST" 
                                          class="d-inline"
                                          onsubmit="return confirm('Are you sure you want to delete this category?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    @else
                                    <button type="button" 
                                            class="btn btn-sm btn-secondary" 
                                            title="Cannot delete - has products"
                                            disabled>
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-5">
                                <i class="fas fa-tags fa-4x text-muted mb-3"></i>
                                <h6 class="text-muted">No categories found</h6>
                                @if(request()->anyFilled(['search', 'status']))
                                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary mt-3">
                                    <i class="fas fa-times me-2"></i>Clear Filters
                                </a>
                                @else
                                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mt-3">
                                    <i class="fas fa-plus me-2"></i>Add Your First Category
                                </a>
                                @endif
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination and Info -->
            @if($categories instanceof \Illuminate\Pagination\LengthAwarePaginator && $categories->hasPages())
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="text-muted small">
                    Showing {{ $categories->firstItem() }} to {{ $categories->lastItem() }} of {{ $categories->total() }} categories
                </div>
                <div>
                    {{ $categories->links() }}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@push('styles')
<style>
    .table thead th {
        font-weight: 600;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #495057;
        border-bottom-width: 1px;
    }
    
    .table td {
        vertical-align: middle;
        font-size: 14px;
    }
    
    .btn-group .btn {
        padding: 0.4rem 0.6rem;
        margin: 0 2px;
        border-radius: 6px !important;
    }
    
    .badge {
        font-weight: 500;
        border-radius: 20px;
    }
    
    .form-control, .form-select {
        border: 2px solid #e9ecef;
        border-radius: 10px;
        padding: 10px 15px;
        transition: all 0.3s;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: var(--secondary-color);
        box-shadow: 0 0 0 0.2rem rgba(39, 174, 96, 0.1);
        outline: none;
    }
    
    .input-group-text {
        border: 2px solid #e9ecef;
        border-right: none;
        border-radius: 10px 0 0 10px;
        background: white;
    }
    
    .form-control.border-start-0 {
        border-left: none !important;
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
    
    code {
        background: #f8f9fa;
        padding: 3px 6px;
        border-radius: 4px;
    }
</style>
@endpush
@endsection