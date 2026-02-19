@extends('admin.layouts.app')

@section('title', 'Products')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-2">Products Management</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Products</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Add New Product
        </a>
    </div>

    <!-- Filters Card -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('admin.products.index') }}" method="GET" class="row g-3">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="fas fa-search text-primary"></i>
                        </span>
                        <input type="text" 
                               class="form-control border-start-0" 
                               name="search" 
                               placeholder="Search products..." 
                               value="{{ request('search') }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <select name="category" class="form-select">
                        <option value="">All Categories</option>
                        @foreach(\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
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
                @if(request()->anyFilled(['search', 'category', 'status']))
                <div class="col-12">
                    <a href="{{ route('admin.products.index') }}" class="text-decoration-none small">
                        <i class="fas fa-times-circle me-1"></i>Clear Filters
                    </a>
                </div>
                @endif
            </form>
        </div>
    </div>

    <!-- Products Table Card -->
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="bg-light">
                        <tr>
                            <th style="width: 50px">#</th>
                            <th style="width: 80px">Image</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Composition</th>
                            <th>Packaging</th>
                            <th style="width: 100px">Status</th>
                            <th style="width: 150px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $index => $product)
                        <tr>
                            <td>{{ $products->firstItem() + $index }}</td>
                            <td>
                                @if($product->image)
                                    <img src="{{ asset($product->image) }}" 
                                         alt="{{ $product->name }}" 
                                         class="rounded" 
                                         style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                         style="width: 50px; height: 50px;">
                                        <i class="fas fa-capsules text-muted"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="fw-semibold">{{ $product->name }}</div>
                                <small class="text-muted">Slug: {{ $product->slug }}</small>
                            </td>
                            <td>
                                <span class="badge bg-info text-white px-3 py-2">
                                    {{ $product->category->name ?? 'Uncategorized' }}
                                </span>
                            </td>
                            <td>
                                <small>{{ Str::limit($product->composition, 30) }}</small>
                            </td>
                            <td>
                                <small>{{ $product->packaging ?? 'Not specified' }}</small>
                            </td>
                            <td>
                                @if($product->status)
                                    <span class="badge bg-success px-3 py-2">Active</span>
                                @else
                                    <span class="badge bg-danger px-3 py-2">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.products.edit', $product) }}" 
                                       class="btn btn-sm btn-primary" 
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('product.detail', $product->slug) }}" 
                                       target="_blank"
                                       class="btn btn-sm btn-info text-white" 
                                       title="View on Website">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <form action="{{ route('admin.products.destroy', $product) }}" 
                                          method="POST" 
                                          class="d-inline"
                                          onsubmit="return confirm('Are you sure you want to delete this product?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-5">
                                <i class="fas fa-capsules fa-4x text-muted mb-3"></i>
                                <h6 class="text-muted">No products found</h6>
                                @if(request()->anyFilled(['search', 'category', 'status']))
                                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary mt-3">
                                    <i class="fas fa-times me-2"></i>Clear Filters
                                </a>
                                @else
                                <a href="{{ route('admin.products.create') }}" class="btn btn-primary mt-3">
                                    <i class="fas fa-plus me-2"></i>Add Your First Product
                                </a>
                                @endif
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination and Info -->
            @if($products instanceof \Illuminate\Pagination\LengthAwarePaginator && $products->hasPages())
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="text-muted small">
                    Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} products
                </div>
                <div>
                    {{ $products->links() }}
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
        border-bottom-width: 1px;
        color: #495057;
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
    
    .bg-info {
        background-color: #17a2b8 !important;
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
    
    .pagination {
        gap: 5px;
        margin: 0;
    }
    
    .page-link {
        border: none;
        border-radius: 8px;
        padding: 0.5rem 1rem;
        color: var(--secondary-color);
        font-weight: 500;
        transition: all 0.3s;
    }
    
    .page-link:hover {
        background: rgba(39, 174, 96, 0.1);
        color: var(--secondary-color);
        transform: translateY(-2px);
    }
    
    .page-item.active .page-link {
        background: var(--secondary-color);
        color: white;
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
</style>
@endpush
@endsection