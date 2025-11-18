@extends('layouts.app')

@section('title', 'Teknik Otomotif (TO) - SMK Negeri 4 Bogor')

@section('content')
<!-- Hero Section -->
<section class="hero hero-program d-flex align-items-center text-white mb-5">
    <div class="container text-center">
        <div class="hero-content">
            <div class="mb-4">
                <i class="fas fa-car fa-3x text-warning"></i>
            </div>
            <h1 class="display-4 fw-bold mb-3">Teknik Otomotif (TO)</h1>
            <p class="lead mb-0">Menguasai teknologi otomotif modern dan sistem kendaraan bermotor</p>
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
                        Program studi Teknik Otomotif (TO) mempersiapkan siswa untuk menjadi teknisi otomotif yang handal. 
                        Siswa akan mempelajari berbagai sistem kendaraan bermotor, teknologi otomotif modern, dan perawatan 
                        kendaraan yang profesional.
                    </p>
                    <p>
                        Dengan kurikulum yang disesuaikan dengan perkembangan teknologi otomotif terkini, program ini memberikan 
                        pengalaman pembelajaran yang komprehensif mulai dari dasar-dasar mesin hingga sistem elektronik kendaraan modern.
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
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Teknisi Otomotif</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Mekanik Kendaraan</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Service Advisor</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Parts Specialist</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Quality Control</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Workshop Manager</li>
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
                                    <i class="fas fa-cog text-primary me-2"></i>Dasar-dasar Mesin
                                </li>
                                <li class="list-group-item border-0 px-0">
                                    <i class="fas fa-tools text-primary me-2"></i>Alat-alat Otomotif
                                </li>
                                <li class="list-group-item border-0 px-0">
                                    <i class="fas fa-car text-primary me-2"></i>Sistem Kendaraan
                                </li>
                                <li class="list-group-item border-0 px-0">
                                    <i class="fas fa-wrench text-primary me-2"></i>Perawatan Dasar
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-primary mb-3">Tahun Kedua</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item border-0 px-0">
                                    <i class="fas fa-bolt text-primary me-2"></i>Sistem Kelistrikan
                                </li>
                                <li class="list-group-item border-0 px-0">
                                    <i class="fas fa-microchip text-primary me-2"></i>ECU dan Sensor
                                </li>
                                <li class="list-group-item border-0 px-0">
                                    <i class="fas fa-oil-can text-primary me-2"></i>Sistem Bahan Bakar
                                </li>
                                <li class="list-group-item border-0 px-0">
                                    <i class="fas fa-cogs text-primary me-2"></i>Transmisi dan Kopling
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
                            <h5 class="text-primary mb-3">Sertifikasi</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item border-0 px-0">
                                    <i class="fas fa-award text-warning me-2"></i>ASE Certification
                                </li>
                                <li class="list-group-item border-0 px-0">
                                    <i class="fas fa-award text-warning me-2"></i>Honda Technician
                                </li>
                                <li class="list-group-item border-0 px-0">
                                    <i class="fas fa-award text-warning me-2"></i>Toyota Technician
                                </li>
                                <li class="list-group-item border-0 px-0">
                                    <i class="fas fa-award text-warning me-2"></i>Yamaha Technician
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
                                <i class="fas fa-wrench fa-3x text-primary mb-3"></i>
                                <h5>Workshop Otomotif</h5>
                                <p class="text-muted">Workshop lengkap dengan peralatan otomotif modern</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="text-center">
                                <i class="fas fa-car fa-3x text-primary mb-3"></i>
                                <h5>Garasi Praktik</h5>
                                <p class="text-muted">Garasi untuk praktik perbaikan kendaraan</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="text-center">
                                <i class="fas fa-microchip fa-3x text-primary mb-3"></i>
                                <h5>Lab Elektronik</h5>
                                <p class="text-muted">Laboratorium untuk sistem elektronik kendaraan</p>
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
                        <i class="fas fa-images me-2"></i>Galeri Program TO
                    </h4>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                 class="img-fluid rounded shadow-sm" alt="Workshop Otomotif">
                        </div>
                        <div class="col-md-3 mb-3">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                 class="img-fluid rounded shadow-sm" alt="Praktik Mesin">
                        </div>
                        <div class="col-md-3 mb-3">
                            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                 class="img-fluid rounded shadow-sm" alt="Sistem Kelistrikan">
                        </div>
                        <div class="col-md-3 mb-3">
                            <img src="https://images.unsplash.com/photo-1517077304055-6e89abbf09b0?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                 class="img-fluid rounded shadow-sm" alt="Diagnosis Kendaraan">
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
            <div class="card border-0 shadow-sm bg-gradient" style="background: linear-gradient(45deg, #ff6b6b, #ee5a24);">
                <div class="card-body text-center text-white p-5">
                    <h3 class="mb-3">Tertarik dengan Program TO?</h3>
                    <p class="lead mb-4">Bergabunglah dengan kami dan kuasai teknologi otomotif modern</p>
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
        url('https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80');
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
