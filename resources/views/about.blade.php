@extends('layouts.app')

@section('title', 'About Us - Corran Pharma')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="hero-title">About Us</h1>
                    <p class="hero-text">True healthcare begins with genuine care. For over a decade, we have been dedicated to improving lives through high-quality, affordable, and reliable pharmaceutical products.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Content -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <h2 class="display-6 fw-bold mb-4" style="color: var(--heading-color);">At Redicare Pharma, we believe</h2>
                    <p class="lead">True healthcare begins with genuine care.</p>
                    <p>For over a decade, we have been dedicated to improving lives through high-quality, affordable, and reliable pharmaceutical products. Our unwavering commitment to innovation, excellence, and ethical business practices has helped us earn the trust of healthcare professionals and patients.</p>
                </div>
                <div class="col-lg-6 mb-4">
                    <img src="https://via.placeholder.com/500x400" alt="About Us" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <!-- Who We Are -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="section-header">
                <h2>Who We Are</h2>
            </div>
            
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <p class="lead mb-5">Redicare Pharma is a fast-growing pharmaceutical marketing company led by a team of experienced professionals who share a common goal — to make reliable, effective, and affordable medicines accessible to every corner of the country.</p>
                </div>
            </div>
            
            <div class="row mt-4">
                <div class="col-md-6 mb-4">
                    <div class="card-custom text-start">
                        <i class="fas fa-handshake"></i>
                        <h4>Our Mission</h4>
                        <p>We collaborate with reputed manufacturers who meet stringent quality standards, ensuring that every product we promote reflects safety, efficacy, and trust.</p>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card-custom text-start">
                        <i class="fas fa-eye"></i>
                        <h4>Our Vision</h4>
                        <p>To be the most trusted partner in healthcare by providing innovative and affordable pharmaceutical solutions.</p>
                    </div>
                </div>
            </div>
            
            <div class="row mt-4">
                <div class="col-md-4 mb-3">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle text-success fa-2x me-3"></i>
                        <span class="fw-bold">WHO GMP-Compliant Products</span>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle text-success fa-2x me-3"></i>
                        <span class="fw-bold">Trusted by Medical Professionals</span>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle text-success fa-2x me-3"></i>
                        <span class="fw-bold">Research based Formulations</span>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle text-success fa-2x me-3"></i>
                        <span class="fw-bold">Growing range of products</span>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle text-success fa-2x me-3"></i>
                        <span class="fw-bold">Timely Delivery Across India</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="stat-item">
                        <div class="stat-number">100%</div>
                        <div class="stat-label">Quality</div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="stat-item">
                        <div class="stat-number">40+</div>
                        <div class="stat-label">Products</div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="stat-item">
                        <div class="stat-number">15+</div>
                        <div class="stat-label">Experience Years</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-5">
        <div class="container text-center">
            <h2 class="display-6 fw-bold mb-4">Explore Our Products</h2>
            <p class="lead mb-4">Explore our growing range of products or get in touch with our team to start a partnership built on reliability.</p>
            <a href="{{ route('products') }}" class="btn-custom">View Our Products</a>
            <a href="{{ route('contact') }}" class="btn-outline-custom ms-3">Contact Us</a>
        </div>
    </section>
@endsection