<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Galeri Sekolah - SMK Negeri 4 Bogor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1e3a8a;
            --secondary-color: #dc2626;
            --accent-color: #f59e0b;
            --text-dark: #1f2937;
            --text-light: #6b7280;
            --bg-light: #f8fafc;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
        }

        /* Header */
        .header {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary-color);
        }

        .nav-link {
            font-weight: 500;
            color: var(--text-dark);
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: var(--secondary-color);
        }

        html {
            scroll-behavior: smooth;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(30, 58, 138, 0.8), rgba(30, 58, 138, 0.8)), 
                        url('https://images.unsplash.com/photo-1562774053-701939374585?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            align-items: center;
            color: white;
            text-align: center;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .btn-primary-custom {
            background: #dc2626; /* red */
            color: #ffffff;
            border: 2px solid #dc2626;
            padding: 15px 30px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-primary-custom:hover {
            background: #ffffff; /* animation to white */
            color: #dc2626;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(220, 38, 38, 0.3);
        }

        /* Programs Section */
        .programs {
            padding: 100px 0;
            background: var(--bg-light);
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 1rem;
        }

        .section-subtitle {
            font-size: 1.1rem;
            color: var(--text-light);
            margin-bottom: 3rem;
        }

        .program-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            margin-bottom: 2rem;
        }

        .program-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .program-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .program-card-body {
            padding: 2rem;
        }

        .program-card h5 {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 1rem;
        }

        .program-card p {
            color: var(--text-light);
            margin-bottom: 1.5rem;
        }

        /* Elegant About Section */
        .about-elegant {
            padding: 120px 0;
            background: #ffffff;
            color: var(--dark-color);
            position: relative;
            overflow: hidden;
        }

        .about-elegant::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="elegant-pattern" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="20" cy="20" r="1" fill="rgba(0,0,0,0.06)"/><circle cx="80" cy="80" r="1" fill="rgba(0,0,0,0.06)"/><circle cx="50" cy="10" r="0.5" fill="rgba(0,0,0,0.03)"/><circle cx="10" cy="70" r="0.5" fill="rgba(0,0,0,0.03)"/><circle cx="90" cy="30" r="0.5" fill="rgba(0,0,0,0.03)"/></pattern></defs><rect width="100" height="100" fill="url(%23elegant-pattern)"/></svg>');
            opacity: 0.15;
        }

        .min-vh-80 {
            min-height: 80vh;
        }

        .about-content-elegant {
            position: relative;
            z-index: 2;
            padding-right: 2rem;
        }

        .about-title {
            font-size: 3.2rem;
            font-weight: 700;
            margin-bottom: 2rem;
            color: var(--dark-color);
            text-shadow: none;
            line-height: 1.2;
        }

        .about-description {
            font-size: 1.2rem;
            margin-bottom: 2.5rem;
            color: #475569;
            line-height: 1.8;
            text-shadow: none;
        }

        .btn-elegant {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            background: #dc2626; /* red */
            color: #ffffff;
            border: 2px solid #dc2626;
            padding: 16px 32px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            position: relative;
            overflow: hidden;
        }

        .btn-elegant::before { display: none; }

        .btn-elegant:hover {
            background: #ffffff; /* animation to white */
            color: #dc2626;
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(220, 38, 38, 0.25);
        }

        .btn-elegant:hover::before {
            left: 0;
        }

        .btn-elegant:hover .btn-icon {
            transform: translateX(5px);
        }

        .btn-text {
            position: relative;
            z-index: 1;
        }

        .btn-icon {
            position: relative;
            z-index: 1;
            transition: transform 0.3s ease;
        }

        .about-image-elegant {
            position: relative;
            z-index: 2;
        }

        .image-container {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(0,0,0,0.3);
            transition: transform 0.4s ease;
        }

        .image-container:hover {
            transform: scale(1.02);
        }

        .school-image {
            width: 100%;
            height: 500px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .image-container:hover .school-image {
            transform: scale(1.05);
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(139, 0, 0, 0.1), rgba(255, 59, 59, 0.1));
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .image-container:hover .image-overlay {
            opacity: 1;
        }

        /* Events Section */
        .events {
            padding: 100px 0;
            background: white;
        }

        .event-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            margin-bottom: 2rem;
        }

        .event-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }

        .event-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .event-card-body {
            padding: 1.5rem;
        }

        .event-date {
            background: var(--secondary-color);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 1rem;
        }

        .event-card h5 {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .event-location {
            color: var(--text-light);
            font-size: 0.9rem;
        }

        /* Footer */
        .footer {
            background: #1f2937;
            color: white;
            padding: 60px 0 30px;
        }

        .footer h5 {
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        .footer ul {
            list-style: none;
            padding: 0;
        }

        .footer ul li {
            margin-bottom: 0.5rem;
        }

        .footer ul li a {
            color: #9ca3af;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer ul li a:hover {
            color: white;
        }

        .social-icons a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background: var(--secondary-color);
            color: white;
            text-align: center;
            line-height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            transition: all 0.3s ease;
        }

        .social-icons a:hover {
            background: #b91c1c;
            transform: translateY(-3px);
        }

        /* Feature Icons */
        .feature-icon {
            transition: all 0.3s ease;
        }

        .icon-circle {
            width: 80px;
            height: 80px;
            background: var(--secondary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            transition: all 0.3s ease;
        }

        .icon-circle i {
            font-size: 2rem;
            color: white;
        }

        .feature-icon:hover .icon-circle {
            background: var(--primary-color);
            transform: scale(1.1);
        }

        .feature-icon:hover {
            transform: translateY(-5px);
        }

        /* Program and Event Actions */
        .program-actions, .event-actions {
            margin-top: 1rem;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .program-card:hover .program-actions,
        .event-card:hover .event-actions {
            opacity: 1;
        }

        .program-card, .event-card, .feature-icon {
            cursor: pointer;
        }

        /* Modal Styles */
        .modal-content {
            border-radius: 15px;
            border: none;
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .modal-header {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            border-radius: 15px 15px 0 0;
        }

        .modal-body {
            padding: 2rem;
        }

        .detail-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 1rem;
        }

        /* Campus Life */
        .campus-life h2 {
            font-weight: 700;
        }

        /* Apply Admission */
        .admission-form {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .admission-form .form-control,
        .admission-form .form-select {
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }

        .admission-form .form-control:focus,
        .admission-form .form-select:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.2rem rgba(220, 38, 38, 0.25);
        }

        /* Newsletter */
        .newsletter-form .form-control {
            border: none;
            border-radius: 8px 0 0 8px;
            padding: 15px 20px;
        }

        .newsletter-form .btn {
            border-radius: 0 8px 8px 0;
            padding: 15px 25px;
        }


        /* Elegant Program Cards */
        .program-card-elegant {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            cursor: pointer;
            height: 320px;
            position: relative;
            z-index: 1;
        }

        .program-card-elegant:hover {
            transform: translateY(-15px) scale(1.08);
            box-shadow: 0 25px 50px rgba(30, 58, 138, 0.25), 
                        0 0 0 1px rgba(30, 58, 138, 0.1);
            z-index: 10;
        }

        .program-card-elegant::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(30, 58, 138, 0.1), rgba(220, 38, 38, 0.1));
            opacity: 0;
            transition: opacity 0.5s ease;
            z-index: 1;
            border-radius: 20px;
        }

        .program-card-elegant:hover::before {
            opacity: 1;
        }

        .card-image-container {
            position: relative;
            height: 100%;
            overflow: hidden;
            z-index: 2;
        }

        .card-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .program-card-elegant:hover .card-image {
            transform: scale(1.15);
        }

        .card-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(30, 58, 138, 0.95));
            padding: 40px 20px 25px;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            z-index: 3;
            transition: all 0.5s ease;
        }

        .program-card-elegant:hover .card-overlay {
            background: linear-gradient(transparent, rgba(30, 58, 138, 0.98));
            padding: 50px 20px 30px;
        }

        .program-label {
            color: white;
            font-size: 1.4rem;
            font-weight: 700;
            text-align: center;
            letter-spacing: 1px;
            text-shadow: 0 3px 6px rgba(0, 0, 0, 0.4);
            transition: all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
            z-index: 4;
        }

        .program-card-elegant:hover .program-label {
            transform: translateY(-5px) scale(1.1);
            font-size: 1.6rem;
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }

        /* Ripple effect for program cards */
        .program-card-elegant::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: radial-gradient(circle, rgba(30, 58, 138, 0.3) 0%, transparent 70%);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: all 0.6s ease;
            z-index: 0;
        }

        .program-card-elegant:hover::after {
            width: 300px;
            height: 300px;
        }

        /* Glow effect for program cards */
        .program-card-elegant {
            position: relative;
        }

        .program-card-elegant:hover {
            animation: cardGlow 2s ease-in-out infinite alternate;
        }

        @keyframes cardGlow {
            0% {
                box-shadow: 0 25px 50px rgba(30, 58, 138, 0.25), 
                            0 0 0 1px rgba(30, 58, 138, 0.1),
                            0 0 20px rgba(30, 58, 138, 0.1);
            }
            100% {
                box-shadow: 0 25px 50px rgba(30, 58, 138, 0.35), 
                            0 0 0 1px rgba(30, 58, 138, 0.2),
                            0 0 30px rgba(30, 58, 138, 0.2);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .hero-content p {
                font-size: 1rem;
            }
            
            .hero {
                padding-top: 80px;
            }
            
            .programs, .about, .events {
                padding: 60px 0;
            }

            .program-card-elegant {
                height: 280px;
            }

            .program-card-elegant:hover {
                transform: translateY(-10px) scale(1.05);
            }

            .program-label {
                font-size: 1.2rem;
            }

            .program-card-elegant:hover .program-label {
                font-size: 1.4rem;
                transform: translateY(-3px) scale(1.05);
            }

            .program-card-elegant:hover .card-image {
                transform: scale(1.1);
            }
        }

        @media (max-width: 576px) {
            .program-card-elegant {
                height: 250px;
            }

            .program-card-elegant:hover {
                transform: translateY(-8px) scale(1.03);
            }

            .program-label {
                font-size: 1.1rem;
            }

            .program-card-elegant:hover .program-label {
                font-size: 1.3rem;
                transform: translateY(-2px) scale(1.03);
            }

            .program-card-elegant:hover .card-image {
                transform: scale(1.08);
            }

            .about-elegant {
                padding: 80px 0;
            }

            .about-title {
                font-size: 2.5rem;
            }

            .about-description {
                font-size: 1.1rem;
            }

            .about-content-elegant {
                padding-right: 0;
                margin-bottom: 2rem;
            }

            .school-image {
                height: 350px;
            }

            .min-vh-80 {
                min-height: auto;
            }
        }

        @media (max-width: 576px) {
            .hero-content h1 {
                font-size: 2rem;
            }
            
            .section-title {
                font-size: 1.8rem;
            }
            
            .btn-primary-custom {
                padding: 12px 24px;
                font-size: 1rem;
            }

            .about-elegant {
                padding: 60px 0;
            }

            .about-title {
                font-size: 2rem;
                margin-bottom: 1.5rem;
            }

            .about-description {
                font-size: 1rem;
                margin-bottom: 2rem;
            }

            .btn-elegant {
                padding: 14px 28px;
                font-size: 1rem;
            }

            .school-image {
                height: 300px;
            }
        }

        /* Animation */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .fade-in-left {
            opacity: 0;
            transform: translateX(-50px);
            transition: all 0.8s ease;
        }

        .fade-in-left.visible {
            opacity: 1;
            transform: translateX(0);
        }

        .fade-in-right {
            opacity: 0;
            transform: translateX(50px);
            transition: all 0.8s ease;
        }

        .fade-in-right.visible {
            opacity: 1;
            transform: translateX(0);
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <i class="fas fa-graduation-cap me-2"></i>
                    SMK Negeri 4 Bogor
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#home">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#programs">Program</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('events.index') }}">Acara</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('gallery.index') }}">Galeri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">Kontak</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="hero-content fade-in">
                        <div class="mb-4">
                            <i class="fas fa-crown fa-3x text-warning"></i>
                        </div>
                        <h1>Perjalanan Akademik Dimulai di SMK Negeri 4 Bogor</h1>
                        <p>Bergabunglah dengan ribuan siswa yang telah memilih SMK Negeri 4 Bogor sebagai tempat untuk mengembangkan potensi dan meraih kesuksesan di masa depan.</p>
                        <a href="#tentang" class="btn btn-primary-custom">
                            <i class="fas fa-arrow-right me-2"></i>Pelajari Lebih Lanjut
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Programs Section -->
    <section id="programs" class="programs" style="background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%); padding: 100px 0; position: relative;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title" style="color: var(--primary-color); font-size: 2.8rem; font-weight: 700; margin-bottom: 1rem; letter-spacing: -0.5px;">Program Unggulan Kami</h2>
                <p class="section-subtitle" style="color: #64748b; font-size: 1.2rem; margin-bottom: 4rem; max-width: 600px; margin-left: auto; margin-right: auto; line-height: 1.6;">Empat program keahlian unggulan yang mempersiapkan siswa untuk masa depan yang cerah dan berkarir di industri</p>
            </div>
            
            <div class="row g-4 justify-content-center">
                <!-- PPLG Card -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="program-card-elegant fade-in" onclick="showProgramDetail('pplg')">
                        <div class="card-image-container">
                            <img src="https://images.unsplash.com/photo-1517077304055-6e89abbf09b0?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                                 alt="PPLG" class="card-image">
                            <div class="card-overlay">
                                <div class="program-label">PPLG</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TKJ Card -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="program-card-elegant fade-in" onclick="showProgramDetail('tkj')">
                        <div class="card-image-container">
                            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                                 alt="TKJ" class="card-image">
                            <div class="card-overlay">
                                <div class="program-label">TKJ</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TO Card -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="program-card-elegant fade-in" onclick="showProgramDetail('to')">
                        <div class="card-image-container">
                            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                                 alt="TO" class="card-image">
                            <div class="card-overlay">
                                <div class="program-label">TO</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TPFL Card -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="program-card-elegant fade-in" onclick="showProgramDetail('tpfl')">
                        <div class="card-image-container">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                                 alt="TPFL" class="card-image">
                            <div class="card-overlay">
                                <div class="program-label">TPFL</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="tentang" class="about-elegant">
        <div class="container">
            <div class="row align-items-center min-vh-80">
                <div class="col-lg-6">
                    <div class="about-content-elegant fade-in-left">
                        <h2 class="about-title">Tentang SMK Negeri 4 Bogor</h2>
                        <p class="about-description">
                            Sejak didirikan, SMK Negeri 4 Bogor telah menjadi pusat keunggulan pendidikan vokasi yang menghasilkan lulusan berkompeten dan siap kerja. Kami berkomitmen untuk memberikan pendidikan berkualitas yang relevan dengan kebutuhan industri serta mempersiapkan peserta didik menjadi profesional unggul di berbagai bidang.
                        </p>
                        <a href="#tentang" class="btn-elegant">
                            <span class="btn-text">Pelajari Lebih Lanjut</span>
                            <i class="fas fa-arrow-right btn-icon"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-image-elegant fade-in-right">
                        <div class="image-container">
                            <img src="https://images.unsplash.com/photo-1562774053-701939374585?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                                 alt="SMK Negeri 4 Bogor" class="school-image">
                            <div class="image-overlay"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats" style="background: var(--primary-color); color: white; padding: 80px 0;">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="fade-in">
                        <i class="fas fa-users fa-3x mb-3 text-warning"></i>
                        <h3 class="counter" data-target="1200">0</h3>
                        <p>Siswa Aktif</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="fade-in">
                        <i class="fas fa-graduation-cap fa-3x mb-3 text-warning"></i>
                        <h3 class="counter" data-target="95">0</h3>
                        <p>% Kelulusan</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="fade-in">
                        <i class="fas fa-chalkboard-teacher fa-3x mb-3 text-warning"></i>
                        <h3 class="counter" data-target="85">0</h3>
                        <p>Guru Berpengalaman</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="fade-in">
                        <i class="fas fa-trophy fa-3x mb-3 text-warning"></i>
                        <h3 class="counter" data-target="50">0</h3>
                        <p>Prestasi Nasional</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Events Section -->
    <section id="events" class="events">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title fade-in">Acara Mendatang</h2>
                <p class="section-subtitle fade-in">Jangan lewatkan acara-acara menarik yang akan diselenggarakan di sekolah kami</p>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="event-card fade-in" onclick="showEventDetail('pameran')">
                        <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Pameran Karya">
                        <div class="event-card-body">
                            <div class="event-date">20 Januari 2024</div>
                            <h5>Pameran Karya Siswa</h5>
                            <p class="event-location">
                                <i class="fas fa-map-marker-alt me-2"></i>SMK Negeri 4 Bogor
                            </p>
                            <div class="event-actions">
                                <button class="btn btn-sm btn-outline-primary">Lihat Detail</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="event-card fade-in" onclick="showEventDetail('workshop')">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Workshop">
                        <div class="event-card-body">
                            <div class="event-date">25 Januari 2024</div>
                            <h5>Workshop Teknologi Terkini</h5>
                            <p class="event-location">
                                <i class="fas fa-map-marker-alt me-2"></i>Laboratorium Komputer
                            </p>
                            <div class="event-actions">
                                <button class="btn btn-sm btn-outline-primary">Lihat Detail</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="event-card fade-in" onclick="showEventDetail('wisuda')">
                        <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Wisuda">
                        <div class="event-card-body">
                            <div class="event-date">30 Januari 2024</div>
                            <h5>Upacara Wisuda</h5>
                            <p class="event-location">
                                <i class="fas fa-map-marker-alt me-2"></i>Aula Utama
                            </p>
                            <div class="event-actions">
                                <button class="btn btn-sm btn-outline-primary">Lihat Detail</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Campus Life Section -->
    <section class="campus-life" style="background: #1f2937; color: white; padding: 100px 0;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="fade-in">
                        <h2 class="display-4 mb-4">Kehidupan Kampus yang Dinamis di SMK Negeri 4 Bogor</h2>
                        <p class="lead">
                            Bergabunglah dengan komunitas siswa yang aktif dan berprestasi. Nikmati berbagai kegiatan ekstrakurikuler, 
                            organisasi siswa, dan program pengembangan diri yang akan memperkaya pengalaman belajar Anda.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="fade-in">
                        <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Campus Life" class="img-fluid rounded shadow-lg">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Apply for Admission Section -->
    <section class="apply-admission" style="background: var(--bg-light); padding: 100px 0;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="fade-in">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Apply for Admission" class="img-fluid rounded shadow-lg">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="fade-in">
                        <h2 class="section-title mb-4">Daftar Pendaftaran</h2>
                        <p class="section-subtitle mb-4">
                            Bergabunglah dengan keluarga besar SMK Negeri 4 Bogor. Daftarkan diri Anda sekarang dan 
                            mulailah perjalanan menuju masa depan yang cerah.
                        </p>
                        <form class="admission-form">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" placeholder="Masukkan nama lengkap">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" placeholder="Masukkan email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">No. Telepon</label>
                                    <input type="tel" class="form-control" placeholder="Masukkan nomor telepon">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Program Studi</label>
                                    <select class="form-select">
                                        <option>Pilih Program Studi</option>
                                        <option>Pengembangan Perangkat Lunak dan Gim (PPLG)</option>
                                        <option>Teknik Komputer dan Jaringan (TKJ)</option>
                                        <option>Teknik Otomotif (TO)</option>
                                        <option>Teknik Pengelasan dan Fabrikasi Logam (TPFL)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pesan</label>
                                <textarea class="form-control" rows="4" placeholder="Tuliskan pesan Anda"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary-custom">
                                <i class="fas fa-paper-plane me-2"></i>Kirim Pendaftaran
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Feature Icons Section -->
    <section class="feature-icons" style="background: white; padding: 80px 0;">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-2 col-md-4 col-6 mb-4">
                    <div class="feature-icon fade-in" onclick="showFeatureDetail('akademik')">
                        <div class="icon-circle">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h6 class="mt-3">Akademik</h6>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 mb-4">
                    <div class="feature-icon fade-in" onclick="showFeatureDetail('perpustakaan')">
                        <div class="icon-circle">
                            <i class="fas fa-book"></i>
                        </div>
                        <h6 class="mt-3">Perpustakaan</h6>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 mb-4">
                    <div class="feature-icon fade-in" onclick="showFeatureDetail('fasilitas')">
                        <div class="icon-circle">
                            <i class="fas fa-building"></i>
                        </div>
                        <h6 class="mt-3">Fasilitas</h6>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 mb-4">
                    <div class="feature-icon fade-in" onclick="showFeatureDetail('sertifikasi')">
                        <div class="icon-circle">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <h6 class="mt-3">Sertifikasi</h6>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 mb-4">
                    <div class="feature-icon fade-in" onclick="showFeatureDetail('keamanan')">
                        <div class="icon-circle">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h6 class="mt-3">Keamanan</h6>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 mb-4">
                    <div class="feature-icon fade-in" onclick="showFeatureDetail('bimbingan')">
                        <div class="icon-circle">
                            <i class="fas fa-compass"></i>
                        </div>
                        <h6 class="mt-3">Bimbingan</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter" style="background: var(--primary-color); color: white; padding: 80px 0;">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <div class="fade-in">
                        <h2 class="display-5 mb-4">Jangan Lewatkan Berita Terbaru dari Kami</h2>
                        <p class="lead mb-4">
                            Daftarkan email Anda untuk mendapatkan informasi terbaru tentang acara, program, 
                            dan berita menarik dari SMK Negeri 4 Bogor.
                        </p>
                        <form class="newsletter-form">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="email" class="form-control form-control-lg" 
                                               placeholder="Masukkan alamat email Anda">
                                        <button class="btn btn-secondary btn-lg" type="submit">
                                            <i class="fas fa-paper-plane me-2"></i>Berlangganan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5>
                        <i class="fas fa-graduation-cap me-2"></i>
                        SMK Negeri 4 Bogor
                    </h5>
                    <p class="text-light">
                        Sekolah Menengah Kejuruan yang berkomitmen untuk menghasilkan lulusan berkualitas tinggi dengan keterampilan praktis yang relevan dengan kebutuhan industri.
                    </p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 mb-4">
                    <h5>Menu Cepat</h5>
                    <ul>
                        <li><a href="#home">Beranda</a></li>
                        <li><a href="#programs">Program</a></li>
                        <li><a href="{{ route('about') }}">Tentang</a></li>
                        <li><a href="{{ route('events.index') }}">Acara</a></li>
                        <li><a href="{{ route('gallery.index') }}">Galeri</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 mb-4">
                    <h5>Program Studi</h5>
                    <ul>
                        <li><a href="#">Pengembangan Perangkat Lunak dan Gim (PPLG)</a></li>
                        <li><a href="#">Teknik Komputer dan Jaringan (TKJ)</a></li>
                        <li><a href="#">Teknik Otomotif (TO)</a></li>
                        <li><a href="#">Teknik Pengelasan dan Fabrikasi Logam (TPFL)</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 mb-4">
                    <h5>Kontak Kami</h5>
                    <ul>
                        <li>
                            <i class="fas fa-map-marker-alt me-2"></i>
                            Jl. Raya Tajur No. 1, Bogor
                        </li>
                        <li>
                            <i class="fas fa-phone me-2"></i>
                            (0251) 123-4567
                        </li>
                        <li>
                            <i class="fas fa-envelope me-2"></i>
                            info@smkn4bogor.sch.id
                        </li>
                    </ul>
                </div>
            </div>
            <hr class="my-4" style="border-color: #374151;">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="text-light mb-0">
                        &copy; 2024 SMK Negeri 4 Bogor. Semua hak dilindungi.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Detail Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalBody">
                    <!-- Content will be loaded here -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Fade in animation
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in, .fade-in-left, .fade-in-right').forEach(el => {
            observer.observe(el);
        });

        // Counter animation
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    counterObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        document.querySelectorAll('.stats').forEach(section => {
            counterObserver.observe(section);
        });

        // Navbar background on scroll
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.header');
            if (window.scrollY > 100) {
                navbar.style.background = 'rgba(255, 255, 255, 0.95)';
                navbar.style.backdropFilter = 'blur(10px)';
            } else {
                navbar.style.background = 'white';
                navbar.style.backdropFilter = 'none';
            }
        });

        // Counter animation for stats
        function animateCounters() {
            const counters = document.querySelectorAll('.counter');
            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-target'));
                const count = parseInt(counter.innerText);
                const increment = target / 100;
                
                if (count < target) {
                    counter.innerText = Math.ceil(count + increment);
                    setTimeout(() => animateCounters(), 20);
                } else {
                    counter.innerText = target;
                }
            });
        }

        // Parallax effect for hero section
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const hero = document.querySelector('.hero');
            if (hero) {
                hero.style.transform = `translateY(${scrolled * 0.5}px)`;
            }
        });

        // Add hover effects to cards
        document.querySelectorAll('.program-card, .event-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Form handling
        document.querySelectorAll('.admission-form, .newsletter-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Show loading state
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mengirim...';
                submitBtn.disabled = true;
                
                // Simulate form submission
                setTimeout(() => {
                    alert('Terima kasih! Form Anda telah berhasil dikirim.');
                    this.reset();
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }, 2000);
            });
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const offsetTop = target.offsetTop - 80; // Account for fixed header
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Program detail functions
        function showProgramDetail(programId) {
            // Redirect to specific program page
            const programRoutes = {
                'tkj': '{{ route("programs.tkj") }}',
                'pplg': '{{ route("programs.pplg") }}',
                'to': '{{ route("programs.to") }}',
                'tpfl': '{{ route("programs.tpfl") }}'
            };

            const route = programRoutes[programId];
            if (route) {
                window.location.href = route;
            }
        }

        // Event detail functions
        function showEventDetail(eventId) {
            // Redirect to events page
            window.location.href = '{{ route("events.index") }}';
        }

        // Feature detail functions
        function showFeatureDetail(featureId) {
            const features = {
                'akademik': {
                    title: 'Program Akademik Unggulan',
                    image: 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                    description: 'Kami menyediakan program akademik yang komprehensif dengan kurikulum yang disesuaikan dengan kebutuhan industri dan perkembangan teknologi terkini.',
                    details: [
                        'Kurikulum berbasis kompetensi industri',
                        'Pembelajaran praktis dengan rasio 70% praktik, 30% teori',
                        'Guru-guru berpengalaman dan tersertifikasi',
                        'Fasilitas laboratorium lengkap dan modern',
                        'Program magang di perusahaan ternama',
                        'Sertifikasi kompetensi internasional'
                    ]
                },
                'perpustakaan': {
                    title: 'Perpustakaan Digital Modern',
                    image: 'https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                    description: 'Perpustakaan digital dengan koleksi lengkap dan akses online 24/7 untuk mendukung pembelajaran siswa.',
                    details: [
                        'Koleksi buku digital dan fisik lengkap',
                        'Akses online 24 jam sehari',
                        'E-journal dan database akademik',
                        'Ruang baca yang nyaman dan modern',
                        'Layanan referensi dan bimbingan literasi',
                        'Program literasi digital dan media'
                    ]
                },
                'fasilitas': {
                    title: 'Fasilitas Lengkap dan Modern',
                    image: 'https://images.unsplash.com/photo-1562774053-701939374585?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                    description: 'Fasilitas sekolah yang lengkap dan modern untuk mendukung proses pembelajaran yang optimal.',
                    details: [
                        'Laboratorium komputer dengan spesifikasi tinggi',
                        'Studio multimedia dan broadcasting',
                        'Workshop praktik untuk setiap program studi',
                        'Aula serbaguna dan ruang pertemuan',
                        'Lapangan olahraga dan fasilitas rekreasi',
                        'Kantin dan area istirahat yang nyaman'
                    ]
                },
                'sertifikasi': {
                    title: 'Program Sertifikasi Kompetensi',
                    image: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                    description: 'Program sertifikasi kompetensi untuk mempersiapkan siswa memiliki keahlian yang diakui industri.',
                    details: [
                        'Sertifikasi kompetensi nasional (BNSP)',
                        'Sertifikasi internasional (Microsoft, Cisco, Adobe)',
                        'Program persiapan ujian sertifikasi',
                        'Pelatihan soft skills dan leadership',
                        'Program kewirausahaan dan startup',
                        'Bimbingan karir dan job placement'
                    ]
                },
                'keamanan': {
                    title: 'Sistem Keamanan Terpadu',
                    image: 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                    description: 'Sistem keamanan terpadu untuk memastikan lingkungan belajar yang aman dan nyaman bagi seluruh warga sekolah.',
                    details: [
                        'CCTV 24 jam di seluruh area sekolah',
                        'Sistem akses kontrol dan keamanan',
                        'Tim keamanan profesional',
                        'Protokol keamanan dan emergency response',
                        'Program pendidikan keamanan digital',
                        'Kerjasama dengan pihak berwajib'
                    ]
                },
                'bimbingan': {
                    title: 'Bimbingan dan Konseling Komprehensif',
                    image: 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                    description: 'Program bimbingan dan konseling untuk mendukung perkembangan pribadi dan akademik siswa.',
                    details: [
                        'Bimbingan akademik dan belajar',
                        'Konseling pribadi dan sosial',
                        'Program pengembangan karakter',
                        'Bimbingan karir dan minat bakat',
                        'Program anti-bullying dan peer counseling',
                        'Kerjasama dengan orang tua dan keluarga'
                    ]
                }
            };

            const feature = features[featureId];
            if (feature) {
                showFeatureModal(feature.title, feature.image, feature.description, feature.details);
            }
        }

        // Modal functions
        function showModal(title, image, description, details, duration, jobProspects) {
            document.getElementById('detailModalLabel').textContent = title;
            document.getElementById('modalBody').innerHTML = `
                <div class="row">
                    <div class="col-md-4">
                        <img src="${image}" class="detail-image" alt="${title}">
                    </div>
                    <div class="col-md-8">
                        <p class="lead">${description}</p>
                        <h6><i class="fas fa-clock me-2"></i>Durasi: ${duration}</h6>
                        <h6><i class="fas fa-briefcase me-2"></i>Prospek Karir:</h6>
                        <p class="text-muted">${jobProspects}</p>
                    </div>
                </div>
                <hr>
                <h6><i class="fas fa-list me-2"></i>Materi Pembelajaran:</h6>
                <ul class="list-group list-group-flush">
                    ${details.map(detail => `<li class="list-group-item"><i class="fas fa-check text-success me-2"></i>${detail}</li>`).join('')}
                </ul>
                <div class="mt-3">
                    <a href="{{ route('gallery.index') }}" class="btn btn-primary me-2">
                        <i class="fas fa-images me-2"></i>Lihat Galeri
                    </a>
                    <button class="btn btn-outline-primary" data-bs-dismiss="modal">Tutup</button>
                </div>
            `;
            new bootstrap.Modal(document.getElementById('detailModal')).show();
        }

        function showEventModal(title, image, description, details, date, time, location) {
            document.getElementById('detailModalLabel').textContent = title;
            document.getElementById('modalBody').innerHTML = `
                <div class="row">
                    <div class="col-md-4">
                        <img src="${image}" class="detail-image" alt="${title}">
                    </div>
                    <div class="col-md-8">
                        <p class="lead">${description}</p>
                        <h6><i class="fas fa-calendar me-2"></i>Tanggal: ${date}</h6>
                        <h6><i class="fas fa-clock me-2"></i>Waktu: ${time}</h6>
                        <h6><i class="fas fa-map-marker-alt me-2"></i>Lokasi: ${location}</h6>
                    </div>
                </div>
                <hr>
                <h6><i class="fas fa-list me-2"></i>Kegiatan:</h6>
                <ul class="list-group list-group-flush">
                    ${details.map(detail => `<li class="list-group-item"><i class="fas fa-check text-success me-2"></i>${detail}</li>`).join('')}
                </ul>
                <div class="mt-3">
                    <a href="{{ route('gallery.index') }}" class="btn btn-primary me-2">
                        <i class="fas fa-images me-2"></i>Lihat Galeri
                    </a>
                    <button class="btn btn-outline-primary" data-bs-dismiss="modal">Tutup</button>
                </div>
            `;
            new bootstrap.Modal(document.getElementById('detailModal')).show();
        }

        function showFeatureModal(title, image, description, details) {
            document.getElementById('detailModalLabel').textContent = title;
            document.getElementById('modalBody').innerHTML = `
                <div class="row">
                    <div class="col-md-4">
                        <img src="${image}" class="detail-image" alt="${title}">
                    </div>
                    <div class="col-md-8">
                        <p class="lead">${description}</p>
                    </div>
                </div>
                <hr>
                <h6><i class="fas fa-list me-2"></i>Fitur Unggulan:</h6>
                <ul class="list-group list-group-flush">
                    ${details.map(detail => `<li class="list-group-item"><i class="fas fa-check text-success me-2"></i>${detail}</li>`).join('')}
                </ul>
                <div class="mt-3">
                    <a href="{{ route('gallery.index') }}" class="btn btn-primary me-2">
                        <i class="fas fa-images me-2"></i>Lihat Galeri
                    </a>
                    <button class="btn btn-outline-primary" data-bs-dismiss="modal">Tutup</button>
                </div>
            `;
            new bootstrap.Modal(document.getElementById('detailModal')).show();
        }
    </script>
</body>
</html>
