@extends('admin.layouts.app')

@section('title', 'Inquiries')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-2">Customer Inquiries</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Inquiries</li>
                </ol>
            </nav>
        </div>
        <div class="text-muted">
            Total: <span class="fw-bold">{{ $inquiries->total() }}</span> inquiries
        </div>
    </div>

    <!-- Filters Card -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('admin.inquiries.index') }}" method="GET" class="row g-3">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="fas fa-search text-primary"></i>
                        </span>
                        <input type="text" 
                               class="form-control border-start-0" 
                               name="search" 
                               placeholder="Search by name, email, or phone..." 
                               value="{{ request('search') }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <select name="status" class="form-select">
                        <option value="">All Status</option>
                        <option value="unread" {{ request('status') == 'unread' ? 'selected' : '' }}>Unread</option>
                        <option value="read" {{ request('status') == 'read' ? 'selected' : '' }}>Read</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="date" 
                           class="form-control" 
                           name="date" 
                           value="{{ request('date') }}"
                           placeholder="Filter by date">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-filter me-2"></i>Filter
                    </button>
                </div>
                @if(request()->anyFilled(['search', 'status', 'date']))
                <div class="col-12">
                    <a href="{{ route('admin.inquiries.index') }}" class="text-decoration-none small">
                        <i class="fas fa-times-circle me-1"></i>Clear Filters
                    </a>
                </div>
                @endif
            </form>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="small opacity-75">Total Inquiries</span>
                            <h3 class="mt-2 mb-0">{{ $inquiries->total() }}</h3>
                        </div>
                        <i class="fas fa-envelope fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm bg-warning text-dark">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="small opacity-75">Unread</span>
                            <h3 class="mt-2 mb-0">{{ \App\Models\Inquiry::where('status', 0)->count() }}</h3>
                        </div>
                        <i class="fas fa-envelope-open-text fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="small opacity-75">Read</span>
                            <h3 class="mt-2 mb-0">{{ \App\Models\Inquiry::where('status', 1)->count() }}</h3>
                        </div>
                        <i class="fas fa-check-circle fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm bg-info text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="small opacity-75">This Month</span>
                            <h3 class="mt-2 mb-0">{{ \App\Models\Inquiry::whereMonth('created_at', date('m'))->count() }}</h3>
                        </div>
                        <i class="fas fa-calendar-alt fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Inquiries Table -->
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="bg-light">
                        <tr>
                            <th style="width: 50px">#</th>
                            <th>Name</th>
                            <th>Contact Info</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th style="width: 100px">Status</th>
                            <th style="width: 150px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($inquiries as $index => $inquiry)
                        <tr class="{{ !$inquiry->status ? 'table-warning' : '' }}">
                            <td>{{ $inquiries->firstItem() + $index }}</td>
                            <td>
                                <div class="fw-semibold">{{ $inquiry->name }}</div>
                            </td>
                            <td>
                                <div><i class="fas fa-envelope me-2 text-muted small"></i>{{ $inquiry->email }}</div>
                                <div><i class="fas fa-phone me-2 text-muted small"></i>{{ $inquiry->phone }}</div>
                            </td>
                            <td>
                                <div class="message-preview">
                                    {{ Str::limit($inquiry->message, 50) }}
                                </div>
                            </td>
                            <td>
                                <span class="text-muted small">
                                    <i class="far fa-calendar-alt me-1"></i>{{ $inquiry->created_at->format('d M Y') }}
                                    <br>
                                    <i class="far fa-clock me-1"></i>{{ $inquiry->created_at->format('h:i A') }}
                                </span>
                            </td>
                            <td>
                                @if($inquiry->status)
                                    <span class="badge bg-success px-3 py-2">Read</span>
                                @else
                                    <span class="badge bg-warning text-dark px-3 py-2">Unread</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.inquiries.show', $inquiry) }}" 
                                       class="btn btn-sm btn-info text-white" 
                                       title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @if(!$inquiry->status)
                                    <form action="{{ route('admin.inquiries.mark-read', $inquiry) }}" 
                                          method="POST" 
                                          class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success" title="Mark as Read">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </form>
                                    @endif
                                    <form action="{{ route('admin.inquiries.destroy', $inquiry) }}" 
                                          method="POST" 
                                          class="d-inline"
                                          onsubmit="return confirm('Are you sure you want to delete this inquiry?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <i class="fas fa-inbox fa-4x text-muted mb-3"></i>
                                <h6 class="text-muted">No inquiries found</h6>
                                @if(request()->anyFilled(['search', 'status', 'date']))
                                <a href="{{ route('admin.inquiries.index') }}" class="btn btn-primary mt-3">
                                    <i class="fas fa-times me-2"></i>Clear Filters
                                </a>
                                @endif
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($inquiries->hasPages())
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="text-muted small">
                    Showing {{ $inquiries->firstItem() }} to {{ $inquiries->lastItem() }} of {{ $inquiries->total() }} inquiries
                </div>
                <div>
                    {{ $inquiries->links() }}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@push('styles')
<style>
    .table thead th {
        font-weight: 600;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #495057;
    }
    
    .table td {
        vertical-align: middle;
        font-size: 14px;
    }
    
    .table-warning {
        background-color: #fff3cd;
    }
    
    .btn-group .btn {
        padding: 0.4rem 0.6rem;
        margin: 0 2px;
        border-radius: 6px !important;
    }
    
    .badge {
        font-weight: 500;
        border-radius: 20px;
    }
    
    .message-preview {
        max-width: 250px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        color: #6c757d;
        font-size: 13px;
    }
    
    .form-control, .form-select {
        border: 2px solid #e9ecef;
        border-radius: 10px;
        padding: 10px 15px;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: var(--secondary-color);
        box-shadow: none;
    }
    
    .input-group-text {
        border: 2px solid #e9ecef;
        border-right: none;
        border-radius: 10px 0 0 10px;
    }
    
    .pagination {
        gap: 5px;
        margin: 0;
    }
    
    .page-link {
        border: none;
        border-radius: 8px;
        padding: 0.5rem 1rem;
        color: var(--secondary-color);
        font-weight: 500;
    }
    
    .page-link:hover {
        background: rgba(39, 174, 96, 0.1);
        color: var(--secondary-color);
    }
    
    .page-item.active .page-link {
        background: var(--secondary-color);
        color: white;
    }
    
    /* Stats Cards */
    .bg-primary { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important; }
    .bg-warning { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%) !important; }
    .bg-success { background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%) !important; }
    .bg-info { background: linear-gradient(135deg, #3b8cff 0%, #2b78c4 100%) !important; }
</style>
@endpush
@endsection