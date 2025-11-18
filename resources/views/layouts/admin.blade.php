<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        :root {
            --admin-primary: #3b82f6;
            --admin-secondary: #1e40af;
            --admin-success: #10b981;
            --admin-warning: #f59e0b;
            --admin-danger: #ef4444;
            --admin-info: #06b6d4;
            --admin-dark: #1f2937;
            --admin-darker: #111827;
            --admin-light: #f8fafc;
            --admin-surface: #ffffff;
            --admin-glass: rgba(255, 255, 255, 0.1);
            --admin-gradient: linear-gradient(135deg, var(--admin-primary) 0%, var(--admin-secondary) 100%);
            --admin-gradient-light: linear-gradient(135deg, rgba(59, 130, 246, 0.1) 0%, rgba(255, 255, 255, 0.1) 100%);
            --sidebar-width: 280px;
            --border-radius: 12px;
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);
            --shadow-xl: 0 20px 25px rgba(0, 0, 0, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, var(--admin-primary), var(--admin-secondary));
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, var(--admin-secondary), var(--admin-primary));
        }

        .admin-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--admin-darker);
            z-index: 1000;
            transition: all 0.3s ease;
            overflow-y: auto;
            box-shadow: var(--shadow-lg);
        }


        .admin-sidebar.collapsed {
            width: 80px;
        }

        .admin-sidebar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
            pointer-events: none;
        }

        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            text-align: center;
        }

        .sidebar-brand {
            color: white;
            font-weight: 700;
            font-size: 1.5rem;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .sidebar-nav {
            padding: 1rem 0;
        }

        .nav-item {
            margin: 0.25rem 1rem;
        }

        .nav-link {
            color: rgba(255,255,255,0.8) !important;
            padding: 0.75rem 1rem;
            border-radius: var(--border-radius);
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transition: all 0.3s ease;
            text-decoration: none;
            font-weight: 500;
        }

        .nav-link:hover, .nav-link.active {
            background: var(--admin-primary);
            color: white !important;
        }

        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            background: transparent;
        }

        .main-content.expanded {
            margin-left: 80px;
        }

        .admin-topbar {
            background: var(--admin-surface);
            padding: 1rem 2rem;
            box-shadow: var(--shadow-sm);
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e5e7eb;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .search-container {
            flex: 1;
            max-width: 400px;
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.5rem;
            border: 1px solid #d1d5db;
            border-radius: var(--border-radius);
            background: #f9fafb;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--admin-primary);
            background: white;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .search-icon {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280;
            font-size: 0.9rem;
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .action-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: var(--border-radius);
            color: #6b7280;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .action-icon:hover {
            background: #f3f4f6;
            color: var(--admin-primary);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem;
            border-radius: var(--border-radius);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .user-profile:hover {
            background: #f3f4f6;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: var(--admin-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-weight: 600;
            color: var(--admin-dark);
            font-size: 0.9rem;
        }

        .user-role {
            font-size: 0.75rem;
            color: #6b7280;
        }

        .topbar-toggle {
            background: none;
            border: none;
            font-size: 1.3rem;
            color: var(--admin-dark);
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .topbar-toggle:hover {
            background: var(--admin-gradient-light);
            transform: scale(1.1);
        }

        .topbar-user {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            background: var(--admin-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            box-shadow: var(--shadow-md);
            transition: all 0.3s ease;
        }

        .user-avatar:hover {
            transform: scale(1.1);
            box-shadow: var(--shadow-lg);
        }

        .content-area {
            padding: 2.5rem;
            background: transparent;
        }

        .stats-card {
            background: var(--admin-surface);
            border-radius: var(--border-radius);
            padding: 1.5rem;
            box-shadow: var(--shadow-sm);
            border: 1px solid #e5e7eb;
            transition: all 0.3s ease;
            height: 100%;
            position: relative;
        }

        .stats-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .stats-card.featured {
            background: var(--admin-primary);
            color: white;
            border-color: var(--admin-primary);
        }

        .stats-card.featured .stats-number,
        .stats-card.featured .stats-label,
        .stats-card.featured .stats-subtitle {
            color: white;
        }

        .stats-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: white;
            margin-bottom: 1rem;
            background: rgba(59, 130, 246, 0.1);
        }

        .stats-card.featured .stats-icon {
            background: rgba(255, 255, 255, 0.2);
        }

        .stats-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--admin-dark);
            margin-bottom: 0.25rem;
        }

        .stats-label {
            color: #6b7280;
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 0.25rem;
        }

        .stats-subtitle {
            color: #9ca3af;
            font-size: 0.75rem;
        }

        .quick-action-card {
            background: var(--admin-surface);
            border-radius: var(--border-radius);
            padding: 1.5rem;
            text-align: center;
            box-shadow: var(--shadow-sm);
            transition: all 0.3s ease;
            border: 1px solid #e5e7eb;
            height: 100%;
        }

        .quick-action-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .action-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            margin: 0 auto 1rem;
        }

        .chart-container {
            background: var(--admin-surface);
            backdrop-filter: blur(20px);
            border-radius: var(--border-radius);
            padding: 2rem;
            box-shadow: var(--shadow-md);
            margin-top: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .recent-activity {
            background: var(--admin-surface);
            backdrop-filter: blur(20px);
            border-radius: var(--border-radius);
            padding: 2rem;
            box-shadow: var(--shadow-md);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .activity-item {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            padding: 1.25rem 0;
            border-bottom: 1px solid rgba(241, 245, 249, 0.5);
            transition: all 0.3s ease;
        }

        .activity-item:hover {
            background: var(--admin-gradient-light);
            margin: 0 -1rem;
            padding-left: 1rem;
            padding-right: 1rem;
            border-radius: 15px;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 50px;
            height: 50px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.1rem;
            box-shadow: var(--shadow-sm);
            transition: all 0.3s ease;
        }

        .activity-item:hover .activity-icon {
            transform: scale(1.1);
            box-shadow: var(--shadow-md);
        }

        .btn-gradient {
            background: var(--admin-gradient);
            border: none;
            color: white;
            font-weight: 600;
            padding: 0.8rem 2rem;
            border-radius: 15px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }

        .btn-gradient::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-gradient:hover::before {
            left: 100%;
        }

        .btn-gradient:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
            color: white;
        }

        .btn-gradient:active {
            transform: translateY(-1px);
        }

        @media (max-width: 768px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }

            .admin-sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .content-area {
                padding: 1.5rem;
            }

            .stats-card, .quick-action-card {
                margin-bottom: 1rem;
            }
        }

        /* Loading animation */
        .loading-shimmer {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: shimmer 2s infinite;
        }

        @keyframes shimmer {
            0% {
                background-position: -200% 0;
            }
            100% {
                background-position: 200% 0;
            }
        }

        /* Floating elements animation */
        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            50% {
                transform: translateY(-8px) rotate(1deg);
            }
        }

        @keyframes floatSlow {
            0%, 100% {
                transform: translateY(0px) scale(1);
            }
            50% {
                transform: translateY(-5px) scale(1.02);
            }
        }

        @keyframes floatFast {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            50% {
                transform: translateY(-12px) rotate(-1deg);
            }
        }

        .floating {
            animation: float 4s ease-in-out infinite;
        }

        .floating-element {
            animation: floatSlow 8s ease-in-out infinite;
        }

        .floating-fast {
            animation: floatFast 3s ease-in-out infinite;
        }

        /* Pulse animation for active elements */
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(102, 126, 234, 0.7);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(102, 126, 234, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(102, 126, 234, 0);
            }
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        /* Glow effects */
        @keyframes glow {
            0%, 100% {
                box-shadow: 0 0 20px rgba(102, 126, 234, 0.3);
            }
            50% {
                box-shadow: 0 0 30px rgba(102, 126, 234, 0.5);
            }
        }

        .glow-effect {
            animation: glow 3s ease-in-out infinite;
        }

        /* Sparkle animation */
        @keyframes sparkle {
            0%, 100% {
                opacity: 0;
                transform: scale(0);
            }
            50% {
                opacity: 1;
                transform: scale(1);
            }
        }

        .sparkle {
            animation: sparkle 2s ease-in-out infinite;
        }

        /* Gradient border animation */
        @keyframes gradient-border {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        .gradient-border {
            background: linear-gradient(45deg, var(--admin-primary), var(--admin-secondary), var(--admin-success), var(--admin-warning));
            background-size: 400% 400%;
            animation: gradient-border 3s ease infinite;
        }
        
        /* Background Soft Colors */
        .bg-soft-primary {
            background-color: rgba(59, 130, 246, 0.1) !important;
        }
        
        .bg-soft-success {
            background-color: rgba(16, 185, 129, 0.1) !important;
        }
        
        .bg-soft-warning {
            background-color: rgba(245, 158, 11, 0.1) !important;
        }
        
        .bg-soft-danger {
            background-color: rgba(239, 68, 68, 0.1) !important;
        }
        
        .bg-soft-info {
            background-color: rgba(6, 182, 212, 0.1) !important;
        }
        
        @media (max-width: 768px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }
            
            .admin-sidebar.show {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    {{-- Modern Sidebar --}}
    <div class="admin-sidebar" id="sidebar">
        <div class="sidebar-header">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
                <i class="fas fa-shield-alt"></i>
                <span class="brand-text">Admin Panel</span>
            </a>
        </div>
        
        <nav class="sidebar-nav">
            <div class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.gallery.index') }}" class="nav-link {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
                    <i class="fas fa-images"></i>
                    <span>Kelola Galeri</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.gallery.create') }}" class="nav-link">
                    <i class="fas fa-plus-circle"></i>
                    <span>Tambah Foto</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('home') }}" class="nav-link" target="_blank">
                    <i class="fas fa-eye"></i>
                    <span>Lihat Website</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.news.index') }}" class="nav-link {{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
                    <i class="fas fa-newspaper"></i>
                    <span>Kelola Berita</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.agenda.index') }}" class="nav-link {{ request()->routeIs('admin.agenda.*') ? 'active' : '' }}">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Kelola Agenda</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.messages.index') }}" class="nav-link {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
                    <i class="fas fa-envelope"></i>
                    <span>Pesan Kontak</span>
                </a>
            </div>
            
            <hr style="border-color: rgba(255,255,255,0.1); margin: 1rem;">
            
            <div class="nav-item">
                <form method="POST" action="{{ route('logout') }}" class="d-inline w-100">
                    @csrf
                    <button type="submit" class="nav-link w-100 text-start border-0 bg-transparent">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </nav>
    </div>

    {{-- Main Content --}}
    <div class="main-content" id="mainContent">
        {{-- Top Bar --}}
        <div class="admin-topbar">
            <div class="search-container">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="search-input" placeholder="Search...">
            </div>
            
            <div class="topbar-actions">
                <div class="action-icon">
                    <i class="fas fa-bell"></i>
                </div>
                <div class="action-icon">
                    <i class="fas fa-home"></i>
                </div>
                <div class="action-icon">
                    <i class="fas fa-cog"></i>
                </div>
                
                <div class="user-profile">
                    <div class="user-info">
                        <div class="user-name">{{ Auth::user()->name }}</div>
                        <div class="user-role">Administrator</div>
                    </div>
                    <div class="user-avatar">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <i class="fas fa-chevron-down" style="color: #6b7280; font-size: 0.8rem;"></i>
                </div>
            </div>
        </div>

        {{-- Content Area --}}
        <div class="content-area">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" data-aos="fade-down">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert" data-aos="fade-down">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 600,
            easing: 'ease-in-out',
            once: true
        });

        // Sidebar Toggle
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
        });

        // Auto-hide alerts
        setTimeout(() => {
            document.querySelectorAll('.alert').forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);

        // Mobile sidebar toggle
        if (window.innerWidth <= 768) {
            document.getElementById('sidebarToggle').addEventListener('click', function() {
                document.getElementById('sidebar').classList.toggle('show');
            });
        }
    </script>
</body>
</html>
