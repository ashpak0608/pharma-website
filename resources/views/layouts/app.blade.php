<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Corran Pharma') - Pharmaceutical Company</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #27ae60;
            --accent-color: #e67e22;
            --light-bg: #f8f9fa;
            --text-color: #333;
            --heading-color: #2c3e50;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-color);
            padding-top: 120px;
            overflow-x: hidden;
        }
        
        /* Top Bar */
        .top-bar {
            background: var(--primary-color);
            color: white;
            padding: 10px 0;
            font-size: 14px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
            border-bottom: 3px solid var(--secondary-color);
        }
        
        .top-bar a {
            color: white;
            text-decoration: none;
            margin-right: 25px;
            transition: all 0.3s;
        }
        
        .top-bar a:hover {
            color: var(--secondary-color);
        }
        
        .top-bar i {
            margin-right: 8px;
            color: var(--secondary-color);
            font-size: 14px;
        }
        
        .social-icons a {
            margin-left: 15px;
            font-size: 16px;
            display: inline-block;
            transition: transform 0.3s;
        }
        
        .social-icons a:hover {
            transform: translateY(-3px);
            color: var(--secondary-color) !important;
        }
        
        /* Main Navigation */
        .main-nav {
            background: white;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            padding: 15px 0;
            position: fixed;
            top: 45px;
            left: 0;
            right: 0;
            z-index: 1020;
        }
        
        .navbar-brand {
            font-size: 28px;
            font-weight: 700;
            color: var(--primary-color) !important;
            line-height: 1.2;
            text-decoration: none;
        }
        
        .navbar-brand span {
            color: var(--secondary-color);
            display: block;
            font-size: 14px;
            font-weight: 400;
            margin-top: 5px;
            letter-spacing: 1px;
        }
        
        .nav-link {
            color: var(--primary-color) !important;
            font-weight: 600;
            padding: 8px 20px !important;
            transition: all 0.3s;
            position: relative;
        }
        
        .nav-link:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background: var(--secondary-color);
            transition: all 0.3s;
        }
        
        .nav-link:hover:after,
        .nav-link.active:after {
            width: 70%;
        }
        
        .nav-link:hover,
        .nav-link.active {
            color: var(--secondary-color) !important;
        }
        
        .search-form {
            position: relative;
            min-width: 280px;
        }
        
        .search-form input {
            border: 2px solid #eee;
            border-radius: 30px;
            padding: 10px 45px 10px 20px;
            font-size: 14px;
            width: 100%;
            transition: all 0.3s;
        }
        
        .search-form input:focus {
            border-color: var(--secondary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(39, 174, 96, 0.1);
        }
        
        .search-form button {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--secondary-color);
            cursor: pointer;
            font-size: 16px;
        }
        
        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, #34495e 100%);
            color: white;
            padding: 80px 0;
            margin-top: 0;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section:before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.1"><path fill="white" d="M20 20 L30 20 L25 30 Z"/></svg>');
            background-size: 60px 60px;
        }
        
        .hero-title {
            font-size: 52px;
            font-weight: 800;
            margin-bottom: 15px;
            line-height: 1.2;
        }
        
        .hero-title span {
            color: var(--secondary-color);
            display: block;
            font-size: 28px;
            font-weight: 400;
            margin-top: 10px;
        }
        
        .hero-text {
            font-size: 18px;
            opacity: 0.95;
            margin-bottom: 30px;
            line-height: 1.8;
        }
        
        .btn-custom {
            background: var(--secondary-color);
            color: white;
            padding: 14px 35px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            display: inline-block;
            border: none;
            font-size: 16px;
            box-shadow: 0 5px 15px rgba(39, 174, 96, 0.3);
            cursor: pointer;
        }
        
        .btn-custom:hover {
            background: #219a52;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(39, 174, 96, 0.4);
        }
        
        .btn-outline-custom {
            background: transparent;
            color: white;
            padding: 14px 35px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            display: inline-block;
            border: 2px solid white;
            margin-left: 15px;
            cursor: pointer;
        }
        
        .btn-outline-custom:hover {
            background: white;
            color: var(--primary-color);
            transform: translateY(-3px);
        }
        
        .hero-image {
            position: relative;
            z-index: 2;
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        
        /* Section Headers */
        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }
        
        .section-header h2 {
            color: var(--heading-color);
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
        }
        
        .section-header h2:after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: var(--secondary-color);
            border-radius: 2px;
        }
        
        .section-header p {
            color: #666;
            font-size: 18px;
            max-width: 700px;
            margin: 25px auto 0;
            line-height: 1.8;
        }
        
        /* Cards */
        .card-custom {
            background: white;
            border-radius: 15px;
            padding: 35px 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            transition: all 0.3s;
            height: 100%;
            border: none;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .card-custom:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--secondary-color);
            transform: scaleX(0);
            transition: transform 0.3s;
        }
        
        .card-custom:hover:before {
            transform: scaleX(1);
        }
        
        .card-custom:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        
        .card-custom i {
            font-size: 48px;
            color: var(--secondary-color);
            margin-bottom: 25px;
            background: rgba(39, 174, 96, 0.1);
            width: 80px;
            height: 80px;
            line-height: 80px;
            border-radius: 50%;
            display: inline-block;
        }
        
        .card-custom h4 {
            color: var(--heading-color);
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 15px;
        }
        
        /* Stats Section */
        .stats-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, #34495e 100%);
            color: white;
            padding: 80px 0;
            position: relative;
        }
        
        .stat-item {
            text-align: center;
            padding: 20px;
        }
        
        .stat-number {
            font-size: 54px;
            font-weight: 800;
            margin-bottom: 5px;
            color: var(--secondary-color);
            line-height: 1;
        }
        
        .stat-label {
            font-size: 16px;
            opacity: 0.9;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        /* Footer */
        .footer {
            background: var(--primary-color);
            color: white;
            padding: 70px 0 20px;
            position: relative;
        }
        
        .footer h5 {
            color: white;
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 25px;
            position: relative;
            padding-bottom: 12px;
        }
        
        .footer h5:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--secondary-color);
            border-radius: 2px;
        }
        
        .footer ul {
            list-style: none;
            padding: 0;
        }
        
        .footer ul li {
            margin-bottom: 12px;
        }
        
        .footer ul li a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .footer ul li a:hover {
            color: var(--secondary-color);
            padding-left: 8px;
        }
        
        .footer .social-links a {
            display: inline-block;
            width: 36px;
            height: 36px;
            background: rgba(255,255,255,0.1);
            text-align: center;
            line-height: 36px;
            border-radius: 50%;
            margin-right: 8px;
            color: white;
            transition: all 0.3s;
        }
        
        .footer .social-links a:hover {
            background: var(--secondary-color);
            transform: translateY(-3px);
        }
        
        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            margin-top: 50px;
            padding-top: 25px;
            text-align: center;
            color: rgba(255,255,255,0.6);
        }
        
        /* Responsive */
        @media (max-width: 991px) {
            body {
                padding-top: 140px;
            }
            
            .main-nav {
                top: 80px;
            }
            
            .search-form {
                margin-top: 15px;
                width: 100%;
            }
            
            .hero-title {
                font-size: 42px;
            }
            
            .hero-title span {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <!-- Top Bar with Company Info -->
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <a href=""><i class="fas fa-map-marker-alt"></i> 399/A, Manik Chamber, Grant Road East, Mumbai – 400007</a>
                    <a href=""><i class="fas fa-envelope"></i> info@corranpharma.com</a>
                    <a href=""><i class="fas fa-phone"></i> +91 8898851830</a>
                </div>
                <div class="col-md-4 text-end social-icons">
                    @if(isset($settings['facebook_url']) && $settings['facebook_url'])
                        <a href="{{ $settings['facebook_url'] }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if(isset($settings['twitter_url']) && $settings['twitter_url'])
                        <a href="{{ $settings['twitter_url'] }}" target="_blank"><i class="fab fa-twitter"></i></a>
                    @endif
                    @if(isset($settings['linkedin_url']) && $settings['linkedin_url'])
                        <a href="{{ $settings['linkedin_url'] }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    @endif
                    @if(isset($settings['instagram_url']) && $settings['instagram_url'])
                        <a href="{{ $settings['instagram_url'] }}" target="_blank"><i class="fab fa-instagram"></i></a>
                    @endif
                    @if(isset($settings['youtube_url']) && $settings['youtube_url'])
                        <a href="{{ $settings['youtube_url'] }}" target="_blank"><i class="fab fa-youtube"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="main-nav">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        Corran Pharma
                        <span>Ready to Care with... Dedication!</span>
                    </a>
                </div>
                <div class="col-lg-6">
                    <ul class="nav justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('products') ? 'active' : '' }}" href="{{ route('products') }}">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('certificates') ? 'active' : '' }}" href="{{ route('certificates') }}">Certifications</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <form action="{{ route('products') }}" method="GET" class="search-form">
                        <input type="text" name="search" placeholder="Search products..." value="{{ request('search') }}">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5>Corran Pharma Pvt. Ltd.</h5>
                    <p>Ready to Care with... Dedication! At Corran Pharma, caring is more than our commitment — it's our identity.</p>
                    <div class="social-links mt-4">
                        @if(isset($settings['facebook_url']) && $settings['facebook_url'])
                            <a href="{{ $settings['facebook_url'] }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        @endif
                        @if(isset($settings['twitter_url']) && $settings['twitter_url'])
                            <a href="{{ $settings['twitter_url'] }}" target="_blank"><i class="fab fa-twitter"></i></a>
                        @endif
                        @if(isset($settings['linkedin_url']) && $settings['linkedin_url'])
                            <a href="{{ $settings['linkedin_url'] }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        @endif
                        @if(isset($settings['instagram_url']) && $settings['instagram_url'])
                            <a href="{{ $settings['instagram_url'] }}" target="_blank"><i class="fab fa-instagram"></i></a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-2 mb-4">
                    <h5>Quick Links</h5>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('products') }}">Products</a></li>
                        <li><a href="{{ route('certificates') }}">Certifications</a></li>
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 mb-4">
                    <h5>Our Products</h5>
                    <ul>
                        <li><a href="{{ route('products') }}?search=Ncart L">Ncart L</a></li>
                        <li><a href="{{ route('products') }}?search=Roswell C">Roswell C</a></li>
                        <li><a href="{{ route('products') }}?search=Pregalyt">Pregalyt</a></li>
                        <li><a href="{{ route('products') }}?search=CQFrac">CQFrac</a></li>
                        <li><a href="{{ route('products') }}?search=Ansonac TH">Ansonac TH</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 mb-4">
                    <h5>Contact Info</h5>
                    <ul>
                        <li><i class="fas fa-map-marker-alt me-2"></i> 399/A, Manik Chamber, 3rd Floor, Grant Road East, Mumbai – 400007</li>
                        <li><i class="fas fa-envelope me-2"></i> info@corranpharma.com</li>
                        <li><i class="fas fa-phone me-2"></i> +91 8898851830</li>
                        <li><i class="far fa-clock me-2"></i> Mon-Sat, 9:00 AM - 6:00 PM</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p class="mb-0">&copy; {{ date('Y') }} Corran Pharma Pvt. Ltd. All rights reserved. Developed by SUPPORT INDIA TECH</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>