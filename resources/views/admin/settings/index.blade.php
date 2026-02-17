@extends('admin.layouts.app')

@section('title', 'Settings')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Website Settings</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header bg-light">
            <h6 class="mb-0">General Settings</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.settings.update') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="company_name" class="form-label">Company Name</label>
                        <input type="text" 
                               class="form-control" 
                               id="company_name" 
                               name="company_name" 
                               value="{{ $settings['company_name'] ?? '' }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="company_email" class="form-label">Company Email</label>
                        <input type="email" 
                               class="form-control" 
                               id="company_email" 
                               name="company_email" 
                               value="{{ $settings['company_email'] ?? '' }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="company_phone" class="form-label">Company Phone</label>
                        <input type="text" 
                               class="form-control" 
                               id="company_phone" 
                               name="company_phone" 
                               value="{{ $settings['company_phone'] ?? '' }}">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="company_address" class="form-label">Company Address</label>
                        <textarea class="form-control" 
                                  id="company_address" 
                                  name="company_address" 
                                  rows="3">{{ $settings['company_address'] ?? '' }}</textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="about_content" class="form-label">About Us Content</label>
                        <textarea class="form-control" 
                                  id="about_content" 
                                  name="about_content" 
                                  rows="4">{{ $settings['about_content'] ?? '' }}</textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="vision" class="form-label">Vision Statement</label>
                        <textarea class="form-control" 
                                  id="vision" 
                                  name="vision" 
                                  rows="3">{{ $settings['vision'] ?? '' }}</textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="mission" class="form-label">Mission Statement</label>
                        <textarea class="form-control" 
                                  id="mission" 
                                  name="mission" 
                                  rows="3">{{ $settings['mission'] ?? '' }}</textarea>
                    </div>
                </div>

                <hr>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Save Settings
                </button>
            </form>
        </div>
    </div>
</div>
@endsection