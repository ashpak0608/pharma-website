@extends('layouts.app')

@section('title', 'About Us - Corran Pharma')

@section('content')
    <!-- Page Header -->
    <section class="bg-primary text-white py-5">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">About Us</h1>
            <p class="lead">Learn more about our company and commitment to excellence</p>
        </div>
    </section>

    <!-- Company Background -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                    <h2 class="mb-4">Company Background</h2>
                    <p>{{ $settings['about_content'] ?? 'Corran Pharma Pvt. Ltd. is a leading pharmaceutical company dedicated to manufacturing and supplying high-quality pharmaceutical products. With state-of-the-art manufacturing facilities and a commitment to quality, we serve healthcare needs across India and international markets.' }}</p>
                </div>
                <div class="col-lg-6 mb-4">
                    <img src="https://via.placeholder.com/600x400" alt="Company Building" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Vision & Mission -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card h-100 text-center p-4">
                        <i class="fas fa-eye fa-3x text-primary mb-3"></i>
                        <h3>Our Vision</h3>
                        <p>{{ $settings['vision'] ?? 'To be a globally recognized pharmaceutical company known for quality, innovation, and healthcare excellence.' }}</p>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card h-100 text-center p-4">
                        <i class="fas fa-bullseye fa-3x text-primary mb-3"></i>
                        <h3>Our Mission</h3>
                        <p>{{ $settings['mission'] ?? 'To provide affordable, high-quality healthcare solutions while maintaining the highest standards of ethics and integrity.' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Our Core Values</h2>
            <div class="row">
                <div class="col-md-3 mb-4">
                    <div class="card text-center h-100 p-3">
                        <i class="fas fa-flask fa-3x text-primary mb-3"></i>
                        <h5>Quality</h5>
                        <p>Uncompromising commitment to product quality and safety</p>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card text-center h-100 p-3">
                        <i class="fas fa-hand-holding-heart fa-3x text-primary mb-3"></i>
                        <h5>Integrity</h5>
                        <p>Honest and ethical business practices</p>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card text-center h-100 p-3">
                        <i class="fas fa-lightbulb fa-3x text-primary mb-3"></i>
                        <h5>Innovation</h5>
                        <p>Continuous improvement and innovation</p>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card text-center h-100 p-3">
                        <i class="fas fa-users fa-3x text-primary mb-3"></i>
                        <h5>Customer Focus</h5>
                        <p>Putting customer needs first</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection