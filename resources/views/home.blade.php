@extends('layouts.app')

@section('title', 'Home - Corran Pharma')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section bg-primary text-white py-5" style="background: linear-gradient(135deg, #2c3e50, #3498db);">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">Welcome to {{ $settings['company_name'] ?? 'Corran Pharma' }}</h1>
                    <p class="lead mb-4">Your trusted partner in pharmaceutical excellence, providing quality healthcare solutions with innovation and integrity.</p>
                    <a href="{{ route('products') }}" class="btn btn-light btn-lg">Explore Products</a>
                </div>
                <div class="col-lg-6">
                    <img src="https://via.placeholder.com/600x400" alt="Pharmaceutical" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Overview Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="display-6 mb-4">Company Overview</h2>
                    <p class="lead">{{ $settings['about_content'] ?? 'We are dedicated to manufacturing and supplying high-quality pharmaceutical products that meet international standards.' }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    @if($featuredProducts->count() > 0)
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Featured Products</h2>
            <div class="row">
                @foreach($featuredProducts as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if($product->image)
                            <img src="{{ asset($product->image) }}" class="card-img-top product-img" alt="{{ $product->name }}">
                        @else
                            <img src="https://via.placeholder.com/300x200" class="card-img-top product-img" alt="{{ $product->name }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                            <a href="{{ route('product.detail', $product->slug) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Certifications Preview -->
    @if($certificates->count() > 0)
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Our Certifications</h2>
            <div class="row">
                @foreach($certificates as $certificate)
                <div class="col-md-3 col-6 mb-4">
                    <div class="card text-center">
                        @if($certificate->image)
                            <img src="{{ asset($certificate->image) }}" class="card-img-top" alt="{{ $certificate->title }}" style="height: 150px; object-fit: contain;">
                        @else
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="{{ $certificate->title }}">
                        @endif
                        <div class="card-body">
                            <h6 class="card-title">{{ $certificate->title }}</h6>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('certificates') }}" class="btn btn-primary">View All Certifications</a>
            </div>
        </div>
    </section>
    @endif

    <!-- Call to Action -->
    <section class="py-5 bg-primary text-white">
        <div class="container text-center">
            <h2 class="mb-4">Interested in our products?</h2>
            <p class="lead mb-4">Contact us today for more information about our pharmaceutical products and services.</p>
            <a href="{{ route('contact') }}" class="btn btn-light btn-lg">Contact Us Now</a>
        </div>
    </section>
@endsection