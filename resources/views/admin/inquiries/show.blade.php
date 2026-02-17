@extends('admin.layouts.app')

@section('title', 'Inquiry Details')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Inquiry Details #{{ $inquiry->id }}</h2>
        <a href="{{ route('admin.inquiries.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Inquiries
        </a>
    </div>

    <div class="row">
        <div class="col-md-8">
            <!-- Main Inquiry Details -->
            <div class="card mb-4">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Inquiry Information</h6>
                    <span class="badge {{ $inquiry->status ? 'bg-success' : 'bg-warning' }}">
                        {{ $inquiry->status ? 'Read' : 'Unread' }}
                    </span>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <h5 class="text-primary">Message:</h5>
                        <div class="p-3 bg-light rounded">
                            {{ $inquiry->message }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="text-primary">Contact Information:</h5>
                            <table class="table table-borderless">
                                <tr>
                                    <th width="100">Name:</th>
                                    <td>{{ $inquiry->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>
                                        <a href="mailto:{{ $inquiry->email }}">{{ $inquiry->email }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Phone:</th>
                                    <td>
                                        <a href="tel:{{ $inquiry->phone }}">{{ $inquiry->phone }}</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-primary">Timeline:</h5>
                            <table class="table table-borderless">
                                <tr>
                                    <th width="100">Received:</th>
                                    <td>{{ $inquiry->created_at->format('d M Y, h:i A') }}</td>
                                </tr>
                                <tr>
                                    <th>Updated:</th>
                                    <td>{{ $inquiry->updated_at->format('d M Y, h:i A') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <!-- Actions Card -->
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h6 class="mb-0">Actions</h6>
                </div>
                <div class="card-body">
                    @if(!$inquiry->status)
                    <form action="{{ route('admin.inquiries.mark-read', $inquiry) }}" method="POST" class="mb-2">
                        @csrf
                        <button type="submit" class="btn btn-success w-100">
                            <i class="fas fa-check"></i> Mark as Read
                        </button>
                    </form>
                    @endif

                    <a href="mailto:{{ $inquiry->email }}" class="btn btn-info w-100 mb-2">
                        <i class="fas fa-reply"></i> Reply via Email
                    </a>

                    <a href="tel:{{ $inquiry->phone }}" class="btn btn-primary w-100 mb-2">
                        <i class="fas fa-phone"></i> Call Now
                    </a>

                    <form action="{{ route('admin.inquiries.destroy', $inquiry) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this inquiry?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="fas fa-trash"></i> Delete Inquiry
                        </button>
                    </form>
                </div>
            </div>

            <!-- Quick Response Template -->
            <div class="card">
                <div class="card-header bg-light">
                    <h6 class="mb-0">Quick Response Template</h6>
                </div>
                <div class="card-body">
                    <p class="text-muted small">Copy and use this template for response:</p>
                    <textarea class="form-control bg-light" rows="6" readonly onclick="this.select()">Dear {{ $inquiry->name }},

Thank you for your interest in Corran Pharma. We have received your inquiry regarding our products.

One of our representatives will contact you shortly at {{ $inquiry->phone }} or via email at {{ $inquiry->email }}.

For immediate assistance, please call us at +91 8898851830.

Best regards,
Corran Pharma Team</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection