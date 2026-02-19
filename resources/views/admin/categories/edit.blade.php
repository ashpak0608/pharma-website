@extends('admin.layouts.app')

@section('title', 'Edit Category')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-2">Edit Category: {{ $category->name }}</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Categories</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Categories
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data" id="categoryForm">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-8">
                        <!-- Main Form Card -->
                        <div class="card border-0 bg-light mb-4">
                            <div class="card-body">
                                <h6 class="fw-bold mb-3">
                                    <i class="fas fa-info-circle me-2 text-primary"></i>
                                    Category Information
                                </h6>
                                
                                <div class="mb-3">
                                    <label for="name" class="form-label">
                                        Category Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('name') is-invalid @enderror" 
                                           id="name" 
                                           name="name" 
                                           value="{{ old('name', $category->name) }}" 
                                           required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" 
                                           class="form-control bg-light" 
                                           id="slug" 
                                           name="slug" 
                                           value="{{ old('slug', $category->slug) }}" 
                                           readonly>
                                    <small class="text-muted">
                                        <i class="fas fa-link me-1"></i>
                                        /products/{{ $category->slug }}
                                    </small>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" 
                                              id="description" 
                                              name="description" 
                                              rows="5">{{ old('description', $category->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Category Stats Card -->
                        <div class="card border-0 bg-light">
                            <div class="card-body">
                                <h6 class="fw-bold mb-3">
                                    <i class="fas fa-chart-bar me-2 text-primary"></i>
                                    Category Statistics
                                </h6>
                                <div class="row g-3">
                                    <div class="col-6">
                                        <div class="stat-box bg-white p-3 rounded text-center">
                                            <div class="small text-muted">Total Products</div>
                                            <div class="h3 mb-0 text-primary">{{ $category->products->count() }}</div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="stat-box bg-white p-3 rounded text-center">
                                            <div class="small text-muted">Active Products</div>
                                            <div class="h3 mb-0 text-success">{{ $category->products->where('status', 1)->count() }}</div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="stat-box bg-white p-3 rounded text-center">
                                            <div class="small text-muted">Created</div>
                                            <div class="fw-semibold">{{ $category->created_at->format('d M Y') }}</div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="stat-box bg-white p-3 rounded text-center">
                                            <div class="small text-muted">Last Updated</div>
                                            <div class="fw-semibold">{{ $category->updated_at->format('d M Y') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <!-- Image Upload Card -->
                        <div class="card border-0 bg-light mb-4">
                            <div class="card-body">
                                <h6 class="fw-bold mb-3">
                                    <i class="fas fa-image me-2 text-primary"></i>
                                    Category Image
                                </h6>
                                
                                <!-- Current Image -->
                                @if($category->image)
                                <div class="mb-3">
                                    <label class="form-label text-muted small">Current Image</label>
                                    <div class="border rounded p-2 bg-white text-center">
                                        <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" class="img-fluid" style="max-height: 100px;">
                                    </div>
                                </div>
                                @endif

                                <!-- Image Preview -->
                                <div class="text-center mb-3">
                                    <div id="imagePreview" class="image-preview rounded bg-white p-3 d-none">
                                        <img id="preview" src="#" alt="Preview" class="img-fluid" style="max-height: 150px;">
                                    </div>
                                    <div id="noImagePreview" class="no-image-preview bg-white rounded p-4 text-center {{ $category->image ? 'd-none' : '' }}">
                                        <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-2"></i>
                                        <p class="text-muted small mb-0">Upload new image</p>
                                    </div>
                                </div>

                                <!-- File Input -->
                                <div class="mb-3">
                                    <label for="image" class="form-label">Change Image</label>
                                    <input type="file" 
                                           class="form-control @error('image') is-invalid @enderror" 
                                           id="image" 
                                           name="image" 
                                           accept="image/*"
                                           onchange="previewImage(this)">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted d-block mt-1">
                                        <i class="fas fa-info-circle"></i> 
                                        Leave empty to keep current image
                                    </small>
                                </div>
                            </div>
                        </div>

                        <!-- Status Card -->
                        <div class="card border-0 bg-light mb-4">
                            <div class="card-body">
                                <h6 class="fw-bold mb-3">
                                    <i class="fas fa-toggle-on me-2 text-primary"></i>
                                    Status
                                </h6>
                                <div class="form-check form-switch">
                                    <input type="checkbox" 
                                           class="form-check-input" 
                                           id="status" 
                                           name="status" 
                                           value="1" 
                                           {{ old('status', $category->status) ? 'checked' : '' }}>
                                    <label class="form-check-label fw-semibold" for="status">Active</label>
                                </div>
                            </div>
                        </div>

                        <!-- Products in this Category -->
                        @if($category->products->count() > 0)
                        <div class="card border-0 bg-light">
                            <div class="card-body">
                                <h6 class="fw-bold mb-3">
                                    <i class="fas fa-capsules me-2 text-primary"></i>
                                    Products in this Category
                                </h6>
                                <div class="product-list">
                                    @foreach($category->products->take(5) as $product)
                                    <div class="d-flex align-items-center mb-2 p-2 bg-white rounded">
                                        <div class="flex-shrink-0 me-2">
                                            @if($product->image)
                                                <img src="{{ asset($product->image) }}" alt="" style="width: 30px; height: 30px; object-fit: cover;" class="rounded">
                                            @else
                                                <div class="bg-light rounded" style="width: 30px; height: 30px;"></div>
                                            @endif
                                        </div>
                                        <div class="flex-grow-1 small">
                                            <div class="fw-semibold">{{ Str::limit($product->name, 20) }}</div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @if($category->products->count() > 5)
                                    <div class="text-center mt-2">
                                        <small class="text-muted">+ {{ $category->products->count() - 5 }} more</small>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <hr class="my-4">

                <!-- Form Actions -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary px-4">
                        <i class="fas fa-times me-2"></i>Cancel
                    </a>
                    <button type="submit" class="btn btn-primary px-4" id="submitBtn">
                        <i class="fas fa-save me-2"></i>Update Category
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Danger Zone -->
    @if($category->products->count() == 0)
    <div class="card border-0 shadow-sm mt-4 border-danger">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fw-bold text-danger mb-1">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        Danger Zone
                    </h6>
                    <p class="text-muted small mb-0">Once you delete this category, there is no going back.</p>
                </div>
                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category? This action cannot be undone.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">
                        <i class="fas fa-trash me-2"></i>Delete Category
                    </button>
                </form>
            </div>
        </div>
    </div>
    @else
    <div class="card border-0 shadow-sm mt-4 border-warning">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <i class="fas fa-exclamation-circle text-warning fa-2x me-3"></i>
                <div>
                    <h6 class="fw-bold text-warning mb-1">Cannot Delete Category</h6>
                    <p class="text-muted small mb-0">
                        This category has {{ $category->products->count() }} product(s). 
                        Please reassign or delete these products before deleting this category.
                    </p>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

@push('styles')
<style>
    .image-preview {
        border: 2px dashed #dee2e6;
        transition: all 0.3s;
        min-height: 150px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .no-image-preview {
        border: 2px dashed #dee2e6;
        background: white;
        min-height: 150px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    
    .form-control, .form-select {
        border: 2px solid #e9ecef;
        border-radius: 10px;
        padding: 12px 15px;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: var(--secondary-color);
        box-shadow: 0 0 0 0.2rem rgba(39, 174, 96, 0.1);
    }
    
    .btn-primary {
        background: var(--secondary-color);
        border: none;
        padding: 12px 30px;
        border-radius: 8px;
        font-weight: 500;
    }
    
    .btn-primary:hover {
        background: #219a52;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(39, 174, 96, 0.3);
    }
    
    .btn-outline-danger {
        border: 2px solid #dc3545;
        border-radius: 8px;
        padding: 12px 30px;
        font-weight: 500;
    }
    
    .btn-outline-danger:hover {
        background: #dc3545;
        color: white;
        transform: translateY(-2px);
    }
    
    .border-danger {
        border-left: 4px solid #dc3545 !important;
    }
    
    .border-warning {
        border-left: 4px solid #ffc107 !important;
    }
    
    .stat-box {
        transition: all 0.3s;
    }
    
    .stat-box:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .product-list {
        max-height: 200px;
        overflow-y: auto;
    }
</style>
@endpush

@push('scripts')
<script>
function previewImage(input) {
    const preview = document.getElementById('preview');
    const previewContainer = document.getElementById('imagePreview');
    const noImagePreview = document.getElementById('noImagePreview');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            preview.src = e.target.result;
            previewContainer.classList.remove('d-none');
            noImagePreview.classList.add('d-none');
        }
        
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.src = '#';
        previewContainer.classList.add('d-none');
        noImagePreview.classList.remove('d-none');
    }
}

// Form submission with loading state
document.getElementById('categoryForm').addEventListener('submit', function(e) {
    const submitBtn = document.getElementById('submitBtn');
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Updating...';
});
</script>
@endpush
@endsection