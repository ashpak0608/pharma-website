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
            --sidebar-width: 250px;
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
        }
        
        .wrapper {
            display: flex;
            width: 100%;
        }
        
        #sidebar {
            width: var(--sidebar-width);
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            background-color: var(--primary-color);
            color: white;
            transition: all 0.3s;
            overflow-y: auto;
        }
        
        #sidebar .sidebar-header {
            padding: 20px;
            background-color: #243342;
        }
        
        #sidebar ul.components {
            padding: 20px 0;
        }
        
        #sidebar ul li a {
            padding: 10px 20px;
            font-size: 1.1em;
            display: block;
            color: white;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        #sidebar ul li a:hover {
            background-color: #243342;
        }
        
        #sidebar ul li.active a {
            background-color: var(--secondary-color);
        }
        
        #sidebar ul li a i {
            margin-right: 10px;
        }
        
        #content {
            width: calc(100% - var(--sidebar-width));
            margin-left: var(--sidebar-width);
            padding: 20px;
            transition: all 0.3s;
        }
        
        .navbar {
            background-color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
        }
        
        .card {
            box-shadow: 0 0 10px rgba(0,0,0,.1);
            border: none;
            border-radius: 10px;
        }
        
        .card-header {
            background-color: white;
            border-bottom: 2px solid #f4f6f9;
            font-weight: 600;
        }
        
        .btn-primary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
        
        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }
        
        .badge-success {
            background-color: #27ae60;
        }
        
        .table thead th {
            border-bottom: 2px solid #dee2e6;
            background-color: #f8f9fa;
        }
        
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
                margin-left: var(--sidebar-width);
            }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h4><i class="fas fa-capsules me-2"></i>Corran Pharma</h4>
                <p class="small mb-0">Admin Panel</p>
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
                        <i class="fas fa-box"></i> Products
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
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.settings.index') }}">
                        <i class="fas fa-cog"></i> Settings
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
        </nav>

        <!-- Page Content -->
        <div id="content">
            <nav class="navbar navbar-expand-lg mb-4">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-outline-primary">
                        <i class="fas fa-bars"></i>
                    </button>
                    
                    <div class="ms-auto">
                        <span class="me-3">Welcome, Admin</span>
                    </div>
                </div>
            </nav>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar, #content').toggleClass('active');
            });
        });
    </script>
</body>
</html>