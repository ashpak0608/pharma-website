@extends('admin.layouts.app')

@section('title', 'Website Settings')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-2">Website Settings</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Settings</li>
                </ol>
            </nav>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.settings.update') }}" method="POST">
                @csrf

                <!-- Settings Tabs - Fixed IDs and targets -->
                <ul class="nav nav-tabs mb-4" id="settingsTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="company-tab" data-bs-toggle="tab" data-bs-target="#company" type="button" role="tab" aria-controls="company" aria-selected="true">
                            <i class="fas fa-building me-2"></i>Company Info
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="home-content-tab" data-bs-toggle="tab" data-bs-target="#home-content" type="button" role="tab" aria-controls="home-content" aria-selected="false">
                            <i class="fas fa-home me-2"></i>Home Page Content
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="false">
                            <i class="fas fa-info-circle me-2"></i>About Page
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="social-tab" data-bs-toggle="tab" data-bs-target="#social" type="button" role="tab" aria-controls="social" aria-selected="false">
                            <i class="fas fa-share-alt me-2"></i>Social Media
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">
                            <i class="fas fa-address-card me-2"></i>Contact Info
                        </button>
                    </li>
                </ul>

                <div class="tab-content" id="settingsTabContent">
                    <!-- Company Info Tab -->
                    <div class="tab-pane fade show active" id="company" role="tabpanel" aria-labelledby="company-tab">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="company_name" class="form-label">Company Name <span class="text-danger">*</span></label>
                                <input type="text" 
                                       class="form-control @error('company_name') is-invalid @enderror" 
                                       id="company_name" 
                                       name="company_name" 
                                       value="{{ old('company_name', $settings['company_name'] ?? 'Corran Pharma Pvt. Ltd.') }}">
                                @error('company_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="company_slogan" class="form-label">Company Slogan</label>
                                <input type="text" 
                                       class="form-control" 
                                       id="company_slogan" 
                                       name="company_slogan" 
                                       value="{{ old('company_slogan', $settings['company_slogan'] ?? 'Ready to Care with... Dedication!') }}">
                                <small class="text-muted">Displayed below company name in header</small>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="company_email" class="form-label">Company Email <span class="text-danger">*</span></label>
                                <input type="email" 
                                       class="form-control @error('company_email') is-invalid @enderror" 
                                       id="company_email" 
                                       name="company_email" 
                                       value="{{ old('company_email', $settings['company_email'] ?? 'info@corranpharma.com') }}">
                                @error('company_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="company_phone" class="form-label">Company Phone <span class="text-danger">*</span></label>
                                <input type="text" 
                                       class="form-control @error('company_phone') is-invalid @enderror" 
                                       id="company_phone" 
                                       name="company_phone" 
                                       value="{{ old('company_phone', $settings['company_phone'] ?? '+91 8898851830') }}">
                                @error('company_phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label for="company_address" class="form-label">Company Address <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('company_address') is-invalid @enderror" 
                                          id="company_address" 
                                          name="company_address" 
                                          rows="3">{{ old('company_address', $settings['company_address'] ?? '399/A, Manik Chamber, 3rd Floor, Office No-G/H, Above Vasant Bhuvan Hotel, Lamington Road, Grant Road East, Mumbai – 400007') }}</textarea>
                                @error('company_address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="gst_number" class="form-label">GST Number</label>
                                <input type="text" 
                                       class="form-control" 
                                       id="gst_number" 
                                       name="gst_number" 
                                       value="{{ old('gst_number', $settings['gst_number'] ?? '27EKEPM8103E1ZA') }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="established_year" class="form-label">Established Year</label>
                                <input type="text" 
                                       class="form-control" 
                                       id="established_year" 
                                       name="established_year" 
                                       value="{{ old('established_year', $settings['established_year'] ?? '2018') }}">
                            </div>
                        </div>
                    </div>

                    <!-- Home Page Content Tab - Fixed ID -->
                    <div class="tab-pane fade" id="home-content" role="tabpanel" aria-labelledby="home-content-tab">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="hero_title" class="form-label">Hero Title</label>
                                <input type="text" 
                                       class="form-control" 
                                       id="hero_title" 
                                       name="hero_title" 
                                       value="{{ old('hero_title', $settings['hero_title'] ?? 'Ready to Care with...') }}">
                            </div>

                            <div class="col-12 mb-3">
                                <label for="hero_subtitle" class="form-label">Hero Subtitle</label>
                                <input type="text" 
                                       class="form-control" 
                                       id="hero_subtitle" 
                                       name="hero_subtitle" 
                                       value="{{ old('hero_subtitle', $settings['hero_subtitle'] ?? 'Dedication!') }}">
                            </div>

                            <div class="col-12 mb-3">
                                <label for="hero_description" class="form-label">Hero Description</label>
                                <textarea class="form-control" 
                                          id="hero_description" 
                                          name="hero_description" 
                                          rows="3">{{ old('hero_description', $settings['hero_description'] ?? 'At Corran Pharma, caring is more than our commitment — it\'s our identity. We are dedicated to providing high-quality pharmaceutical products that improve lives.') }}</textarea>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="about_short" class="form-label">About Short Text (Home Page)</label>
                                <textarea class="form-control" 
                                          id="about_short" 
                                          name="about_short" 
                                          rows="2">{{ old('about_short', $settings['about_short'] ?? 'At Corran Pharma, we believe true healthcare begins with genuine care.') }}</textarea>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="about_description" class="form-label">About Description</label>
                                <textarea class="form-control" 
                                          id="about_description" 
                                          name="about_description" 
                                          rows="4">{{ old('about_description', $settings['about_description'] ?? 'For over 8 years, we have been dedicated to improving lives through high-quality, affordable, and reliable pharmaceutical products. Our unwavering commitment to innovation, excellence, and ethical business practices has helped us earn the trust of healthcare professionals and patients across Maharashtra. We specialize in Orthopedic and Diabetic segments, providing comprehensive healthcare solutions.') }}</textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="years_experience" class="form-label">Years Experience</label>
                                <input type="text" 
                                       class="form-control" 
                                       id="years_experience" 
                                       name="years_experience" 
                                       value="{{ old('years_experience', $settings['years_experience'] ?? '8+') }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="total_products" class="form-label">Total Products</label>
                                <input type="text" 
                                       class="form-control" 
                                       id="total_products" 
                                       name="total_products" 
                                       value="{{ old('total_products', $settings['total_products'] ?? '40+') }}">
                            </div>
                        </div>
                    </div>

                    <!-- About Page Tab -->
                    <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="about_content" class="form-label">About Content</label>
                                <textarea class="form-control" 
                                          id="about_content" 
                                          name="about_content" 
                                          rows="5">{{ old('about_content', $settings['about_content'] ?? 'Corran Pharma, established in 2018, is a fast-growing pharmaceutical company based in Mumbai and operating entirely in Maharashtra. We specialize in Orthopedic and Diabetic segments, providing comprehensive healthcare solutions. Our brands include Ncart L, Roswell C, Pregalyt, CQFrac, Ansonac TH, Rich 60K Tcal O, and Rozansh.') }}</textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="vision" class="form-label">Vision</label>
                                <textarea class="form-control" 
                                          id="vision" 
                                          name="vision" 
                                          rows="3">{{ old('vision', $settings['vision'] ?? 'To be the most trusted partner in healthcare by providing innovative and affordable pharmaceutical solutions.') }}</textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="mission" class="form-label">Mission</label>
                                <textarea class="form-control" 
                                          id="mission" 
                                          name="mission" 
                                          rows="3">{{ old('mission', $settings['mission'] ?? 'To improve lives through high-quality, affordable, and reliable pharmaceutical products while maintaining the highest standards of ethics and integrity.') }}</textarea>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="core_value_1" class="form-label">Core Value 1</label>
                                <input type="text" 
                                       class="form-control" 
                                       id="core_value_1" 
                                       name="core_value_1" 
                                       value="{{ old('core_value_1', $settings['core_value_1'] ?? 'Quality') }}">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="core_value_2" class="form-label">Core Value 2</label>
                                <input type="text" 
                                       class="form-control" 
                                       id="core_value_2" 
                                       name="core_value_2" 
                                       value="{{ old('core_value_2', $settings['core_value_2'] ?? 'Integrity') }}">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="core_value_3" class="form-label">Core Value 3</label>
                                <input type="text" 
                                       class="form-control" 
                                       id="core_value_3" 
                                       name="core_value_3" 
                                       value="{{ old('core_value_3', $settings['core_value_3'] ?? 'Innovation') }}">
                            </div>
                        </div>
                    </div>

                    <!-- Social Media Tab -->
                    <div class="tab-pane fade" id="social" role="tabpanel" aria-labelledby="social-tab">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="facebook_url" class="form-label">
                                    <i class="fab fa-facebook text-primary me-2"></i>Facebook URL
                                </label>
                                <input type="url" 
                                       class="form-control" 
                                       id="facebook_url" 
                                       name="facebook_url" 
                                       placeholder="https://facebook.com/corranpharma"
                                       value="{{ old('facebook_url', $settings['facebook_url'] ?? '') }}">
                                <small class="text-muted">Leave empty to hide Facebook icon</small>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="twitter_url" class="form-label">
                                    <i class="fab fa-twitter text-info me-2"></i>Twitter URL
                                </label>
                                <input type="url" 
                                       class="form-control" 
                                       id="twitter_url" 
                                       name="twitter_url" 
                                       placeholder="https://twitter.com/corranpharma"
                                       value="{{ old('twitter_url', $settings['twitter_url'] ?? '') }}">
                                <small class="text-muted">Leave empty to hide Twitter icon</small>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="linkedin_url" class="form-label">
                                    <i class="fab fa-linkedin text-primary me-2"></i>LinkedIn URL
                                </label>
                                <input type="url" 
                                       class="form-control" 
                                       id="linkedin_url" 
                                       name="linkedin_url" 
                                       placeholder="https://linkedin.com/company/corranpharma"
                                       value="{{ old('linkedin_url', $settings['linkedin_url'] ?? '') }}">
                                <small class="text-muted">Leave empty to hide LinkedIn icon</small>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="instagram_url" class="form-label">
                                    <i class="fab fa-instagram text-danger me-2"></i>Instagram URL
                                </label>
                                <input type="url" 
                                       class="form-control" 
                                       id="instagram_url" 
                                       name="instagram_url" 
                                       placeholder="https://instagram.com/corranpharma"
                                       value="{{ old('instagram_url', $settings['instagram_url'] ?? '') }}">
                                <small class="text-muted">Leave empty to hide Instagram icon</small>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="youtube_url" class="form-label">
                                    <i class="fab fa-youtube text-danger me-2"></i>YouTube URL
                                </label>
                                <input type="url" 
                                       class="form-control" 
                                       id="youtube_url" 
                                       name="youtube_url" 
                                       placeholder="https://youtube.com/c/corranpharma"
                                       value="{{ old('youtube_url', $settings['youtube_url'] ?? '') }}">
                                <small class="text-muted">Leave empty to hide YouTube icon</small>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="whatsapp_number" class="form-label">
                                    <i class="fab fa-whatsapp text-success me-2"></i>WhatsApp Number
                                </label>
                                <input type="text" 
                                       class="form-control" 
                                       id="whatsapp_number" 
                                       name="whatsapp_number" 
                                       placeholder="+918898851830"
                                       value="{{ old('whatsapp_number', $settings['whatsapp_number'] ?? '') }}">
                                <small class="text-muted">Include country code (e.g., +918898851830)</small>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Info Tab -->
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="contact_email" class="form-label">Contact Email</label>
                                <input type="email" 
                                       class="form-control" 
                                       id="contact_email" 
                                       name="contact_email" 
                                       value="{{ old('contact_email', $settings['contact_email'] ?? $settings['company_email'] ?? 'info@corranpharma.com') }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="contact_phone" class="form-label">Contact Phone</label>
                                <input type="text" 
                                       class="form-control" 
                                       id="contact_phone" 
                                       name="contact_phone" 
                                       value="{{ old('contact_phone', $settings['contact_phone'] ?? $settings['company_phone'] ?? '+91 8898851830') }}">
                            </div>

                            <div class="col-12 mb-3">
                                <label for="contact_address" class="form-label">Contact Address</label>
                                <textarea class="form-control" 
                                          id="contact_address" 
                                          name="contact_address" 
                                          rows="3">{{ old('contact_address', $settings['contact_address'] ?? $settings['company_address'] ?? '399/A, Manik Chamber, 3rd Floor, Office No-G/H, Above Vasant Bhuvan Hotel, Lamington Road, Grant Road East, Mumbai – 400007') }}</textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="business_hours" class="form-label">Business Hours</label>
                                <input type="text" 
                                       class="form-control" 
                                       id="business_hours" 
                                       name="business_hours" 
                                       value="{{ old('business_hours', $settings['business_hours'] ?? 'Mon-Sat, 9:00 AM - 6:00 PM') }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="map_embed" class="form-label">Google Maps Embed URL</label>
                                <input type="url" 
                                       class="form-control" 
                                       id="map_embed" 
                                       name="map_embed" 
                                       placeholder="https://www.google.com/maps/embed?pb=..."
                                       value="{{ old('map_embed', $settings['map_embed'] ?? '') }}">
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-end gap-2">
                    <button type="reset" class="btn btn-secondary px-4" onclick="return confirm('Are you sure you want to reset all changes?')">
                        <i class="fas fa-undo me-2"></i>Reset
                    </button>
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save me-2"></i>Save All Settings
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('styles')
<style>
    .nav-tabs {
        border-bottom: 2px solid #e9ecef;
    }
    
    .nav-tabs .nav-link {
        color: #495057;
        font-weight: 500;
        padding: 12px 20px;
        border: none;
        border-bottom: 3px solid transparent;
        background: transparent;
        transition: all 0.3s;
    }
    
    .nav-tabs .nav-link:hover {
        border-bottom-color: var(--secondary-color);
        color: var(--secondary-color);
        background: transparent;
    }
    
    .nav-tabs .nav-link.active {
        color: var(--secondary-color);
        font-weight: 600;
        border-bottom: 3px solid var(--secondary-color);
        background: transparent;
    }
    
    .nav-tabs .nav-link i {
        font-size: 16px;
    }
    
    .form-label {
        font-weight: 500;
        color: #495057;
        margin-bottom: 8px;
    }
    
    .form-control {
        border: 2px solid #e9ecef;
        border-radius: 10px;
        padding: 10px 15px;
        transition: all 0.3s;
    }
    
    .form-control:focus {
        border-color: var(--secondary-color);
        box-shadow: 0 0 0 0.2rem rgba(39, 174, 96, 0.1);
    }
    
    .btn-primary {
        background: var(--secondary-color);
        border: none;
        padding: 10px 25px;
        border-radius: 8px;
        font-weight: 500;
    }
    
    .btn-primary:hover {
        background: #219a52;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(39, 174, 96, 0.3);
    }
    
    .btn-secondary {
        background: #6c757d;
        border: none;
        padding: 10px 25px;
        border-radius: 8px;
        font-weight: 500;
    }
    
    .gap-2 {
        gap: 10px;
    }
</style>
@endpush

@push('scripts')
<script>
    // Initialize Bootstrap tabs
    document.addEventListener('DOMContentLoaded', function() {
        var triggerTabList = [].slice.call(document.querySelectorAll('#settingsTab button'));
        triggerTabList.forEach(function(triggerEl) {
            var tabTrigger = new bootstrap.Tab(triggerEl);
            
            triggerEl.addEventListener('click', function(event) {
                event.preventDefault();
                tabTrigger.show();
            });
        });
    });
</script>
@endpush
@endsection