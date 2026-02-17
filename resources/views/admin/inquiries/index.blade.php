@extends('admin.layouts.app')

@section('title', 'Inquiries')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Customer Inquiries</h2>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header bg-light d-flex justify-content-between align-items-center">
            <h6 class="mb-0">All Inquiries</h6>
            <span class="badge bg-primary">{{ $inquiries->count() }} Total</span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Received</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($inquiries as $inquiry)
                        <tr class="{{ !$inquiry->status ? 'table-warning' : '' }}">
                            <td>{{ $inquiry->id }}</td>
                            <td>{{ $inquiry->name }}</td>
                            <td>
                                <a href="mailto:{{ $inquiry->email }}">{{ $inquiry->email }}</a>
                            </td>
                            <td>
                                <a href="tel:{{ $inquiry->phone }}">{{ $inquiry->phone }}</a>
                            </td>
                            <td>{{ Str::limit($inquiry->message, 50) }}</td>
                            <td>
                                @if($inquiry->status)
                                    <span class="badge bg-success">Read</span>
                                @else
                                    <span class="badge bg-warning text-dark">Unread</span>
                                @endif
                            </td>
                            <td>{{ $inquiry->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('admin.inquiries.show', $inquiry) }}" class="btn btn-sm btn-info" title="View Details">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @if(!$inquiry->status)
                                <form action="{{ route('admin.inquiries.mark-read', $inquiry) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-success" title="Mark as Read">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </form>
                                @endif
                                <form action="{{ route('admin.inquiries.destroy', $inquiry) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this inquiry?')" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-4">
                                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                <p class="text-muted mb-0">No inquiries yet.</p>
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