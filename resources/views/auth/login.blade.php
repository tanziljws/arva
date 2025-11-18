<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Gallery Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: #f3f4f6;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .auth-wrapper {
            min-height: 100vh;
            display: flex;
        }

        .auth-left {
            flex: 1.15;
            position: relative;
            display: flex;
            align-items: flex-end;
            padding: 48px;
            background: url('https://images.unsplash.com/photo-1501594907352-04cda38ebc29?q=80&w=1600&auto=format&fit=crop') center/cover no-repeat;
            border-top-right-radius: 24px;
            border-bottom-right-radius: 24px;
            overflow: hidden;
        }

        .auth-left::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(0,0,0,.55), rgba(0,0,0,.35));
        }

        .left-content {
            position: relative;
            z-index: 1;
            color: #fff;
            max-width: 640px;
        }

        .left-title {
            font-size: 2rem;
            font-weight: 800;
            line-height: 1.2;
            text-shadow: 0 10px 30px rgba(0,0,0,.6);
        }

        .left-desc {
            color: #e5e7eb;
            margin-top: 10px;
        }

        .auth-right {
            flex: 0.85;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }

        .auth-card {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
            padding: 36px;
            width: 100%;
            max-width: 460px;
            border: 1px solid #eef2f7;
        }
        
        .auth-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .auth-logo { display:none; }
        
        .auth-title {
            color: #333;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .auth-subtitle {
            color: #666;
            font-size: 0.9rem;
        }
        
        .form-floating {
            margin-bottom: 20px;
        }
        
        .form-control {
            border: 1.6px solid #e5e7eb;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 1rem;
            transition: all 0.2s ease;
        }
        
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        
        .btn-login {
            background: #111827;
            border: none;
            border-radius: 999px;
            padding: 12px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.2s ease;
            width: 100%;
            color: #fff;
        }
        
        .btn-login:hover { opacity: .9; }

        .divider {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #9ca3af;
            font-size: .9rem;
            margin: 16px 0;
        }
        .divider::before, .divider::after {
            content: '';
            height: 1px;
            background: #e5e7eb;
            flex: 1;
        }

        .google-btn {
            width: 100%;
            border: 1.6px solid #e5e7eb;
            background: #fff;
            border-radius: 999px;
            padding: 10px 14px;
            font-weight: 600;
            color: #111827;
        }
        .google-btn img { width: 18px; height: 18px; margin-right: 8px; }
        
        .form-check-input:checked {
            background-color: #667eea;
            border-color: #667eea;
        }
        
        .auth-links {
            text-align: center;
            margin-top: 20px;
        }
        
        .auth-links a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        
        .auth-links a:hover {
            color: #764ba2;
        }
        
        .alert {
            border-radius: 12px;
            border: none;
        }
        
        .back-to-home {
            position: absolute;
            top: 20px;
            left: 20px;
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s ease;
            z-index: 2;
        }
        
        .back-to-home:hover {
            color: #f8f9fa;
            transform: translateX(-5px);
        }
        
        @media (max-width: 992px) {
            .auth-left { display: none; }
            .auth-right { flex: 1; padding: 24px; }
            .auth-card { margin: 16px; padding: 28px; }
        }
    </style>
</head>
<body>
    <div class="auth-wrapper">
        <div class="auth-left">
            <a href="{{ route('gallery.index') }}" class="back-to-home">
                <i class="fas fa-arrow-left me-2"></i>Kembali ke Galeri
            </a>
            <div class="left-content">
                <h1 class="left-title">Edit Smarter. Export Faster.<br/>Create Anywhere.</h1>
                <p class="left-desc">Dari klip media sosial cepat hingga video panjang, editor kami memudahkan pekerjaan lintas perangkat.</p>
            </div>
        </div>
        <div class="auth-right">
            <div class="auth-card">
                <div class="auth-header">
                    <h2 class="auth-title">Welcome Back!</h2>
                    <p class="auth-subtitle">Masuk untuk mulai mengelola galeri dengan mudah.</p>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-floating">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                               id="email" name="email" placeholder="Email" 
                               value="{{ old('email') }}" required autofocus>
                        <label for="email">
                            <i class="fas fa-envelope me-2"></i>Email
                        </label>
                    </div>

                    <div class="form-floating position-relative">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" 
                               id="password" name="password" placeholder="Password" required>
                        <label for="password">
                            <i class="fas fa-lock me-2"></i>Password
                        </label>
                        <button type="button" class="btn btn-link position-absolute password-toggle" 
                                style="right: 10px; top: 50%; transform: translateY(-50%); border: none; background: none; color: #6c757d; z-index: 10;"
                                onclick="togglePassword('password')">
                            <i class="fas fa-eye" id="password-eye"></i>
                        </button>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="form-check m-0">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">Ingat saya</label>
                        </div>
                        <a href="#" class="text-decoration-none" style="font-size:.9rem;">Lupa password?</a>
                    </div>

                    <button type="submit" class="btn btn-login mb-2">Login</button>

                    <div class="divider"><span>atau lanjut dengan</span></div>

                    <button type="button" class="btn google-btn">
                        <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google"> Continue with Google
                    </button>
                </form>

                <div class="auth-links">
                    <p class="mb-0">Belum punya akun?
                        <a href="{{ route('register') }}">Daftar di sini</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle password visibility
        function togglePassword(fieldId) {
            const passwordField = document.getElementById(fieldId);
            const eyeIcon = document.getElementById(fieldId + '-eye');
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }

        // Add hover effects for password toggle button
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.querySelector('.password-toggle');
            if (toggleButton) {
                toggleButton.addEventListener('mouseenter', function() {
                    this.style.color = '#667eea';
                });
                
                toggleButton.addEventListener('mouseleave', function() {
                    this.style.color = '#6c757d';
                });
            }
        });
    </script>
</body>
</html>
