@extends('admin.layouts.app')

@section('title', 'Add Certificate')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-2">Add New Certificate</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.certificates.index') }}">Certificates</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Certificate</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('admin.certificates.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Certificates
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.certificates.store') }}" method="POST" enctype="multipart/form-data" id="certificateForm">
                @csrf

                <div class="row">
                    <div class="col-md-8">
                        <!-- Main Form Card -->
                        <div class="card border-0 bg-light mb-4">
                            <div class="card-body">
                                <h6 class="fw-bold mb-3"><i class="fas fa-certificate me-2 text-primary"></i>Certificate Details</h6>
                                
                                <div class="mb-3">
                                    <label for="title" class="form-label">Certificate Title <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control @error('title') is-invalid @enderror" 
                                           id="title" 
                                           name="title" 
                                           value="{{ old('title') }}" 
                                           placeholder="e.g., ISO 9001:2015"
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
                                              placeholder="Enter certificate description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Brief description of the certificate and its significance</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <!-- Image Upload Card -->
                        <div class="card border-0 bg-light mb-4">
                            <div class="card-body">
                                <h6 class="fw-bold mb-3"><i class="fas fa-image me-2 text-primary"></i>Certificate Image</h6>
                                
                                <!-- Image Preview -->
                                <div class="text-center mb-3">
                                    <div id="imagePreview" class="image-preview rounded bg-white p-3 d-none">
                                        <img id="preview" src="#" alt="Preview" class="img-fluid" style="max-height: 150px;">
                                    </div>
                                    <div id="noImagePreview" class="no-image-preview bg-white rounded p-4 text-center">
                                        <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-2"></i>
                                        <p class="text-muted small mb-0">Upload certificate image</p>
                                    </div>
                                </div>

                                <!-- File Input -->
                                <div class="mb-3">
                                    <label for="image" class="form-label">Choose Image <span class="text-danger">*</span></label>
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
                                        Allowed: jpeg, png, jpg. Max size: 2MB
                                    </small>
                                </div>
                            </div>
                        </div>

                        <!-- Tips Card -->
                        <div class="card border-0 bg-primary text-white">
                            <div class="card-body">
                                <h6 class="fw-bold mb-3"><i class="fas fa-lightbulb me-2"></i>Tips</h6>
                                <ul class="small mb-0">
                                    <li class="mb-2">Use clear certificate titles</li>
                                    <li class="mb-2">Upload high-quality images</li>
                                    <li class="mb-2">Include issuing authority</li>
                                    <li>Add validity period if applicable</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <!-- Form Actions -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.certificates.index') }}" class="btn btn-secondary px-4">
                        <i class="fas fa-times me-2"></i>Cancel
                    </a>
                    <button type="submit" class="btn btn-primary px-4" id="submitBtn">
                        <i class="fas fa-save me-2"></i>Save Certificate
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
    
    .form-control {
        border: 2px solid #e9ecef;
        border-radius: 10px;
        padding: 10px 15px;
        transition: all 0.3s;
    }
    
    .form-control:focus {
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
document.getElementById('certificateForm').addEventListener('submit', function(e) {
    const submitBtn = document.getElementById('submitBtn');
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Saving...';
});
</script>
@endpush
@endsection