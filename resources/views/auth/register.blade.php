<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Gallery Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: #f5f5f5; /* light gray background */
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .auth-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .auth-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 100%;
            max-width: 450px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .auth-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .auth-logo {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: white;
            font-size: 2rem;
        }
        
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
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        
        .btn-register {
            background: linear-gradient(135deg, #667eea, #764ba2);
            border: none;
            border-radius: 12px;
            padding: 12px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            width: 100%;
        }
        
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
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
            color: #333;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .back-to-home:hover {
            color: #111;
            transform: translateX(-5px);
        }
        
        .password-strength {
            font-size: 0.8rem;
            margin-top: 5px;
        }
        
        .strength-weak { color: #dc3545; }
        .strength-medium { color: #ffc107; }
        .strength-strong { color: #28a745; }
        
        @media (max-width: 576px) {
            .auth-card {
                margin: 10px;
                padding: 30px 20px;
            }
        }
        /* Split card layout */
        .split-card {
            width: 100%;
            max-width: 980px;
            min-height: 560px;
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0,0,0,.15);
            display: grid;
            grid-template-columns: 1fr 1fr;
        }
        .left-pane {
            position: relative;
            background: linear-gradient(rgba(0,0,0,.35), rgba(0,0,0,.35)),
                        url('https://images.unsplash.com/photo-1517817748496-62c0ae9a57a6?auto=format&fit=crop&w=1200&q=80');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #fff;
            padding: 48px;
            display: flex;
            align-items: flex-end;
        }
        .left-pane .panel-content {
            max-width: 360px;
        }
        .left-pane h2 {
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 12px;
        }
        .right-pane {
            padding: 48px 56px;
        }
        .right-pane .title {
            text-align: center;
            font-weight: 800;
            margin-bottom: 24px;
        }
        .terms {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: .9rem;
            color: #555;
        }
        .btn-dark-rounded {
            background:#111;
            color:#fff;
            border-radius:12px;
            padding:12px 16px;
            width:100%;
            border:none;
        }
        .btn-outline {
            background:#fff;
            border:1px solid #e5e7eb;
            color:#111;
        }
        .or-separator {
            display:flex;
            align-items:center;
            gap:12px;
            color:#999;
            font-size:.9rem;
            margin:12px 0;
        }
        .or-separator::before,
        .or-separator::after { content:""; height:1px; flex:1; background:#eee; }
        @media (max-width: 900px) {
            .split-card { grid-template-columns: 1fr; }
            .left-pane { min-height: 220px; align-items: flex-end; }
        }
    </style>
</head>
<body>
    <a href="{{ route('gallery.index') }}" class="back-to-home">
        <i class="fas fa-arrow-left me-2"></i>Kembali ke Galeri
    </a>
    
    <div class="auth-container">
        <div class="split-card">
            <div class="left-pane">
                <div class="panel-content">
                    <h2>Create your<br>Account</h2>
                    <p>Share your artwork and get projects!</p>
                </div>
            </div>
            <div class="right-pane">
                <h3 class="title">Sign Up</h3>

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
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form id="register-form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <input type="hidden" id="name" name="name" value="{{ old('name') }}">

                    <div class="row g-3 mb-2">
                        <div class="col-12 col-md-6">
                            <input type="text" class="form-control" id="first_name" placeholder="First name" autofocus>
                        </div>
                        <div class="col-12 col-md-6">
                            <input type="text" class="form-control" id="last_name" placeholder="Last name">
                        </div>
                    </div>

                    <div class="mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email address" value="{{ old('email') }}" required>
                    </div>

                    <div class="position-relative mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
                        <button type="button" class="btn btn-link position-absolute password-toggle" style="right: 10px; top: 50%; transform: translateY(-50%); border: none; background: none; color: #6c757d; z-index: 10;" onclick="togglePassword('password')">
                            <i class="fas fa-eye" id="password-eye"></i>
                        </button>
                        <div class="password-strength"><small>Minimal 8 karakter</small></div>
                    </div>

                    <div class="position-relative mb-3">
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Confirm password" required>
                        <button type="button" class="btn btn-link position-absolute password-toggle" style="right: 10px; top: 50%; transform: translateY(-50%); border: none; background: none; color: #6c757d; z-index: 10;" onclick="togglePassword('password_confirmation')">
                            <i class="fas fa-eye" id="password_confirmation-eye"></i>
                        </button>
                    </div>

                    <div class="mb-3 terms">
                        <input type="checkbox" id="terms">
                        <label for="terms" class="mb-0">Accept Terms & Conditions</label>
                    </div>

                    <button type="submit" class="btn-dark-rounded mb-2">Join us →</button>
                    <div class="or-separator">or</div>
                    <button type="button" class="btn-dark-rounded btn-outline mb-2"><i class="fa-brands fa-google me-2"></i> Sign up with Google</button>
                    <button type="button" class="btn-dark-rounded btn-outline"><i class="fa-brands fa-apple me-2"></i> Sign up with Apple</button>
                </form>

                <div class="auth-links mt-3">
                    <p class="mb-0">Sudah punya akun?
                        <a href="{{ route('login') }}">Masuk di sini</a>
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

        // Password strength indicator
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthDiv = document.querySelector('.password-strength');
            
            if (password.length === 0) {
                strengthDiv.innerHTML = '<small>Minimal 8 karakter</small>';
                return;
            }
            
            let strength = 0;
            if (password.length >= 8) strength++;
            if (/[a-z]/.test(password)) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[^A-Za-z0-9]/.test(password)) strength++;
            
            let strengthText = '';
            let strengthClass = '';
            
            if (strength < 3) {
                strengthText = 'Lemah';
                strengthClass = 'strength-weak';
            } else if (strength < 4) {
                strengthText = 'Sedang';
                strengthClass = 'strength-medium';
            } else {
                strengthText = 'Kuat';
                strengthClass = 'strength-strong';
            }
            
            strengthDiv.innerHTML = `<small class="${strengthClass}">Kekuatan password: ${strengthText}</small>`;
        });

        // Add hover effects for password toggle buttons
        document.querySelectorAll('.password-toggle').forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.style.color = '#667eea';
            });
            
            button.addEventListener('mouseleave', function() {
                this.style.color = '#6c757d';
            });
        });

        // Combine first and last name into hidden name field before submit
        document.getElementById('register-form').addEventListener('submit', function(e){
            const first = document.getElementById('first_name').value.trim();
            const last = document.getElementById('last_name').value.trim();
            document.getElementById('name').value = [first, last].filter(Boolean).join(' ');
        });
    </script>
</body>
</html>
