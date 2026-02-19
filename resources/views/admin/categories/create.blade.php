@extends('admin.layouts.app')

@section('title', 'Add Category')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-2">Add New Category</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Categories</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Category</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Categories
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data" id="categoryForm">
                @csrf

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
                                           value="{{ old('name') }}" 
                                           placeholder="e.g., Tablets, Capsules, Injectables"
                                           required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">
                                        <i class="fas fa-info-circle me-1"></i>
                                        Category name should be unique and descriptive
                                    </small>
                                </div>

                                <div class="mb-3">
                                    <label for="slug" class="form-label">Slug (Auto-generated)</label>
                                    <input type="text" 
                                           class="form-control bg-light" 
                                           id="slug" 
                                           name="slug" 
                                           value="{{ old('slug') }}" 
                                           readonly
                                           placeholder="Will be auto-generated from name">
                                    <small class="text-muted">
                                        <i class="fas fa-link me-1"></i>
                                        Used in URL: /products/category-name
                                    </small>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" 
                                              id="description" 
                                              name="description" 
                                              rows="5" 
                                              placeholder="Enter category description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">
                                        <i class="fas fa-align-left me-1"></i>
                                        Describe what kind of products belong in this category
                                    </small>
                                </div>
                            </div>
                        </div>

                        <!-- SEO Preview Card -->
                        <div class="card border-0 bg-light">
                            <div class="card-body">
                                <h6 class="fw-bold mb-3">
                                    <i class="fas fa-chart-line me-2 text-primary"></i>
                                    SEO Preview
                                </h6>
                                <div class="seo-preview bg-white p-3 rounded">
                                    <div class="text-primary small">https://corranpharma.com/products/<span id="seo-slug">category-name</span></div>
                                    <div class="fw-semibold" id="seo-title">Category Name</div>
                                    <div class="text-muted small" id="seo-description">Category description will appear here...</div>
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
                                
                                <!-- Image Preview -->
                                <div class="text-center mb-3">
                                    <div id="imagePreview" class="image-preview rounded bg-white p-3 d-none">
                                        <img id="preview" src="#" alt="Preview" class="img-fluid" style="max-height: 150px;">
                                    </div>
                                    <div id="noImagePreview" class="no-image-preview bg-white rounded p-4 text-center">
                                        <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-2"></i>
                                        <p class="text-muted small mb-0">Upload category image</p>
                                        <p class="text-muted small mb-0">Recommended: 300x200px</p>
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
                                        Allowed: jpeg, png, jpg, gif. Max size: 2MB
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
                                           {{ old('status', 1) ? 'checked' : '' }}>
                                    <label class="form-check-label fw-semibold" for="status">Active</label>
                                </div>
                                <small class="text-muted d-block mt-2">
                                    <i class="fas fa-info-circle"></i>
                                    Inactive categories won't be displayed on the website
                                </small>
                            </div>
                        </div>

                        <!-- Tips Card -->
                        <div class="card border-0 bg-primary text-white">
                            <div class="card-body">
                                <h6 class="fw-bold mb-3">
                                    <i class="fas fa-lightbulb me-2"></i>
                                    Quick Tips
                                </h6>
                                <ul class="small mb-0 ps-3">
                                    <li class="mb-2">Use clear, descriptive category names</li>
                                    <li class="mb-2">Add relevant category images</li>
                                    <li class="mb-2">Write helpful descriptions</li>
                                    <li class="mb-2">Keep categories organized</li>
                                    <li>Active categories appear in menus</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <!-- Form Actions -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary px-4">
                        <i class="fas fa-times me-2"></i>Cancel
                    </a>
                    <button type="submit" class="btn btn-primary px-4" id="submitBtn">
                        <i class="fas fa-save me-2"></i>Save Category
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
        padding: 12px 15px;
        transition: all 0.3s;
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
    
    .btn-primary:disabled {
        background: #6c757d;
        transform: none;
        box-shadow: none;
    }
    
    .btn-secondary {
        background: #6c757d;
        border: none;
        padding: 12px 30px;
        border-radius: 8px;
        font-weight: 500;
    }
    
    .form-check-input:checked {
        background-color: var(--secondary-color);
        border-color: var(--secondary-color);
    }
    
    .seo-preview {
        border-left: 4px solid var(--secondary-color);
    }
    
    .bg-light {
        background-color: #f8f9fa !important;
    }
    
    .card {
        border-radius: 15px;
        overflow: hidden;
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

// Live SEO preview
document.getElementById('name').addEventListener('keyup', function() {
    const name = this.value;
    const slug = name.toLowerCase()
        .replace(/[^\w\s]/gi, '')
        .replace(/\s+/g, '-');
    
    document.getElementById('slug').value = slug;
    document.getElementById('seo-slug').textContent = slug;
    document.getElementById('seo-title').textContent = name || 'Category Name';
});

document.getElementById('description').addEventListener('keyup', function() {
    const desc = this.value.substring(0, 100);
    document.getElementById('seo-description').textContent = desc + (this.value.length > 100 ? '...' : '') || 'Category description will appear here...';
});

// Form submission with loading state
document.getElementById('categoryForm').addEventListener('submit', function(e) {
    const submitBtn = document.getElementById('submitBtn');
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Saving...';
});
</script>
@endpush
@endsection