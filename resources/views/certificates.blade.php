@extends('layouts.app')

@section('title', 'Certifications - Corran Pharma')

@section('content')
    <!-- Page Header -->
    <section class="bg-primary text-white py-5">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">Our Certifications</h1>
            <p class="lead">Quality certifications that validate our commitment to excellence</p>
        </div>
    </section>

    <!-- Certificates Section -->
    <section class="py-5">
        <div class="container">
            @if($certificates->count() > 0)
                <div class="row">
                    @foreach($certificates as $certificate)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            @if($certificate->image)
                                <img src="{{ asset($certificate->image) }}" class="card-img-top" alt="{{ $certificate->title }}" style="height: 200px; object-fit: contain;">
                            @else
                                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="{{ $certificate->title }}">
                            @endif
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $certificate->title }}</h5>
                                @if($certificate->description)
                                    <p class="card-text">{{ $certificate->description }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <h3>No certifications available</h3>
                </div>
            @endif
        </div>
    </section>

    <!-- Quality Information -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Our Quality Commitment</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card text-center h-100 p-4">
                        <i class="fas fa-check-circle fa-3x text-primary mb-3"></i>
                        <h5>GMP Certified</h5>
                        <p>We follow Good Manufacturing Practices to ensure product quality and safety.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card text-center h-100 p-4">
                        <i class="fas fa-flask fa-3x text-primary mb-3"></i>
                        <h5>Quality Testing</h5>
                        <p>Each batch undergoes rigorous quality testing before release.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card text-center h-100 p-4">
                        <i class="fas fa-globe fa-3x text-primary mb-3"></i>
                        <h5>International Standards</h5>
                        <p>Our products meet international quality standards.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection