@extends('admin.layouts.app')

@section('title', 'Add Product')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-2">Add New Product</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Products
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" id="productForm">
                @csrf

                <div class="row">
                    <div class="col-md-8">
                        <!-- Basic Information Card -->
                        <div class="card border-0 bg-light mb-4">
                            <div class="card-body">
                                <h6 class="fw-bold mb-3"><i class="fas fa-info-circle me-2 text-primary"></i>Basic Information</h6>
                                
                                <div class="mb-3">
                                    <label for="category_id" class="form-label">Category <span class="text-danger">*</span></label>
                                    <select class="form-select @error('category_id') is-invalid @enderror" 
                                            id="category_id" 
                                            name="category_id" 
                                            required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label">Product Name <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control @error('name') is-invalid @enderror" 
                                           id="name" 
                                           name="name" 
                                           value="{{ old('name') }}" 
                                           placeholder="Enter product name"
                                           required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="composition" class="form-label">Composition</label>
                                    <input type="text" 
                                           class="form-control @error('composition') is-invalid @enderror" 
                                           id="composition" 
                                           name="composition" 
                                           value="{{ old('composition') }}" 
                                           placeholder="e.g., Paracetamol IP 500mg">
                                    @error('composition')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Active ingredients and their strengths</small>
                                </div>
                            </div>
                        </div>

                        <!-- Description Card -->
                        <div class="card border-0 bg-light mb-4">
                            <div class="card-body">
                                <h6 class="fw-bold mb-3"><i class="fas fa-align-left me-2 text-primary"></i>Description</h6>
                                
                                <div class="mb-3">
                                    <label for="description" class="form-label">Product Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" 
                                              id="description" 
                                              name="description" 
                                              rows="5" 
                                              placeholder="Enter detailed product description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Additional Details Card -->
                        <div class="card border-0 bg-light">
                            <div class="card-body">
                                <h6 class="fw-bold mb-3"><i class="fas fa-cubes me-2 text-primary"></i>Additional Details</h6>
                                
                                <div class="mb-3">
                                    <label for="packaging" class="form-label">Packaging Information</label>
                                    <input type="text" 
                                           class="form-control @error('packaging') is-invalid @enderror" 
                                           id="packaging" 
                                           name="packaging" 
                                           value="{{ old('packaging') }}" 
                                           placeholder="e.g., 10x10 tablets strip">
                                    @error('packaging')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <!-- Image Upload Card -->
                        <div class="card border-0 bg-light mb-4">
                            <div class="card-body">
                                <h6 class="fw-bold mb-3"><i class="fas fa-image me-2 text-primary"></i>Product Image</h6>
                                
                                <!-- Image Preview -->
                                <div class="text-center mb-3">
                                    <div id="imagePreview" class="image-preview rounded bg-white p-3 d-none">
                                        <img id="preview" src="#" alt="Preview" class="img-fluid" style="max-height: 150px;">
                                    </div>
                                    <div id="noImagePreview" class="no-image-preview bg-white rounded p-4 text-center">
                                        <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-2"></i>
                                        <p class="text-muted small mb-0">No image selected</p>
                                    </div>
                                </div>

                                <!-- File Input -->
                                <div class="mb-3">
                                    <label for="image" class="form-label">Choose Image</label>
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
                                        Allowed: jpeg, png, jpg. Max size: 2MB
                                    </small>
                                </div>
                            </div>
                        </div>

                        <!-- Status Card -->
                        <div class="card border-0 bg-light mb-4">
                            <div class="card-body">
                                <h6 class="fw-bold mb-3"><i class="fas fa-toggle-on me-2 text-primary"></i>Status</h6>
                                <div class="form-check form-switch">
                                    <input type="checkbox" 
                                           class="form-check-input" 
                                           id="status" 
                                           name="status" 
                                           value="1" 
                                           {{ old('status', 1) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status">Active</label>
                                </div>
                                <small class="text-muted d-block mt-2">
                                    <i class="fas fa-info-circle"></i>
                                    Inactive products won't be displayed on the website
                                </small>
                            </div>
                        </div>

                        <!-- Preview Card -->
                        <div class="card border-0 bg-primary text-white">
                            <div class="card-body">
                                <h6 class="fw-bold mb-3"><i class="fas fa-eye me-2"></i>Quick Tips</h6>
                                <ul class="small mb-0">
                                    <li class="mb-2">Use clear, descriptive product names</li>
                                    <li class="mb-2">Include complete composition details</li>
                                    <li class="mb-2">Add high-quality product images</li>
                                    <li class="mb-2">Mention packaging specifications</li>
                                    <li>Select appropriate category</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <!-- Form Actions -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary px-4">
                        <i class="fas fa-times me-2"></i>Cancel
                    </a>
                    <button type="submit" class="btn btn-primary px-4" id="submitBtn">
                        <i class="fas fa-save me-2"></i>Save Product
                    </button>
                </div>
            </form>
        </div>
    </div>
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
        padding: 10px 15px;
        transition: all 0.3s;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: var(--secondary-color);
        box-shadow: 0 0 0 0.2rem rgba(39, 174, 96, 0.1);
    }
    
    .btn-primary {
        background: var(--secondary-color);
        border: none;
        padding: 10px 25px;
        border-radius: 8px;
        font-weight: 500;
    }
    
    .btn-primary:hover {
        background: #219a52;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(39, 174, 96, 0.3);
    }
    
    .btn-primary:disabled {
        background: #6c757d;
        transform: none;
        box-shadow: none;
    }
    
    .btn-secondary {
        background: #6c757d;
        border: none;
        padding: 10px 25px;
        border-radius: 8px;
        font-weight: 500;
    }
    
    .form-check-input:checked {
        background-color: var(--secondary-color);
        border-color: var(--secondary-color);
    }
    
    .card {
        border-radius: 15px;
        overflow: hidden;
    }
    
    .bg-light {
        background-color: #f8f9fa !important;
    }
    
    .breadcrumb {
        background: transparent;
        padding: 0;
        margin: 0;
    }
    
    .breadcrumb-item a {
        color: var(--secondary-color);
        text-decoration: none;
    }
    
    .gap-2 {
        gap: 10px;
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
document.getElementById('productForm').addEventListener('submit', function(e) {
    const submitBtn = document.getElementById('submitBtn');
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Saving...';
});

// Auto-generate slug from name (optional)
document.getElementById('name').addEventListener('keyup', function() {
    // You can add slug generation here if needed
});
</script>
@endpush
@endsection