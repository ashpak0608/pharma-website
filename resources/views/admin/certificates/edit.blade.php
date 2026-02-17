@extends('admin.layouts.app')

@section('title', 'Edit Certificate')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Edit Certificate: {{ $certificate->title }}</h2>
        <a href="{{ route('admin.certificates.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Certificates
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.certificates.update', $certificate) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-8">
                        <!-- Main Form Fields -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Certificate Title <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control @error('title') is-invalid @enderror" 
                                   id="title" 
                                   name="title" 
                                   value="{{ old('title', $certificate->title) }}" 
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
                                      rows="4">{{ old('description', $certificate->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <!-- Sidebar Fields -->
                        <div class="card mb-3">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Certificate Image</h6>
                            </div>
                            <div class="card-body">
                                <!-- Current Image Preview -->
                                @if($certificate->image)
                                    <div class="mb-3 text-center">
                                        <label class="form-label text-muted small">Current Image</label>
                                        <div class="border rounded p-2 bg-light">
                                            <img src="{{ asset($certificate->image) }}" 
                                                 alt="{{ $certificate->title }}" 
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
                                        Leave empty to keep current image. Allowed: jpeg, png, jpg. Max size: 2MB
                                    </small>
                                </div>

                                <!-- New Image Preview -->
                                <div id="imagePreview" class="text-center d-none">
                                    <label class="form-label text-muted small">New Image Preview</label>
                                    <div class="border rounded p-2 bg-light">
                                        <img id="preview" src="#" alt="Preview" class="img-fluid" style="max-height: 150px; width: auto;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Certificate Information</h6>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2">
                                        <i class="fas fa-calendar-alt text-primary me-2"></i>
                                        <strong>Created:</strong> 
                                        {{ $certificate->created_at->format('d M Y, h:i A') }}
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-edit text-success me-2"></i>
                                        <strong>Last Updated:</strong> 
                                        {{ $certificate->updated_at->format('d M Y, h:i A') }}
                                    </li>
                                    <li>
                                        <i class="fas fa-hashtag text-info me-2"></i>
                                        <strong>ID:</strong> 
                                        {{ $certificate->id }}
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
                        <i class="fas fa-save"></i> Update Certificate
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Danger Zone - Delete Certificate -->
    <div class="card mt-4 border-danger">
        <div class="card-header bg-danger text-white">
            <h6 class="mb-0"><i class="fas fa-exclamation-triangle"></i> Danger Zone</h6>
        </div>
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h6 class="mb-1">Delete this certificate</h6>
                    <p class="text-muted mb-0 small">Once you delete this certificate, it will be removed from the website. This action cannot be undone.</p>
                </div>
                <div class="col-md-4 text-end">
                    <form action="{{ route('admin.certificates.destroy', $certificate) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this certificate? This action cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">
                            <i class="fas fa-trash"></i> Delete Certificate
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
    
    .bg-light {
        background-color: #f8f9fa !important;
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