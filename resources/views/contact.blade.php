@extends('layouts.app')

@section('title', 'Contact Us - Corran Pharma')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="hero-title">Contact Us</h1>
                    <p class="hero-text">Get in touch with our team for any inquiries or assistance</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Info -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="card-custom">
                        <i class="fas fa-map-marker-alt"></i>
                        <h4>Visit Us</h4>
                        <p class="mb-0">Holambi Karian,</p>
                        <p>Delhi-110082</p>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card-custom">
                        <i class="fas fa-phone"></i>
                        <h4>Call Us</h4>
                        <p class="mb-0">+91 91205 18229</p>
                        <p>Mon-Sat, 9am-6pm</p>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card-custom">
                        <i class="fas fa-envelope"></i>
                        <h4>Email Us</h4>
                        <p class="mb-0">redicarepharma@gmail.com</p>
                        <p>24/7 Support</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card-custom text-start">
                        <h3 class="mb-4">Send us a Message</h3>
                        
                        <form action="{{ route('contact.submit') }}" method="POST">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Your Name *</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email Address *</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Phone Number *</label>
                                    <input type="text" class="form-control" name="phone" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label">Message *</label>
                                    <textarea class="form-control" name="message" rows="5" required></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn-custom">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map -->
    <section class="py-5">
        <div class="container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3499.5!2d77.0!3d28.7!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjnCsDAwJzAwLjAiTiA3N8KwMDAnMDAuMCJF!5e0!3m2!1sen!2sin!4v1234567890" width="100%" height="400" style="border:0;" allowfullscreen></iframe>
        </div>
    </section>
@endsection