@extends('layouts.app')

@section('title', 'Tentang Kami - SMK Negeri 4 Bogor')

@section('content')
<!-- Hero Section -->
<section class="hero hero-about d-flex align-items-center text-white mb-5">
    <div class="container text-center">
        <div class="hero-content">
            <div class="mb-4">
                <i class="fas fa-school fa-3x text-warning"></i>
            </div>
            <h1 class="display-4 fw-bold mb-3">Tentang SMK Negeri 4 Bogor</h1>
            <p class="lead mb-0">Memulai Perjalanan: Mengungkap Cerita SMK Negeri 4 Bogor</p>
        </div>
    </div>
</section>

<div class="container">
    <!-- About Content -->
    <div class="row mb-5">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h3 class="card-title mb-4">
                        <i class="fas fa-info-circle text-primary me-2"></i>Sejarah Singkat
                    </h3>
                    <p class="lead">
                        Sejak didirikan, SMK Negeri 4 Bogor telah menjadi pusat keunggulan pendidikan vokasi yang menghasilkan lulusan berkualitas tinggi. 
                        Kami berkomitmen untuk memberikan pendidikan yang relevan dengan kebutuhan industri dan mempersiapkan siswa untuk menjadi profesional yang kompeten.
                    </p>
                    <p>
                        Dengan pengalaman bertahun-tahun dalam dunia pendidikan vokasi, kami terus berinovasi dan mengembangkan kurikulum yang sesuai 
                        dengan perkembangan teknologi dan kebutuhan industri masa kini.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h5 class="card-title mb-3">
                        <i class="fas fa-trophy text-success me-2"></i>Prestasi Sekolah
                    </h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-medal text-warning me-2"></i>Sekolah Adiwiyata Nasional</li>
                        <li class="mb-2"><i class="fas fa-medal text-warning me-2"></i>Akreditasi A (Unggul)</li>
                        <li class="mb-2"><i class="fas fa-medal text-warning me-2"></i>ISO 9001:2015</li>
                        <li class="mb-2"><i class="fas fa-medal text-warning me-2"></i>SMK Unggulan Provinsi</li>
                        <li class="mb-2"><i class="fas fa-medal text-warning me-2"></i>Penghargaan Inovasi Pendidikan</li>
                        <li class="mb-2"><i class="fas fa-medal text-warning me-2"></i>Lulusan Terbaik Tingkat Nasional</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Vision Mission -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        <i class="fas fa-eye me-2"></i>Visi, Misi, dan Tujuan
                    </h4>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="text-center">
                                <i class="fas fa-eye fa-3x text-primary mb-3"></i>
                                <h5 class="text-primary">Visi</h5>
                                <p class="text-muted">
                                    "Menjadi SMK unggulan yang menghasilkan lulusan berkarakter, kompeten, dan siap bersaing di era global"
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="text-center">
                                <i class="fas fa-bullseye fa-3x text-success mb-3"></i>
                                <h5 class="text-success">Misi</h5>
                                <ul class="text-start text-muted">
                                    <li>Menyelenggarakan pendidikan vokasi berkualitas</li>
                                    <li>Mengembangkan kurikulum berbasis industri</li>
                                    <li>Membentuk karakter siswa yang berakhlak mulia</li>
                                    <li>Menyediakan fasilitas pembelajaran modern</li>
                                    <li>Membangun kerjasama dengan dunia industri</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="text-center">
                                <i class="fas fa-flag fa-3x text-warning mb-3"></i>
                                <h5 class="text-warning">Tujuan</h5>
                                <ul class="text-start text-muted">
                                    <li>Menghasilkan lulusan yang kompeten</li>
                                    <li>Mengembangkan jiwa kewirausahaan</li>
                                    <li>Meningkatkan daya saing lulusan</li>
                                    <li>Membentuk karakter yang baik</li>
                                    <li>Menyiapkan tenaga kerja terampil</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="card border-0 shadow-sm bg-gradient" style="background: linear-gradient(45deg, #667eea, #764ba2);">
                <div class="card-body text-center text-white p-5">
                    <h3 class="mb-4">Prestasi dan Pencapaian Kami</h3>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="counter-item">
                                <i class="fas fa-users fa-3x mb-3 text-warning"></i>
                                <h3 class="counter" data-target="1200">0</h3>
                                <p>Siswa Aktif</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="counter-item">
                                <i class="fas fa-graduation-cap fa-3x mb-3 text-warning"></i>
                                <h3 class="counter" data-target="95">0</h3>
                                <p>% Kelulusan</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="counter-item">
                                <i class="fas fa-chalkboard-teacher fa-3x mb-3 text-warning"></i>
                                <h3 class="counter" data-target="85">0</h3>
                                <p>Guru Berpengalaman</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="counter-item">
                                <i class="fas fa-trophy fa-3x mb-3 text-warning"></i>
                                <h3 class="counter" data-target="50">0</h3>
                                <p>Prestasi Nasional</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Facilities -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">
                        <i class="fas fa-building me-2"></i>Fasilitas Sekolah
                    </h4>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <div class="text-center">
                                <i class="fas fa-laptop fa-3x text-primary mb-3"></i>
                                <h5>Laboratorium Komputer</h5>
                                <p class="text-muted">8 laboratorium dengan 200+ komputer</p>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center">
                                <i class="fas fa-book fa-3x text-primary mb-3"></i>
                                <h5>Perpustakaan</h5>
                                <p class="text-muted">Koleksi 15,000+ buku dan e-book</p>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center">
                                <i class="fas fa-futbol fa-3x text-primary mb-3"></i>
                                <h5>Lapangan Olahraga</h5>
                                <p class="text-muted">Fasilitas olahraga lengkap</p>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center">
                                <i class="fas fa-utensils fa-3x text-primary mb-3"></i>
                                <h5>Kantin</h5>
                                <p class="text-muted">Kantin sehat dan nyaman</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Gallery -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0">
                        <i class="fas fa-images me-2"></i>Galeri Sekolah
                    </h4>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <img src="https://images.unsplash.com/photo-1562774053-701939374585?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                 class="img-fluid rounded shadow-sm" alt="Gedung Sekolah">
                        </div>
                        <div class="col-md-3 mb-3">
                            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                 class="img-fluid rounded shadow-sm" alt="Laboratorium">
                        </div>
                        <div class="col-md-3 mb-3">
                            <img src="https://images.unsplash.com/photo-1517077304055-6e89abbf09b0?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                 class="img-fluid rounded shadow-sm" alt="Perpustakaan">
                        </div>
                        <div class="col-md-3 mb-3">
                            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                 class="img-fluid rounded shadow-sm" alt="Aula">
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ route('gallery.index') }}" class="btn btn-primary">
                            <i class="fas fa-images me-2"></i>Lihat Galeri Lengkap
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm bg-gradient" style="background: linear-gradient(45deg, #4facfe, #00f2fe);">
                <div class="card-body text-center text-white p-5">
                    <h3 class="mb-3">Bergabunglah dengan Kami</h3>
                    <p class="lead mb-4">Mari bergabung dengan keluarga besar SMK Negeri 4 Bogor dan wujudkan impian Anda</p>
                    <a href="#contact" class="btn btn-light btn-lg me-3">
                        <i class="fas fa-phone me-2"></i>Hubungi Kami
                    </a>
                    <a href="{{ route('gallery.index') }}" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-images me-2"></i>Lihat Galeri
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.hero-about {
    min-height: 50vh;
    background: linear-gradient(rgba(30,58,138,0.85), rgba(30,58,138,0.85)),
        url('https://images.unsplash.com/photo-1562774053-701939374585?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80');
    background-size: cover;
    background-position: center;
    border-bottom-left-radius: 24px;
    border-bottom-right-radius: 24px;
}

.card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important;
}

.counter-item {
    transition: transform 0.3s ease;
}

.counter-item:hover {
    transform: scale(1.05);
}
</style>

<script>
// Counter animation
document.addEventListener('DOMContentLoaded', function() {
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounters();
                counterObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    document.querySelectorAll('.counter').forEach(counter => {
        counterObserver.observe(counter);
    });

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
});
</script>
@endsection
