@extends('layouts.app')

@section('title', 'Certifications - Corran Pharma')

@section('content')
    <!-- Hero Section - Matching About Us -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="hero-title">Our Certifications</h1>
                    <p class="hero-text">Quality certifications that validate our commitment to excellence</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Certificates Section -->
    <section class="py-5">
        <div class="container">
            @if(isset($certificates) && $certificates->count() > 0)
                <div class="row g-4">
                    @foreach($certificates as $certificate)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 border-0 shadow-sm certificate-card">
                            <div class="card-body text-center p-4">
                                <div class="certificate-icon mb-4">
                                    @if($certificate->image)
                                        <img src="{{ asset($certificate->image) }}" alt="{{ $certificate->title }}" class="certificate-img">
                                    @else
                                        <div class="default-icon">
                                            <i class="fas fa-certificate fa-4x text-secondary opacity-50"></i>
                                        </div>
                                    @endif
                                </div>
                                <h4 class="fw-bold mb-3">{{ $certificate->title }}</h4>
                                @if($certificate->description)
                                    <p class="text-muted mb-0">{{ $certificate->description }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <div class="mb-4">
                        <i class="fas fa-certificate fa-5x text-secondary opacity-50"></i>
                    </div>
                    <h3 class="fw-bold mb-3">No Certifications Available</h3>
                    <p class="text-muted mb-4">Check back later for updates on our quality certifications.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Quality Information Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="section-header">
                <h2>Our Quality Commitment</h2>
                <p>We maintain the highest standards in pharmaceutical manufacturing</p>
            </div>
            
            <div class="row g-4 mt-4">
                <div class="col-md-4">
                    <div class="card-custom text-center">
                        <div class="quality-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <h4>GMP Certified</h4>
                        <p class="text-muted">We follow Good Manufacturing Practices to ensure product quality and safety at every stage.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-custom text-center">
                        <div class="quality-icon">
                            <i class="fas fa-flask"></i>
                        </div>
                        <h4>Quality Testing</h4>
                        <p class="text-muted">Each batch undergoes rigorous quality testing in our state-of-the-art laboratories.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-custom text-center">
                        <div class="quality-icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <h4>International Standards</h4>
                        <p class="text-muted">Our products meet international quality standards and regulatory requirements.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6 mb-4">
                    <div class="stat-box text-center">
                        <div class="stat-number">100%</div>
                        <div class="stat-label">Quality Assured</div>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="stat-box text-center">
                        <div class="stat-number">8+</div>
                        <div class="stat-label">Years Experience</div>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="stat-box text-center">
                        <div class="stat-number">40+</div>
                        <div class="stat-label">Quality Products</div>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="stat-box text-center">
                        <div class="stat-number">100%</div>
                        <div class="stat-label">Customer Satisfaction</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Accreditation Logos -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="section-header">
                <h2>Accreditations</h2>
                <p>Recognized by leading healthcare authorities</p>
            </div>
            
            <div class="row justify-content-center align-items-center g-4 mt-3">
                <div class="col-md-2 col-4">
                    <div class="accreditation-logo">
                        <i class="fas fa-certificate fa-3x text-secondary opacity-75"></i>
                        <p class="small mt-2 fw-bold">ISO 9001:2015</p>
                    </div>
                </div>
                <div class="col-md-2 col-4">
                    <div class="accreditation-logo">
                        <i class="fas fa-flask fa-3x text-secondary opacity-75"></i>
                        <p class="small mt-2 fw-bold">WHO-GMP</p>
                    </div>
                </div>
                <div class="col-md-2 col-4">
                    <div class="accreditation-logo">
                        <i class="fas fa-shield-alt fa-3x text-secondary opacity-75"></i>
                        <p class="small mt-2 fw-bold">FSSAI</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5" style="background: linear-gradient(135deg, var(--primary-color) 0%, #34495e 100%); color: white;">
        <div class="container text-center">
            <h2 class="display-6 fw-bold mb-4">Committed to Quality Healthcare</h2>
            <p class="lead mb-4">Contact us to learn more about our quality certifications and standards.</p>
            <a href="{{ route('contact') }}" class="btn btn-custom me-3">
                <i class="fas fa-envelope me-2"></i>Contact Us
            </a>
            <a href="{{ route('products') }}" class="btn btn-outline-custom">
                <i class="fas fa-capsules me-2"></i>Explore Products
            </a>
        </div>
    </section>
@endsection

@push('styles')
<style>
    .hero-section {
        background: linear-gradient(135deg, var(--primary-color) 0%, #34495e 100%);
        color: white;
        padding: 60px 0;
    }
    
    .hero-title {
        font-size: 42px;
        font-weight: 700;
        margin-bottom: 15px;
    }
    
    .hero-text {
        font-size: 18px;
        opacity: 0.95;
    }
    
    .certificate-card {
        transition: all 0.3s;
        border-radius: 15px;
        overflow: hidden;
        background: white;
    }
    
    .certificate-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.1) !important;
    }
    
    .certificate-img {
        max-width: 120px;
        max-height: 120px;
        object-fit: contain;
    }
    
    .default-icon {
        width: 120px;
        height: 120px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8f9fa;
        border-radius: 50%;
    }
    
    .card-custom {
        background: white;
        border-radius: 15px;
        padding: 35px 25px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        transition: all 0.3s;
        height: 100%;
    }
    
    .card-custom:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.1);
    }
    
    .quality-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 20px;
        background: rgba(39, 174, 96, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .quality-icon i {
        font-size: 40px;
        color: var(--secondary-color);
    }
    
    .stat-box {
        padding: 20px;
    }
    
    .stat-number {
        font-size: 42px;
        font-weight: 800;
        color: var(--secondary-color);
        line-height: 1;
        margin-bottom: 5px;
    }
    
    .stat-label {
        color: var(--primary-color);
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 14px;
    }
    
    .accreditation-logo {
        text-align: center;
        padding: 20px;
    }
    
    .accreditation-logo i {
        color: var(--secondary-color);
    }
    
    .btn-custom {
        background: var(--secondary-color);
        color: white;
        padding: 12px 30px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s;
        display: inline-block;
        border: none;
    }
    
    .btn-custom:hover {
        background: #219a52;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(39, 174, 96, 0.3);
    }
    
    .btn-outline-custom {
        background: transparent;
        color: white;
        padding: 12px 30px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s;
        display: inline-block;
        border: 2px solid white;
    }
    
    .btn-outline-custom:hover {
        background: white;
        color: var(--primary-color);
        transform: translateY(-2px);
    }
    
    .section-header {
        text-align: center;
        margin-bottom: 40px;
    }
    
    .section-header h2 {
        color: var(--heading-color);
        font-size: 36px;
        font-weight: 700;
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
    }
    
    .section-header h2:after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: var(--secondary-color);
        border-radius: 2px;
    }
    
    .section-header p {
        color: #666;
        font-size: 18px;
        margin-top: 20px;
    }
    
    .text-secondary {
        color: var(--secondary-color) !important;
    }
    
    .bg-secondary {
        background: var(--secondary-color) !important;
    }
</style>
@endpush