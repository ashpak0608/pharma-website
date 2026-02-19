<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - @yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --sidebar-width: 280px;
            --primary-color: #2c3e50;
            --secondary-color: #27ae60;
            --accent-color: #e67e22;
            --sidebar-bg: #1a2634;
            --topbar-bg: #ffffff;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fc;
            overflow-x: hidden;
        }
        
        .wrapper {
            display: flex;
            width: 100%;
        }
        
        /* Sidebar Styles */
        #sidebar {
            width: var(--sidebar-width);
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            background: linear-gradient(180deg, #1a2634 0%, #0f1a26 100%);
            color: white;
            transition: all 0.3s;
            z-index: 1000;
            box-shadow: 2px 0 20px rgba(0,0,0,0.1);
        }
        
        #sidebar .sidebar-header {
            padding: 25px 20px;
            background: rgba(0,0,0,0.2);
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }
        
        #sidebar .sidebar-header h4 {
            margin: 0;
            font-weight: 700;
            font-size: 24px;
        }
        
        #sidebar .sidebar-header p {
            margin: 5px 0 0;
            font-size: 12px;
            opacity: 0.7;
            letter-spacing: 0.5px;
        }
        
        #sidebar ul.components {
            padding: 20px 0;
        }
        
        #sidebar ul li {
            position: relative;
        }
        
        #sidebar ul li a {
            padding: 15px 25px;
            font-size: 15px;
            display: block;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: all 0.3s;
            border-left: 4px solid transparent;
        }
        
        #sidebar ul li a:hover {
            background: rgba(255,255,255,0.05);
            color: white;
            border-left-color: var(--secondary-color);
        }
        
        #sidebar ul li.active a {
            background: rgba(39, 174, 96, 0.15);
            color: white;
            border-left-color: var(--secondary-color);
            font-weight: 600;
        }
        
        #sidebar ul li a i {
            margin-right: 15px;
            width: 20px;
            text-align: center;
            font-size: 18px;
            color: var(--secondary-color);
        }
        
        #sidebar .sidebar-footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 20px;
            background: rgba(0,0,0,0.2);
            border-top: 1px solid rgba(255,255,255,0.05);
        }
        
        /* Content Area */
        #content {
            width: calc(100% - var(--sidebar-width));
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: all 0.3s;
            background-color: #f4f7fc;
        }
        
        /* Top Navigation */
        .top-navbar {
            background: white;
            padding: 15px 30px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 999;
        }
        
        .toggle-btn {
            background: transparent;
            border: none;
            font-size: 24px;
            color: var(--primary-color);
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .toggle-btn:hover {
            color: var(--secondary-color);
        }
        
        .user-profile {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .user-avatar {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 18px;
        }
        
        .user-info {
            line-height: 1.3;
        }
        
        .user-name {
            font-weight: 600;
            color: var(--primary-color);
        }
        
        .user-role {
            font-size: 12px;
            color: #6c757d;
        }
        
        /* Main Content Area */
        .main-content {
            padding: 30px;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            #sidebar {
                margin-left: calc(var(--sidebar-width) * -1);
            }
            #sidebar.active {
                margin-left: 0;
            }
            #content {
                width: 100%;
                margin-left: 0;
            }
            #content.active {
                width: calc(100% - var(--sidebar-width));
                margin-left: var(--sidebar-width);
            }
            .top-navbar {
                padding: 15px;
            }
            .user-info {
                display: none;
            }
        }
        
        /* Scrollbar Styling */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        ::-webkit-scrollbar-thumb {
            background: var(--secondary-color);
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #219a52;
        }
        
        /* Animations */
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Consistent Button Styling */
.btn-primary {
    background: var(--secondary-color);
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: 500;
    transition: all 0.3s;
}

.btn-primary:hover {
    background: #219a52;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(39, 174, 96, 0.3);
}

.btn-primary i {
    margin-right: 8px;
}

.btn-outline-secondary {
    border: 2px solid #dee2e6;
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: 500;
    transition: all 0.3s;
}

.btn-outline-secondary:hover {
    background: #e9ecef;
    transform: translateY(-2px);
}
    </style>
    @stack('styles')
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h4><i class="fas fa-capsules me-2 text-secondary"></i>Corran Pharma</h4>
                <p>Admin Panel v1.0</p>
            </div>

            <ul class="list-unstyled components">
                <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.categories.index') }}">
                        <i class="fas fa-tags"></i> Categories
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.products.index') }}">
                        <i class="fas fa-capsules"></i> Products
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.certificates.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.certificates.index') }}">
                        <i class="fas fa-certificate"></i> Certificates
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.inquiries.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.inquiries.index') }}">
                        <i class="fas fa-envelope"></i> Inquiries
                        @php
                            $unreadCount = \App\Models\Inquiry::where('status', 0)->count();
                        @endphp
                        @if($unreadCount > 0)
                            <span class="badge bg-danger float-end">{{ $unreadCount }}</span>
                        @endif
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.settings.index') }}">
                        <i class="fas fa-cog"></i> Settings
                    </a>
                </li>
            </ul>

            <div class="sidebar-footer">
                <ul class="list-unstyled">
                    <li>
                        <a href="{{ route('home') }}" target="_blank">
                            <i class="fas fa-external-link-alt"></i> View Website
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="GET" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Page Content -->
        <div id="content">
            <!-- Top Navbar -->
            <div class="top-navbar">
                <div class="d-flex justify-content-between align-items-center">
                    <button type="button" id="sidebarCollapse" class="toggle-btn">
                        <i class="fas fa-bars"></i>
                    </button>
                    
                    <div class="user-profile">
                        <div class="user-info text-end">
                            <div class="user-name">Admin User</div>
                            <div class="user-role">Administrator</div>
                        </div>
                        <div class="user-avatar">
                            A
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar, #content').toggleClass('active');
            });
            
            // Add fade-in animation to main content
            $('.main-content').addClass('fade-in');
        });
    </script>
    @stack('scripts')
</body>
</html>