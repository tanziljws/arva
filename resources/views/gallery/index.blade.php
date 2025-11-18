@extends('layouts.public')

@section('title', 'Galeri Foto Sekolah')

@section('content')
<!-- Hero Section (match landing style) -->
<section class="hero hero-gallery d-flex align-items-center text-white mb-5">
	<div class="container text-center">
		<div class="hero-content">
			<div class="mb-3">
				<i class="fas fa-images fa-2x text-warning"></i>
			</div>
			<h1 class="display-5 fw-bold mb-2">Galeri Foto Sekolah</h1>
			<p class="lead mb-0">Dokumentasi kegiatan dan momen terbaik di SMK Negeri 4 Bogor</p>
		</div>
	</div>
</section>

<div class="container">
    {{-- Hero Title --}}
    <h1 class="page-title" data-aos="fade-up">
        <i class="fas fa-images me-3"></i>Galeri Foto Sekolah
    </h1>

    {{-- Modern Search Section --}}
    <div class="search-section" data-aos="fade-up" data-aos-delay="200">
        <form method="GET" action="{{ route('gallery.index') }}" class="row g-3">
            <div class="col-md-4">
                <label class="form-label fw-semibold">
                    <i class="fas fa-filter me-2"></i>Kategori
                </label>
                <select name="category" class="form-select" onchange="this.form.submit()">
                    <option value="">🎯 Semua Kategori</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>
                            {{ ucfirst($cat) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold">
                    <i class="fas fa-search me-2"></i>Pencarian
                </label>
                <input type="text" name="search" class="form-control" 
                       placeholder="🔍 Cari berdasarkan judul foto..."
                       value="{{ request('search') }}">
            </div>
            <div class="col-md-2">
                <label class="form-label">&nbsp;</label>
                <button type="submit" class="btn btn-light border w-100 d-block text-dark">
                    <i class="fas fa-search me-2"></i>Cari
                </button>
            </div>
        </form>
    </div>

    {{-- Gallery Stats --}}
    @if($galleries->total() > 0)
        <div class="text-center mb-4" data-aos="fade-up" data-aos-delay="300">
            <div class="d-inline-block bg-white rounded-pill px-4 py-2 shadow-sm">
                <i class="fas fa-photo-video text-primary me-2"></i>
                <span class="fw-semibold">{{ $galleries->total() }} foto ditemukan</span>
                @if(request('category') || request('search'))
                    <span class="text-muted ms-2">
                        @if(request('category'))
                            | Kategori: <strong>{{ request('category') }}</strong>
                        @endif
                        @if(request('search'))
                            | Pencarian: <strong>"{{ request('search') }}"</strong>
                        @endif
                    </span>
                @endif
            </div>
        </div>
    @endif

    {{-- Elegant Gallery Grid --}}
    <div class="row g-4 justify-content-center">
        @forelse($galleries as $index => $gallery)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="gallery-card-elegant fade-in" onclick="window.location.href='{{ route('gallery.show', $gallery->id) }}'" data-aos="fade-up" data-aos-delay="{{ ($index % 8) * 100 }}">
                    <div class="card-image-container">
                        <img src="{{ asset('storage/' . $gallery->image) }}" 
                             alt="{{ $gallery->title }}"
                             class="card-image"
                             loading="lazy">
                        <div class="card-overlay">
                            <div class="gallery-content">
                                <div class="gallery-title">{{ $gallery->title }}</div>
                                @if($gallery->category)
                                    <div class="gallery-category">
                                        <i class="fas fa-tag me-1"></i>{{ $gallery->category }}
                                    </div>
                                @endif
                                <div class="gallery-stats">
                                    <a class="btn btn-sm btn-light" href="{{ route('gallery.download', $gallery->id) }}" onclick="event.stopPropagation();">
                                        <i class="fas fa-download me-1"></i>Unduh
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12" data-aos="fade-up">
                <div class="text-center py-5">
                    <div class="mb-4">
                        <i class="fas fa-images text-muted" style="font-size: 4rem; opacity: 0.3;"></i>
                    </div>
                    <h4 class="text-muted mb-3">Belum Ada Foto</h4>
                    <p class="text-muted mb-4">
                        @if(request('category') || request('search'))
                            Tidak ada foto yang sesuai dengan kriteria pencarian Anda.
                        @else
                            Galeri masih kosong. Foto-foto akan segera ditambahkan.
                        @endif
                    </p>
                    @if(request('category') || request('search'))
                        <a href="{{ route('gallery.index') }}" class="btn btn-primary">
                            <i class="fas fa-refresh me-2"></i>Lihat Semua Foto
                        </a>
                    @endif
                </div>
            </div>
        @endforelse
    </div>

    {{-- Modern Pagination --}}
    @if($galleries->hasPages())
        <div class="d-flex justify-content-center mt-5" data-aos="fade-up">
            <div class="bg-white rounded-pill shadow-sm p-2">
                {{ $galleries->appends(request()->query())->links() }}
            </div>
        </div>
    @endif

    {{-- Quick Stats Cards --}}
    @if($galleries->total() > 0)
        <div class="row mt-5" data-aos="fade-up" data-aos-delay="400">
            <div class="col-md-4 mb-3">
                <div class="card text-center border-0 bg-gradient" style="background: linear-gradient(45deg, #667eea, #764ba2);">
                    <div class="card-body text-white">
                        <i class="fas fa-images fa-2x mb-2"></i>
                        <h5 class="mb-0">{{ $galleries->total() }}</h5>
                        <small>Total Foto</small>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center border-0 bg-gradient" style="background: linear-gradient(45deg, #f093fb, #f5576c);">
                    <div class="card-body text-white">
                        <i class="fas fa-tags fa-2x mb-2"></i>
                        <h5 class="mb-0">{{ $categories->count() }}</h5>
                        <small>Kategori</small>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center border-0 bg-gradient" style="background: linear-gradient(45deg, #4facfe, #00f2fe);">
                    <div class="card-body text-white">
                        <i class="fas fa-eye fa-2x mb-2"></i>
                        <h5 class="mb-0">{{ $galleries->currentPage() }}</h5>
                        <small>Halaman {{ $galleries->lastPage() }}</small>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

{{-- Custom CSS for this page --}}
<style>
    :root {
        --primary-color: #3ba8ff; /* biru muda */
        --secondary-color: #0b3a66; /* biru gelap */
        --accent-color: #e6f5ff; /* biru sangat muda */
        --text-dark: #0f172a; /* slate-900 */
        --text-light: #64748b; /* slate-500 */
        --bg-light: #ffffff;
        --line: #e5e7eb;
    }

    /* Hero ringan putih-biru */
    .hero-gallery {
        min-height: 16vh;
        background: #ffffff;
        border-bottom: 1px solid var(--line);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--secondary-color);
    }

    .page-title { display: none; }

    /* Elegant Gallery Cards - Same style as program cards */
    .gallery-card-elegant {
        background: #ffffff;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 1px 2px rgba(0,0,0,.05);
        transition: transform .28s ease, box-shadow .28s ease;
        cursor: pointer;
        height: 320px;
        position: relative;
        z-index: 1;
    }

    .gallery-card-elegant:hover {
        transform: translateY(-4px) scale(1.01);
        box-shadow: 0 8px 24px rgba(0,0,0,.12);
        z-index: 10;
    }

    .gallery-card-elegant::before { display: none; }

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

    .gallery-card-elegant:hover .card-image {
        transform: scale(1.05);
    }

    .card-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(0,0,0,0) 55%, rgba(0,0,0,.65) 100%);
        padding: 22px;
        display: flex;
        align-items: flex-end;
        justify-content: flex-start;
        z-index: 3;
        transition: all .4s ease;
    }

    .gallery-card-elegant:hover .card-overlay {
        background: linear-gradient(transparent, rgba(0, 0, 0, 0.75));
        padding: 46px 20px 28px;
    }

    .gallery-content {
        text-align: left;
        color: #ffffff;
        width: 100%;
    }

    .gallery-title {
        font-size: 1.1rem;
        font-weight: 800;
        letter-spacing: .01em;
        margin-bottom: 6px;
        color: #fff;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.55);
        transition: transform .4s ease;
        position: relative;
        z-index: 4;
        text-transform: uppercase;
    }

    .gallery-card-elegant:hover .gallery-title {
        transform: translateY(-2px);
        font-size: 1.25rem;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.7);
    }

    .gallery-category {
        position: absolute;
        top: 14px;
        left: 14px;
        font-size: 10px;
        letter-spacing: .14em;
        font-weight: 800;
        color: #0b3a66;
        background: rgba(59,168,255,.18);
        backdrop-filter: blur(3px);
        padding: 6px 10px;
        border-radius: 14px;
        margin: 0;
        transition: transform .25s ease;
    }

    .gallery-card-elegant:hover .gallery-category {
        transform: translateY(-3px);
        opacity: 1;
    }

    .gallery-stats {
        display: flex;
        justify-content: flex-start;
        gap: 14px;
        margin-top: 6px;
    }

    .stat-item {
        font-size: 0.85rem;
        opacity: 0.9;
        transition: all 0.5s ease;
    }

    .gallery-card-elegant:hover .stat-item {
        transform: translateY(-2px);
        opacity: 1;
    }

    /* Disable ripple effect */
    .gallery-card-elegant::after { display: none; }

    /* Disable glow effect */
    .gallery-card-elegant:hover { animation: none; }

    /* Removed glowing keyframes */

    /* Animation: visible by default so konten tidak hilang jika JS gagal */
    .fade-in {
        opacity: 1;
        transform: none;
        transition: all 0.3s ease;
    }

    .fade-in.visible {
        opacity: 1;
        transform: none;
    }

    /* Search section styling to match landing */
    .search-section {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 16px;
        padding: 18px 16px;
        box-shadow: 0 8px 18px rgba(0,0,0,0.05);
        margin-bottom: 28px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .gallery-card-elegant {
            height: 280px;
        }

        .gallery-card-elegant:hover {
            transform: translateY(-10px) scale(1.05);
        }

        .gallery-title {
            font-size: 1.1rem;
        }

        .gallery-card-elegant:hover .gallery-title {
            font-size: 1.2rem;
            transform: translateY(-3px) scale(1.05);
        }

        .gallery-card-elegant:hover .card-image {
            transform: scale(1.05);
        }
    }

    @media (max-width: 576px) {
        .gallery-card-elegant {
            height: 250px;
        }

        .gallery-card-elegant:hover {
            transform: translateY(-8px) scale(1.03);
        }

        .gallery-title {
            font-size: 1rem;
        }

        .gallery-card-elegant:hover .gallery-title {
            font-size: 1.1rem;
            transform: translateY(-2px) scale(1.03);
        }

        .gallery-card-elegant:hover .card-image {
            transform: scale(1.03);
        }
    }
</style>
@endsection

<script>
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

    document.querySelectorAll('.fade-in').forEach(el => {
        observer.observe(el);
    });
</script>
