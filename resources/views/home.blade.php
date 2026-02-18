@extends('layouts.app')

@section('title', 'Home - Corran Pharma')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="hero-title">
                        Ready to Care with...
                        <span>Dedication!</span>
                    </h1>
                    <p class="hero-text">At Corran Pharma, caring is more than our commitment — it's our identity. We are dedicated to providing high-quality pharmaceutical products that improve lives.</p>
                    <div>
                        <a href="{{ route('products') }}" class="btn-custom">Explore Products</a>
                        <a href="{{ route('about') }}" class="btn-outline-custom">About Us</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('images/hero-image.png') }}" alt="Corran Pharma Healthcare" class="hero-image img-fluid" onerror="this.src='https://placehold.co/600x400/2c3e50/27ae60?text=Corran+Pharma'">
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                    <img src="{{ asset('images/about-image.jpg') }}" alt="About Corran Pharma" class="img-fluid rounded-3 shadow" onerror="this.src='https://placehold.co/600x400/27ae60/white?text=About+Us'">
                </div>
                <div class="col-lg-6 mb-4">
                    <h2 class="display-5 fw-bold mb-4" style="color: var(--heading-color);">About Us</h2>
                    <p class="lead mb-4" style="color: var(--secondary-color);">At Corran Pharma, we believe true healthcare begins with genuine care.</p>
                    <p class="mb-4">For over 8 years, we have been dedicated to improving lives through high-quality, affordable, and reliable pharmaceutical products. Our unwavering commitment to innovation, excellence, and ethical business practices has helped us earn the trust of healthcare professionals and patients across Maharashtra.</p>
                    <p class="mb-4">We specialize in Orthopedic and Diabetic segments, providing comprehensive healthcare solutions. Our brands include Ncart L, Roswell C, Pregalyt, CQFrac, Ansonac TH, Rich 60K Tcal O, and Rozansh.</p>
                    <a href="{{ route('about') }}" class="btn-custom">Read More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Who We Are Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="section-header">
                <h2>Who We Are</h2>
                <p>Corran Pharma is a fast-growing pharmaceutical company led by a team of experienced professionals who share a common goal — to make reliable, effective, and affordable medicines accessible to every corner of Maharashtra.</p>
            </div>

            <div class="row mt-5">
                <div class="col-md-4 mb-4">
                    <div class="card-custom">
                        <i class="fas fa-check-circle"></i>
                        <h4>100% Quality</h4>
                        <p class="text-muted">We collaborate with reputed manufacturers who meet stringent quality standards, ensuring every product reflects safety, efficacy, and trust.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card-custom">
                        <i class="fas fa-flask"></i>
                        <h4>40+ Products</h4>
                        <p class="text-muted">Growing range of products across Orthopedic and Diabetic segments with research-based formulations.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card-custom">
                        <i class="fas fa-clock"></i>
                        <h4>8+ Years</h4>
                        <p class="text-muted">Established in 2018, we bring 8+ years of expertise in pharmaceutical marketing and distribution.</p>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-3 col-6 mb-3">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        <span>WHO GMP-Compliant Products</span>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-3">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        <span>Trusted by Medical Professionals</span>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-3">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        <span>Research based Formulations</span>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-3">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        <span>Timely Delivery Across Maharashtra</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Strength Section -->
    <section class="py-5">
        <div class="container">
            <div class="section-header">
                <h2>Core Strength</h2>
                <p>Driven by Ethics, Quality & Innovation</p>
            </div>
            
            <div class="row mt-4">
                <div class="col-md-4 mb-4">
                    <div class="card-custom">
                        <i class="fas fa-shield-alt"></i>
                        <h4>Ethics First</h4>
                        <p>We maintain the highest ethical standards in all our business practices and relationships.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card-custom">
                        <i class="fas fa-certificate"></i>
                        <h4>Quality Assurance</h4>
                        <p>Stringent quality checks at every stage of product development and manufacturing.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card-custom">
                        <i class="fas fa-lightbulb"></i>
                        <h4>Innovation</h4>
                        <p>Continuous R&D for better healthcare solutions and improved patient outcomes.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6 mb-4">
                    <div class="stat-item">
                        <div class="stat-number">97%</div>
                        <div class="stat-label">Recommended by Clinicians</div>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="stat-item">
                        <div class="stat-number">100%</div>
                        <div class="stat-label">Consistent Quality</div>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="stat-item">
                        <div class="stat-number">8+</div>
                        <div class="stat-label">Years Experience</div>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="stat-item">
                        <div class="stat-number">40+</div>
                        <div class="stat-label">Quality Products</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Reputation Section -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                    <h2 class="display-5 fw-bold mb-4" style="color: var(--heading-color);">Our Reputation</h2>
                    <p class="lead mb-4" style="color: var(--secondary-color);">Trusted by Healthcare Professionals Across Maharashtra</p>
                    <p class="mb-4">We specialize in marketing and distribution of a diverse range of pharmaceutical formulations across Orthopedic and Diabetic segments. Our team of dedicated field professionals, strong network, and customer-first approach enable us to deliver consistent results and build long-term relationships with healthcare professionals and business partners.</p>
                    
                    <div class="row mt-5">
                        <div class="col-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle text-success fa-2x me-3"></i>
                                <div>
                                    <h3 class="mb-0 fw-bold">97%</h3>
                                    <small class="text-muted">Clinicians Trust</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle text-success fa-2x me-3"></i>
                                <div>
                                    <h3 class="mb-0 fw-bold">100%</h3>
                                    <small class="text-muted">Quality Assured</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <a href="{{ route('contact') }}" class="btn-custom mt-4">Contact Us Today</a>
                </div>
                <div class="col-lg-6 mb-4">
                    <img src="{{ asset('images/reputation.jpg') }}" alt="Our Reputation" class="img-fluid rounded-3 shadow" onerror="this.src='https://placehold.co/600x400/2c3e50/27ae60?text=Trusted+by+Professionals'">
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5" style="background: linear-gradient(135deg, var(--primary-color) 0%, #34495e 100%); color: white;">
        <div class="container text-center">
            <h2 class="display-5 fw-bold mb-4">Our Commitment to Healthcare</h2>
            <p class="lead mb-4">We are committed to providing the highest quality pharmaceutical products with integrity and excellence.</p>
            <a href="{{ route('contact') }}" class="btn-custom me-3">Get in Touch</a>
            <a href="{{ route('products') }}" class="btn-outline-custom">Explore Products</a>
        </div>
    </section>
@endsection