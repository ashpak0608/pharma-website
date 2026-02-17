@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">Dashboard</h2>
        </div>
    </div>
    
    <!-- Stats Cards -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-primary text-white h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-white-50 mb-2">Categories</h6>
                            <h3 class="mb-0">{{ $totalCategories }}</h3>
                        </div>
                        <i class="fas fa-tags fa-3x opacity-50"></i>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <a href="{{ route('admin.categories.index') }}" class="text-white text-decoration-none small">View Details →</a>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-success text-white h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-white-50 mb-2">Products</h6>
                            <h3 class="mb-0">{{ $totalProducts }}</h3>
                        </div>
                        <i class="fas fa-box fa-3x opacity-50"></i>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <a href="{{ route('admin.products.index') }}" class="text-white text-decoration-none small">View Details →</a>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-info text-white h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-white-50 mb-2">Inquiries</h6>
                            <h3 class="mb-0">{{ $totalInquiries }}</h3>
                        </div>
                        <i class="fas fa-envelope fa-3x opacity-50"></i>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <a href="{{ route('admin.inquiries.index') }}" class="text-white text-decoration-none small">View Details →</a>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-warning text-white h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-white-50 mb-2">Certificates</h6>
                            <h3 class="mb-0">{{ $totalCertificates }}</h3>
                        </div>
                        <i class="fas fa-certificate fa-3x opacity-50"></i>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <a href="{{ route('admin.certificates.index') }}" class="text-white text-decoration-none small">View Details →</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Recent Inquiries -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Recent Inquiries</h5>
                    <a href="{{ route('admin.inquiries.index') }}" class="btn btn-sm btn-primary">View All</a>
                </div>
                <div class="card-body">
                    @if($recentInquiries->count() > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentInquiries as $inquiry)
                                    <tr>
                                        <td>{{ $inquiry->name }}</td>
                                        <td>{{ $inquiry->email }}</td>
                                        <td>{{ $inquiry->phone }}</td>
                                        <td>{{ $inquiry->created_at->format('d M Y') }}</td>
                                        <td>
                                            @if($inquiry->status)
                                                <span class="badge bg-success">Read</span>
                                            @else
                                                <span class="badge bg-warning">Unread</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.inquiries.show', $inquiry) }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-center mb-0">No inquiries yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection