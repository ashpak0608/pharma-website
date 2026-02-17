@extends('admin.layouts.app')

@section('title', 'Edit Product')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Edit Product: {{ $product->name }}</h2>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Products
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-8">
                        <!-- Main Form Fields -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name', $product->name) }}" 
                                   required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category <span class="text-danger">*</span></label>
                            <select class="form-control @error('category_id') is-invalid @enderror" 
                                    id="category_id" 
                                    name="category_id" 
                                    required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" 
                                        {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="composition" class="form-label">Composition</label>
                            <textarea class="form-control @error('composition') is-invalid @enderror" 
                                      id="composition" 
                                      name="composition" 
                                      rows="2">{{ old('composition', $product->composition) }}</textarea>
                            @error('composition')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" 
                                      name="description" 
                                      rows="4">{{ old('description', $product->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="packaging" class="form-label">Packaging Details</label>
                            <input type="text" 
                                   class="form-control @error('packaging') is-invalid @enderror" 
                                   id="packaging" 
                                   name="packaging" 
                                   value="{{ old('packaging', $product->packaging) }}">
                            @error('packaging')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <!-- Sidebar Fields -->
                        <div class="card mb-3">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Product Image</h6>
                            </div>
                            <div class="card-body">
                                <!-- Current Image Preview -->
                                @if($product->image)
                                    <div class="mb-3 text-center">
                                        <label class="form-label text-muted small">Current Image</label>
                                        <div class="border rounded p-2">
                                            <img src="{{ asset($product->image) }}" 
                                                 alt="{{ $product->name }}" 
                                                 class="img-fluid" 
                                                 style="max-height: 150px; width: auto;">
                                        </div>
                                    </div>
                                @endif

                                <!-- Image Upload -->
                                <div class="mb-3">
                                    <label for="image" class="form-label">Update Image</label>
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

                                <!-- New Image Preview -->
                                <div id="imagePreview" class="text-center d-none">
                                    <label class="form-label text-muted small">New Image Preview</label>
                                    <div class="border rounded p-2">
                                        <img id="preview" src="#" alt="Preview" class="img-fluid" style="max-height: 150px; width: auto;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Product Status</h6>
                            </div>
                            <div class="card-body">
                                <div class="form-check form-switch">
                                    <input type="checkbox" 
                                           class="form-check-input" 
                                           id="status" 
                                           name="status" 
                                           value="1" 
                                           {{ old('status', $product->status) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status">Active</label>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Product Information</h6>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2">
                                        <i class="fas fa-calendar-alt text-primary me-2"></i>
                                        <strong>Created:</strong> 
                                        {{ $product->created_at->format('d M Y, h:i A') }}
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-edit text-success me-2"></i>
                                        <strong>Last Updated:</strong> 
                                        {{ $product->updated_at->format('d M Y, h:i A') }}
                                    </li>
                                    <li>
                                        <i class="fas fa-link text-info me-2"></i>
                                        <strong>Slug:</strong> 
                                        {{ $product->slug }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Product
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Danger Zone - Delete Product -->
    <div class="card mt-4 border-danger">
        <div class="card-header bg-danger text-white">
            <h6 class="mb-0"><i class="fas fa-exclamation-triangle"></i> Danger Zone</h6>
        </div>
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h6 class="mb-1">Delete this product</h6>
                    <p class="text-muted mb-0 small">Once you delete this product, there is no going back. Please be certain.</p>
                </div>
                <div class="col-md-4 text-end">
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product? This action cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">
                            <i class="fas fa-trash"></i> Delete Product
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Image Preview -->
@push('scripts')
<script>
function previewImage(input) {
    const preview = document.getElementById('preview');
    const previewContainer = document.getElementById('imagePreview');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            preview.src = e.target.result;
            previewContainer.classList.remove('d-none');
        }
        
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.src = '#';
        previewContainer.classList.add('d-none');
    }
}
</script>
@endpush

@push('styles')
<style>
    .form-label {
        font-weight: 500;
        color: #495057;
    }
    
    .card {
        box-shadow: 0 2px 4px rgba(0,0,0,.1);
        border: none;
        margin-bottom: 1rem;
    }
    
    .card-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
        font-weight: 600;
    }
    
    .border-danger {
        border-left: 4px solid #dc3545;
    }
    
    .gap-2 {
        gap: 0.5rem;
    }
    
    @media (max-width: 768px) {
        .col-md-4.text-end {
            text-align: left !important;
            margin-top: 1rem;
        }
    }
</style>
@endpush
@endsection