@extends('layouts.app')

@section('title', 'Contact Us - Corran Pharma')

@section('content')
    <!-- Page Header -->
    <section class="bg-primary text-white py-5">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">Contact Us</h1>
            <p class="lead">Get in touch with us for any inquiries or assistance</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-4">
                    <div class="card h-100">
                        <div class="card-body p-4">
                            <h3 class="mb-4">Contact Information</h3>
                            
                            <div class="mb-4">
                                <h5><i class="fas fa-map-marker-alt text-primary me-2"></i>Address</h5>
                                <p class="ms-4">399/A, Manik Chamber, 3rd Floor, Office No-G/H<br>
                                Above Vasant Bhuvan Hotel, Lamington Road<br>
                                Grant Road East, Mumbai – 400007</p>
                            </div>
                            
                            <div class="mb-4">
                                <h5><i class="fas fa-phone text-primary me-2"></i>Phone</h5>
                                <p class="ms-4">+91 8898851830</p>
                            </div>
                            
                            <div class="mb-4">
                                <h5><i class="fas fa-envelope text-primary me-2"></i>Email</h5>
                                <p class="ms-4">info@corranpharma.com</p>
                            </div>
                            
                            <div class="mb-4">
                                <h5><i class="fas fa-clock text-primary me-2"></i>Business Hours</h5>
                                <p class="ms-4">Monday - Friday: 9:00 AM - 6:00 PM<br>
                                Saturday: 9:00 AM - 2:00 PM<br>
                                Sunday: Closed</p>
                            </div>
                            
                            <div>
                                <h5><i class="fas fa-id-card text-primary me-2"></i>GST No</h5>
                                <p class="ms-4">27EKEPM8103E1ZA</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-7 mb-4">
                    <div class="card">
                        <div class="card-body p-4">
                            <h3 class="mb-4">Send us a Message</h3>
                            
                            <form action="{{ route('contact.submit') }}" method="POST">
                                @csrf
                                
                                <div class="mb-3">
                                    <label for="name" class="form-label">Your Name *</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email Address *</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">Phone Number *</label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="message" class="form-label">Your Message *</label>
                                    <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <button type="submit" class="btn btn-primary btn-lg">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-4 bg-light">
        <div class="container">
            <div class="ratio ratio-21x9">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3773.5!2d72.8!3d18.9!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMThrw7Y!5e0!3m2!1sen!2sin!4v1234567890" allowfullscreen></iframe>
            </div>
        </div>
    </section>
@endsection