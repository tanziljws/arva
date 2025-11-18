@extends('layouts.app')

@section('title', 'Teknik Pengelasan dan Fabrikasi Logam (TPFL) - SMK Negeri 4 Bogor')

@section('content')
<!-- Hero Section -->
<section class="hero hero-program d-flex align-items-center text-white mb-5">
    <div class="container text-center">
        <div class="hero-content">
            <div class="mb-4">
                <i class="fas fa-hammer fa-3x text-warning"></i>
            </div>
            <h1 class="display-4 fw-bold mb-3">Teknik Pengelasan dan Fabrikasi Logam (TPFL)</h1>
            <p class="lead mb-0">Menguasai teknik pengelasan dan fabrikasi logam untuk industri</p>
        </div>
    </div>
</section>

<div class="container">
    <!-- Program Overview -->
    <div class="row mb-5">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h3 class="card-title mb-4">
                        <i class="fas fa-info-circle text-primary me-2"></i>Tentang Program
                    </h3>
                    <p class="lead">
                        Program studi Teknik Pengelasan dan Fabrikasi Logam (TPFL) mempersiapkan siswa untuk menjadi teknisi 
                        pengelasan dan fabrikasi logam yang handal. Siswa akan mempelajari berbagai teknik pengelasan, 
                        fabrikasi logam, dan teknologi manufaktur modern.
                    </p>
                    <p>
                        Dengan kurikulum yang disesuaikan dengan kebutuhan industri, program ini memberikan pengalaman 
                        pembelajaran yang komprehensif mulai dari dasar-dasar pengelasan hingga teknologi fabrikasi logam 
                        yang canggih.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h5 class="card-title mb-3">
                        <i class="fas fa-chart-line text-success me-2"></i>Prospek Karir
                    </h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Welder (Pengelas)</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Fabricator</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Metal Worker</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Quality Inspector</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Production Supervisor</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Manufacturing Engineer</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Curriculum -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        <i class="fas fa-book me-2"></i>Kurikulum Pembelajaran
                    </h4>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="text-primary mb-3">Tahun Pertama</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item border-0 px-0">
                                    <i class="fas fa-fire text-primary me-2"></i>Dasar-dasar Pengelasan
                                </li>
                                <li class="list-group-item border-0 px-0">
                                    <i class="fas fa-tools text-primary me-2"></i>Alat-alat Fabrikasi
                                </li>
                                <li class="list-group-item border-0 px-0">
                                    <i class="fas fa-cube text-primary me-2"></i>Material Logam
                                </li>
                                <li class="list-group-item border-0 px-0">
                                    <i class="fas fa-shield-alt text-primary me-2"></i>Keselamatan Kerja
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-primary mb-3">Tahun Kedua</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item border-0 px-0">
                                    <i class="fas fa-bolt text-primary me-2"></i>Pengelasan Listrik
                                </li>
                                <li class="list-group-item border-0 px-0">
                                    <i class="fas fa-fire text-primary me-2"></i>Pengelasan Gas
                                </li>
                                <li class="list-group-item border-0 px-0">
                                    <i class="fas fa-cogs text-primary me-2"></i>Fabrikasi Logam
                                </li>
                                <li class="list-group-item border-0 px-0">
                                    <i class="fas fa-search text-primary me-2"></i>Quality Control
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <h5 class="text-primary mb-3">Tahun Ketiga</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item border-0 px-0">
                                    <i class="fas fa-project-diagram text-primary me-2"></i>Proyek Akhir
                                </li>
                                <li class="list-group-item border-0 px-0">
                                    <i class="fas fa-briefcase text-primary me-2"></i>Magang Industri
                                </li>
                                <li class="list-group-item border-0 px-0">
                                    <i class="fas fa-certificate text-primary me-2"></i>Sertifikasi Kompetensi
                                </li>
                                <li class="list-group-item border-0 px-0">
                                    <i class="fas fa-graduation-cap text-primary me-2"></i>Persiapan Karir
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-primary mb-3">Teknik Pengelasan</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item border-0 px-0">
                                    <i class="fas fa-bolt text-warning me-2"></i>SMAW (Shielded Metal Arc)
                                </li>
                                <li class="list-group-item border-0 px-0">
                                    <i class="fas fa-fire text-warning me-2"></i>GTAW (Gas Tungsten Arc)
                                </li>
                                <li class="list-group-item border-0 px-0">
                                    <i class="fas fa-wind text-warning me-2"></i>GMAW (Gas Metal Arc)
                                </li>
                                <li class="list-group-item border-0 px-0">
                                    <i class="fas fa-fire text-warning me-2"></i>Oxy-Acetylene Welding
                                </li>
                            </ul>
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
                        <i class="fas fa-building me-2"></i>Fasilitas Laboratorium
                    </h4>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="text-center">
                                <i class="fas fa-fire fa-3x text-primary mb-3"></i>
                                <h5>Workshop Pengelasan</h5>
                                <p class="text-muted">Workshop lengkap dengan peralatan pengelasan modern</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="text-center">
                                <i class="fas fa-hammer fa-3x text-primary mb-3"></i>
                                <h5>Workshop Fabrikasi</h5>
                                <p class="text-muted">Workshop untuk praktik fabrikasi logam</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="text-center">
                                <i class="fas fa-search fa-3x text-primary mb-3"></i>
                                <h5>Lab Quality Control</h5>
                                <p class="text-muted">Laboratorium untuk pengujian kualitas hasil</p>
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
                        <i class="fas fa-images me-2"></i>Galeri Program TPFL
                    </h4>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                 class="img-fluid rounded shadow-sm" alt="Workshop Pengelasan">
                        </div>
                        <div class="col-md-3 mb-3">
                            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                 class="img-fluid rounded shadow-sm" alt="Praktik Fabrikasi">
                        </div>
                        <div class="col-md-3 mb-3">
                            <img src="https://images.unsplash.com/photo-1517077304055-6e89abbf09b0?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                 class="img-fluid rounded shadow-sm" alt="Quality Control">
                        </div>
                        <div class="col-md-3 mb-3">
                            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                 class="img-fluid rounded shadow-sm" alt="Hasil Karya">
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
            <div class="card border-0 shadow-sm bg-gradient" style="background: linear-gradient(45deg, #2c3e50, #34495e);">
                <div class="card-body text-center text-white p-5">
                    <h3 class="mb-3">Tertarik dengan Program TPFL?</h3>
                    <p class="lead mb-4">Bergabunglah dengan kami dan kuasai teknik pengelasan dan fabrikasi logam</p>
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
.hero-program {
    min-height: 50vh;
    background: linear-gradient(rgba(30,58,138,0.85), rgba(30,58,138,0.85)),
        url('https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80');
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

.list-group-item {
    transition: all 0.3s ease;
}

.list-group-item:hover {
    background-color: #f8f9fa;
    padding-left: 1rem;
}
</style>
@endsection
