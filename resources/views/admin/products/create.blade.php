@extends('admin.layouts.app')

@section('title', 'Add Product')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Add New Product</h2>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Products
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-8">
                        <!-- Main Form Fields -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}" 
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
                            <label for="composition" class="form-label">Composition</label>
                            <textarea class="form-control @error('composition') is-invalid @enderror" 
                                      id="composition" 
                                      name="composition" 
                                      rows="2">{{ old('composition') }}</textarea>
                            @error('composition')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Example: Paracetamol IP 500mg + Caffeine 50mg</small>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" 
                                      name="description" 
                                      rows="4">{{ old('description') }}</textarea>
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
                                   value="{{ old('packaging') }}"
                                   placeholder="Example: 10x10 tablets strip, 100ml bottle">
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
                                <div class="mb-3">
                                    <label for="image" class="form-label">Upload Image</label>
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

                                <!-- Image Preview -->
                                <div id="imagePreview" class="text-center d-none">
                                    <label class="form-label text-muted small">Image Preview</label>
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
                                           checked>
                                    <label class="form-check-label" for="status">Active</label>
                                </div>
                                <small class="text-muted d-block mt-2">
                                    <i class="fas fa-info-circle"></i>
                                    Inactive products won't be displayed on the website
                                </small>
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
                        <i class="fas fa-save"></i> Save Product
                    </button>
                </div>
            </form>
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
    
    .gap-2 {
        gap: 0.5rem;
    }
</style>
@endpush
@endsection