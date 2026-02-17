@extends('admin.layouts.app')

@section('title', 'Certificates')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Certificates Management</h2>
        <a href="{{ route('admin.certificates.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Certificate
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($certificates as $certificate)
                        <tr>
                            <td>{{ $certificate->id }}</td>
                            <td>
                                @if($certificate->image)
                                    <img src="{{ asset($certificate->image) }}" alt="{{ $certificate->title }}" style="width: 60px; height: 60px; object-fit: contain; border-radius: 5px;">
                                @else
                                    <span class="text-muted">No image</span>
                                @endif
                            </td>
                            <td>{{ $certificate->title }}</td>
                            <td>{{ Str::limit($certificate->description, 50) }}</td>
                            <td>{{ $certificate->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('admin.certificates.edit', $certificate) }}" class="btn btn-sm btn-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.certificates.destroy', $certificate) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this certificate?')" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                <i class="fas fa-certificate fa-3x text-muted mb-3"></i>
                                <p class="text-muted mb-0">No certificates found.</p>
                                <a href="{{ route('admin.certificates.create') }}" class="btn btn-primary mt-3">Add Your First Certificate</a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection