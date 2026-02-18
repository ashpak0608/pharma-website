@extends('layouts.app')

@section('title', 'Products - Corran Pharma')

@section('content')
    <!-- Hero Section - Matching About Us -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="hero-title">Our Products</h1>
                    <p class="hero-text">High-quality pharmaceutical products for better healthcare</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Search and Filter Section -->
    <section class="py-4 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow-sm border-0 rounded-3 p-4">
                        <form action="{{ route('products') }}" method="GET" class="row g-3">
                            <div class="col-md-5">
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0">
                                        <i class="fas fa-search text-secondary"></i>
                                    </span>
                                    <input type="text" 
                                           class="form-control border-start-0 ps-0" 
                                           name="search" 
                                           placeholder="Search products by name, composition, or description..." 
                                           value="{{ request('search') }}"
                                           style="border-left: none;">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <select name="category" class="form-select">
                                    <option value="">All Categories</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-custom w-100">
                                    <i class="fas fa-filter me-2"></i>Filter Products
                                </button>
                            </div>
                            @if(request('search') || request('category'))
                            <div class="col-12">
                                <a href="{{ route('products') }}" class="text-decoration-none small">
                                    <i class="fas fa-times-circle me-1"></i>Clear Filters
                                </a>
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="py-5">
        <div class="container">
            @if($products->count() > 0)
                <!-- Results Info -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <p class="text-muted">
                            <i class="fas fa-capsules me-2 text-secondary"></i>
                            Showing {{ $products->firstItem() }}-{{ $products->lastItem() }} of {{ $products->total() }} products
                        </p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <div class="d-inline-flex align-items-center">
                            <label class="text-muted me-2">Sort by:</label>
                            <select class="form-select form-select-sm w-auto" onchange="window.location.href=this.value">
                                <option value="{{ request()->fullUrlWithQuery(['sort' => 'latest']) }}" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest</option>
                                <option value="{{ request()->fullUrlWithQuery(['sort' => 'name_asc']) }}" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name (A-Z)</option>
                                <option value="{{ request()->fullUrlWithQuery(['sort' => 'name_desc']) }}" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name (Z-A)</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="row g-4">
                    @foreach($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 border-0 shadow-sm product-card">
                            @if($product->image)
                                <img src="{{ asset($product->image) }}" class="card-img-top product-img" alt="{{ $product->name }}">
                            @else
                                <div class="product-img bg-light d-flex align-items-center justify-content-center">
                                    <i class="fas fa-capsules fa-4x text-secondary opacity-50"></i>
                                </div>
                            @endif
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <span class="badge bg-secondary px-3 py-2">{{ $product->category->name ?? 'Uncategorized' }}</span>
                                    @if($product->packaging)
                                        <small class="text-muted">
                                            <i class="fas fa-box me-1"></i>{{ $product->packaging }}
                                        </small>
                                    @endif
                                </div>
                                <h5 class="card-title fw-bold mb-2">{{ $product->name }}</h5>
                                @if($product->composition)
                                    <p class="text-muted small mb-2">
                                        <i class="fas fa-flask me-1 text-secondary"></i>{{ $product->composition }}
                                    </p>
                                @endif
                                <p class="card-text text-muted mb-3">{{ Str::limit($product->description, 80) }}</p>
                                <a href="{{ route('product.detail', $product->slug) }}" class="btn btn-outline-secondary w-100">
                                    <i class="fas fa-eye me-2"></i>View Details
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="row mt-5">
                    <div class="col-12">
                        <nav aria-label="Product pagination">
                            <ul class="pagination justify-content-center">
                                {{-- Previous Page Link --}}
                                @if($products->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link"><i class="fas fa-chevron-left"></i></span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $products->previousPageUrl() }}" rel="prev">
                                            <i class="fas fa-chevron-left"></i>
                                        </a>
                                    </li>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                                    @if($page == $products->currentPage())
                                        <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                                    @else
                                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                    @endif
                                @endforeach

                                {{-- Next Page Link --}}
                                @if($products->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $products->nextPageUrl() }}" rel="next">
                                            <i class="fas fa-chevron-right"></i>
                                        </a>
                                    </li>
                                @else
                                    <li class="page-item disabled">
                                        <span class="page-link"><i class="fas fa-chevron-right"></i></span>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Products per page selector -->
                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <form action="{{ route('products') }}" method="GET" class="d-inline-block">
                            <input type="hidden" name="search" value="{{ request('search') }}">
                            <input type="hidden" name="category" value="{{ request('category') }}">
                            <label class="text-muted me-2">Show:</label>
                            <select name="per_page" class="form-select form-select-sm d-inline-block w-auto" onchange="this.form.submit()">
                                <option value="9" {{ request('per_page', 9) == 9 ? 'selected' : '' }}>9</option>
                                <option value="15" {{ request('per_page') == 15 ? 'selected' : '' }}>15</option>
                                <option value="30" {{ request('per_page') == 30 ? 'selected' : '' }}>30</option>
                                <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                            </select>
                            <span class="text-muted ms-2">products per page</span>
                        </form>
                    </div>
                </div>
            @else
                <div class="text-center py-5">
                    <div class="mb-4">
                        <i class="fas fa-capsules fa-5x text-secondary opacity-50"></i>
                    </div>
                    <h3 class="fw-bold mb-3">No products found</h3>
                    <p class="text-muted mb-4">Try adjusting your search or filter criteria.</p>
                    <a href="{{ route('products') }}" class="btn btn-custom">
                        <i class="fas fa-sync-alt me-2"></i>View All Products
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- Brands Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="section-header">
                <h2>Our Popular Brands</h2>
                <p>Trusted by healthcare professionals across Maharashtra</p>
            </div>
            <div class="row g-3">
                @php
                    $brands = ['Ncart L', 'Roswell C', 'Pregalyt', 'CQFrac', 'Ansonac TH', 'Rich 60K', 'Tcal O', 'Rozansh'];
                @endphp
                @foreach($brands as $brand)
                <div class="col-md-3 col-6">
                    <div class="card border-0 shadow-sm text-center p-3 brand-card">
                        <h6 class="fw-bold mb-0">{{ $brand }}</h6>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5" style="background: linear-gradient(135deg, var(--primary-color) 0%, #34495e 100%); color: white;">
        <div class="container text-center">
            <h2 class="display-6 fw-bold mb-4">Need More Information?</h2>
            <p class="lead mb-4">Contact our team for product details, pricing, or any inquiries.</p>
            <a href="{{ route('contact') }}" class="btn btn-custom me-3">
                <i class="fas fa-envelope me-2"></i>Contact Us
            </a>
            <a href="{{ route('certificates') }}" class="btn btn-outline-custom">
                <i class="fas fa-certificate me-2"></i>View Certifications
            </a>
        </div>
    </section>
@endsection

@push('styles')
<style>
    .hero-section {
        background: linear-gradient(135deg, var(--primary-color) 0%, #34495e 100%);
        color: white;
        padding: 60px 0;
    }
    
    .hero-title {
        font-size: 42px;
        font-weight: 700;
        margin-bottom: 15px;
    }
    
    .hero-text {
        font-size: 18px;
        opacity: 0.95;
    }
    
    .card-custom {
        background: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        transition: all 0.3s;
        height: 100%;
    }
    
    .card-custom:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    
    .product-card {
        transition: all 0.3s;
        border-radius: 15px;
        overflow: hidden;
    }
    
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.1) !important;
    }
    
    .product-img {
        height: 200px;
        object-fit: cover;
        background: #f8f9fa;
    }
    
    .badge.bg-secondary {
        background: var(--secondary-color) !important;
        font-weight: 500;
        border-radius: 20px;
    }
    
    .btn-outline-secondary {
        border: 2px solid var(--secondary-color);
        color: var(--secondary-color);
        border-radius: 25px;
        padding: 8px 20px;
        font-weight: 500;
    }
    
    .btn-outline-secondary:hover {
        background: var(--secondary-color);
        border-color: var(--secondary-color);
        color: white;
    }
    
    .btn-custom {
        background: var(--secondary-color);
        color: white;
        padding: 12px 30px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s;
        display: inline-block;
        border: none;
    }
    
    .btn-custom:hover {
        background: #219a52;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(39, 174, 96, 0.3);
    }
    
    .btn-outline-custom {
        background: transparent;
        color: white;
        padding: 12px 30px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s;
        display: inline-block;
        border: 2px solid white;
    }
    
    .btn-outline-custom:hover {
        background: white;
        color: var(--primary-color);
        transform: translateY(-2px);
    }
    
    .pagination .page-link {
        color: var(--secondary-color);
        border: none;
        padding: 10px 15px;
        margin: 0 3px;
        border-radius: 8px;
        font-weight: 500;
    }
    
    .pagination .page-link:hover {
        background: rgba(39, 174, 96, 0.1);
        color: var(--secondary-color);
    }
    
    .pagination .active .page-link {
        background: var(--secondary-color);
        color: white;
    }
    
    .form-control, .form-select {
        border: 2px solid #e9ecef;
        border-radius: 10px;
        padding: 10px 15px;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: var(--secondary-color);
        box-shadow: 0 0 0 0.2rem rgba(39, 174, 96, 0.1);
    }
    
    .input-group-text {
        border: 2px solid #e9ecef;
        border-right: none;
        border-radius: 10px 0 0 10px;
        background: white;
    }
    
    .brand-card {
        transition: all 0.3s;
        border-radius: 10px;
        padding: 15px;
    }
    
    .brand-card:hover {
        background: var(--secondary-color);
        color: white;
        transform: translateY(-3px);
    }
    
    .brand-card:hover h6 {
        color: white !important;
    }
    
    .section-header h2 {
        color: var(--heading-color);
        font-size: 36px;
        font-weight: 700;
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
    }
    
    .section-header h2:after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: var(--secondary-color);
        border-radius: 2px;
    }
    
    .section-header p {
        color: #666;
        font-size: 18px;
        margin-top: 20px;
    }
    
    .text-secondary {
        color: var(--secondary-color) !important;
    }
</style>
@endpush