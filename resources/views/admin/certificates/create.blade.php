@extends('admin.layouts.app')

@section('title', 'Add Certificate')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Add New Certificate</h2>
        <a href="{{ route('admin.certificates.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Certificates
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.certificates.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-8">
                        <!-- Main Form Fields -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Certificate Title <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control @error('title') is-invalid @enderror" 
                                   id="title" 
                                   name="title" 
                                   value="{{ old('title') }}" 
                                   placeholder="e.g., ISO 9001:2015 Certification"
                                   required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" 
                                      name="description" 
                                      rows="4" 
                                      placeholder="Enter certificate description or additional details">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <!-- Sidebar Fields -->
                        <div class="card mb-3">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Certificate Image <span class="text-danger">*</span></h6>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Upload Certificate Image</label>
                                    <input type="file" 
                                           class="form-control @error('image') is-invalid @enderror" 
                                           id="image" 
                                           name="image" 
                                           accept="image/*"
                                           onchange="previewImage(this)"
                                           required>
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted d-block mt-1">
                                        <i class="fas fa-info-circle"></i> 
                                        Allowed: jpeg, png, jpg, gif. Max size: 2MB<br>
                                        Recommended size: 300x300 pixels
                                    </small>
                                </div>

                                <!-- Image Preview -->
                                <div id="imagePreview" class="text-center d-none">
                                    <label class="form-label text-muted small">Image Preview</label>
                                    <div class="border rounded p-2 bg-light">
                                        <img id="preview" src="#" alt="Preview" class="img-fluid" style="max-height: 200px; width: auto;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Guidelines</h6>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        Use high-quality images
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        Clear and readable text
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        Square format works best
                                    </li>
                                    <li>
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        Max file size 2MB
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.certificates.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Certificate
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
    
    .bg-light {
        background-color: #f8f9fa !important;
    }
</style>
@endpush
@endsection