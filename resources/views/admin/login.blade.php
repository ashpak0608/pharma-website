<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Corran Pharma</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #2c3e50, #3498db);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .login-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            padding: 40px;
            width: 100%;
            max-width: 400px;
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .login-header h3 {
            color: #2c3e50;
            margin-top: 10px;
        }
        
        .btn-login {
            background: #3498db;
            border: none;
            padding: 12px;
            font-weight: 600;
            width: 100%;
            color: white;
            border-radius: 8px;
            transition: all 0.3s;
        }
        
        .btn-login:hover {
            background: #2980b9;
            transform: translateY(-2px);
        }
        
        .form-control {
            border-radius: 8px;
            padding: 12px;
            border: 1px solid #ddd;
        }
        
        .form-control:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 0.2rem rgba(52,152,219,0.25);
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-header">
            <i class="fas fa-capsules fa-3x" style="color: #3498db;"></i>
            <h3>Admin Login</h3>
            <p class="text-muted">Corran Pharma Pvt. Ltd.</p>
        </div>
        
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p class="mb-0">{{ $error }}</p>
                @endforeach
            </div>
        @endif
        
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
            
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>
            
            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            
            <button type="submit" class="btn-login">
                <i class="fas fa-sign-in-alt me-2"></i>Login
            </button>
            
            <div class="text-center mt-3">
                <small class="text-muted">Default: admin@pharma.com / admin123</small>
            </div>
        </form>
    </div>
</body>
</html>