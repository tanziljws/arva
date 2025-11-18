<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Galeri Sekolah')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #0ea5e9;
            --secondary-color: #0284c7;
            --accent-color: #06b6d4;
            --dark-color: #1e293b;
            --light-color: #f1f5f9;
            --gradient-bg: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            --card-shadow: 0 10px 30px rgba(0,0,0,0.1);
            --hover-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            min-height: 100vh;
            line-height: 1.6;
        }

        .navbar {
            background: #ffffff !important;
            border: none;
            border-bottom: 1px solid #e5e7eb;
            box-shadow: none;
            padding: 0.6rem 0 0.2rem;
        }

        .navbar-brand {
            color: #3ba8ff !important;
            font-weight: 800;
            font-size: 1.15rem;
            letter-spacing: .06em;
            text-transform: uppercase;
        }

        .navbar-brand i {
            background: linear-gradient(45deg, #fbbf24, #f59e0b);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));
        }

        .nav-link {
            color: #0f172a !important;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .12em;
            transition: all 0.25s ease;
            border-radius: 999px;
            padding: 0.45rem 0.9rem !important;
            margin: 0 0.2rem;
        }

        .nav-link:hover {
            color: #0b3a66 !important;
            background: #f2f8ff;
        }

        .nav-link.active {
            color: #0b3a66 !important;
            background: #e6f5ff;
            box-shadow: inset 0 -2px 0 0 rgba(59,168,255,.35);
        }

        .nav-divider {
            width: 84%;
            height: 1px;
            background: #e5e7eb;
            margin: 8px auto 10px;
        }

        .container {
            max-width: 1200px;
        }

        .card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: var(--card-shadow);
            background: white;
        }

        .card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: var(--hover-shadow);
        }

        .card-img-top {
            transition: all 0.4s ease;
            filter: brightness(1) saturate(1);
        }

        .card:hover .card-img-top {
            filter: brightness(1.1) saturate(1.2);
            transform: scale(1.05);
        }

        .btn-primary {
            background: var(--gradient-bg);
            border: none;
            border-radius: 25px;
            padding: 0.7rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(14, 165, 233, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(14, 165, 233, 0.4);
            background: linear-gradient(135deg, var(--secondary-color) 0%, var(--primary-color) 100%);
        }

        .form-control, .form-select {
            border: 2px solid #e2e8f0;
            border-radius: 15px;
            padding: 0.7rem 1rem;
            transition: all 0.3s ease;
            background: white;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(14, 165, 233, 0.25);
            transform: translateY(-2px);
        }

        .page-title {
            background: var(--gradient-bg);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
            font-size: 3rem;
            text-align: center;
            margin-bottom: 3rem;
            text-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .search-section {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 3rem;
            box-shadow: var(--card-shadow);
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
            padding: 1rem 0;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            background: white;
            box-shadow: var(--card-shadow);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .gallery-item:hover {
            transform: translateY(-15px) rotate(1deg);
            box-shadow: var(--hover-shadow);
        }

        .gallery-item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: all 0.4s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
            filter: brightness(1.1) saturate(1.3);
        }

        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(14, 165, 233, 0.8), rgba(2, 132, 199, 0.8));
            opacity: 0;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-info {
            padding: 1.5rem;
            text-align: center;
        }

        .gallery-title {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        .gallery-category {
            color: var(--primary-color);
            font-weight: 500;
            font-size: 0.9rem;
            background: rgba(14, 165, 233, 0.1);
            padding: 0.3rem 1rem;
            border-radius: 15px;
            display: inline-block;
        }

        footer {
            background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%) !important;
            color: white;
            margin-top: 4rem;
            padding: 2rem 0;
            text-align: center;
        }

        .loading-spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255,255,255,.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .fade-in {
            animation: fadeIn 0.6s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 768px) {
            .page-title {
                font-size: 2rem;
            }
            
            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 1rem;
            }
            
            .search-section {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    {{-- Modern Navbar --}}
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container d-flex flex-column align-items-center">
            <a class="navbar-brand" href="{{ route('home') }}" data-aos="fade-right">
                <i class="fas fa-camera-retro me-2"></i>Galeri Sekolah
            </a>
            <div class="nav-divider"></div>

            <div class="collapse navbar-collapse show w-100 justify-content-center" id="navbarNav">
                <div class="navbar-nav" data-aos="fade-right">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        <i class="fas fa-home me-1"></i>Beranda
                    </a>
                    <a href="{{ route('gallery.index') }}" class="nav-link {{ request()->routeIs('gallery.*') ? 'active' : '' }}">
                        <i class="fas fa-images me-1"></i>Galeri
                    </a>
                    <a href="{{ route('news.index') }}" class="nav-link {{ request()->routeIs('news.*') ? 'active' : '' }}">
                        <i class="fas fa-newspaper me-1"></i>Berita
                    </a>
                    <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                        <i class="fas fa-envelope me-1"></i>Kontak
                    </a>
                </div>
                <div class="navbar-nav" data-aos="fade-left">
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.*') ? 'active' : '' }}">
                            <i class="fas fa-tachometer-alt me-1"></i>Dashboard Admin
                        </a>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link text-decoration-none">
                                <i class="fas fa-sign-out-alt me-1"></i>Keluar
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}">
                            <i class="fas fa-sign-in-alt me-1"></i>Masuk
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main style="margin-top: 100px; padding: 2rem 0;">
        @if(session('success'))
            <div class="container">
                <div class="alert alert-success alert-dismissible fade show" role="alert" data-aos="fade-down">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="container">
                <div class="alert alert-danger alert-dismissible fade show" role="alert" data-aos="fade-down">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <footer>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <p class="mb-0">
                        &copy; {{ date('Y') }} Galeri Sekolah | Semua hak dilindungi    
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS (Animate On Scroll)
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 100
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Add loading state to buttons
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function() {
                const submitBtn = this.querySelector('button[type="submit"]');
                if (submitBtn) {
                    const originalText = submitBtn.innerHTML;
                    submitBtn.innerHTML = '<span class="loading-spinner me-2"></span>Memproses...';
                    submitBtn.disabled = true;
                }
            });
        });

        // Auto-hide alerts after 5 seconds
        setTimeout(() => {
            document.querySelectorAll('.alert').forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);
    </script>
</body>
</html>
