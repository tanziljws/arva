@extends('layouts.public')

@section('title', 'Kontak Kami - SMK Negeri 4 Bogor')

@section('content')
<!-- Hero Section -->
<section class="hero hero-contact d-flex align-items-center text-white mb-5">
    <div class="container text-center">
        <div class="hero-content">
            <div class="mb-4">
                <i class="fas fa-phone fa-3x text-warning"></i>
            </div>
            <h1 class="display-4 fw-bold mb-3">Kontak Kami</h1>
            <p class="lead mb-0">Hubungi kami untuk informasi lebih lanjut tentang SMK Negeri 4 Bogor</p>
        </div>
    </div>
</section>
<div class="container">
    <!-- Overlapped white card: contact info + form -->
    <div class="contact-card shadow-lg">
        <div class="row g-0">
            <!-- Left: info -->
            <div class="col-lg-5 p-4 p-md-5 border-end">
                <h3 class="mb-2 text-secondary">Hubungi Kami</h3>
                <p class="text-muted mb-4">Silakan hubungi kami melalui informasi berikut atau kirim pesan melalui formulir.</p>

                <div class="info-item d-flex align-items-start mb-4">
                    <div class="icon-wrap me-3"><i class="fas fa-building"></i></div>
                    <div>
                        <h6 class="mb-1">Head Office</h6>
                        <div class="text-muted small">Jl. Raya Tajur No. 1, Bogor 16132</div>
                    </div>
                </div>
                <div class="info-item d-flex align-items-start mb-4">
                    <div class="icon-wrap me-3"><i class="fas fa-envelope"></i></div>
                    <div>
                        <h6 class="mb-1">Email Us</h6>
                        <div class="text-muted small">info@smkn4bogor.sch.id<br>humas@smkn4bogor.sch.id</div>
                    </div>
                </div>
                <div class="info-item d-flex align-items-start mb-4">
                    <div class="icon-wrap me-3"><i class="fas fa-phone"></i></div>
                    <div>
                        <h6 class="mb-1">Call Us</h6>
                        <div class="text-muted small">(0251) 123-4567<br>Fax: (0251) 123-4569</div>
                    </div>
                </div>

                <div class="d-flex gap-2 mt-3">
                    <a href="#" class="btn btn-light btn-sm rounded-pill"><i class="fab fa-facebook-f me-1"></i>Facebook</a>
                    <a href="#" class="btn btn-light btn-sm rounded-pill"><i class="fab fa-instagram me-1"></i>Instagram</a>
                    <a href="#" class="btn btn-light btn-sm rounded-pill"><i class="fab fa-youtube me-1"></i>YouTube</a>
                </div>
            </div>

            <!-- Right: form -->
            <div class="col-lg-7 p-4 p-md-5">
                <h3 class="mb-3 text-secondary">Kirim Pesan kepada Kami</h3>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form id="contactForm" method="POST" action="{{ route('contact.store') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small">Nama Lengkap *</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small">Email *</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small">No. Telepon</label>
                            <input type="tel" class="form-control" id="phone" name="phone">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small">Subjek *</label>
                            <select class="form-select" id="subject" name="subject" required>
                                <option value="">Pilih Subjek</option>
                                <option value="info">Informasi Umum</option>
                                <option value="admission">Pendaftaran Siswa</option>
                                <option value="program">Program Studi</option>
                                <option value="partnership">Kerjasama</option>
                                <option value="other">Lainnya</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label small">Pesan *</label>
                            <textarea class="form-control" id="message" name="message" rows="6" required></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary px-4 rounded-pill">
                                <i class="fas fa-paper-plane me-2"></i>Kirim
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Map -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">
                        <i class="fas fa-map me-2"></i>Lokasi Sekolah
                    </h4>
                </div>
                <div class="card-body p-0">
                    <div class="map-container" style="height: 400px;">
                        <iframe 
                            src="https://www.google.com/maps?q=-6.640320024191986,106.8246834836722&hl=id&z=16&output=embed"
                                width="100%" 
                            height="400" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Links -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0">
                        <i class="fas fa-link me-2"></i>Tautan Cepat
                    </h4>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <div class="text-center">
                                <i class="fas fa-graduation-cap fa-2x text-primary mb-2"></i>
                                <h6>Program Studi</h6>
                                <a href="{{ route('programs.tkj') }}" class="btn btn-outline-primary btn-sm">TKJ</a>
                                <a href="{{ route('programs.pplg') }}" class="btn btn-outline-primary btn-sm">PPLG</a>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center">
                                <i class="fas fa-calendar fa-2x text-success mb-2"></i>
                                <h6>Berita & Acara</h6>
                                <a href="{{ route('news.index') }}" class="btn btn-outline-success btn-sm">Lihat Berita</a>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center">
                                <i class="fas fa-images fa-2x text-warning mb-2"></i>
                                <h6>Galeri</h6>
                                <a href="{{ route('gallery.index') }}" class="btn btn-outline-warning btn-sm">Lihat Galeri</a>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="text-center">
                                <i class="fas fa-info-circle fa-2x text-info mb-2"></i>
                                <h6>Tentang</h6>
                                <a href="{{ route('about') }}" class="btn btn-outline-info btn-sm">Tentang Kami</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.hero-contact {
    min-height: 20vh;
    background: #ffffff;
    color: #0b3a66;
    border-bottom: 1px solid #e5e7eb;
}

.card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important;
}

.contact-item {
    text-align: center;
    padding: 20px;
    border-radius: 10px;
    transition: all 0.3s ease;
}

.contact-item:hover {
    background-color: #f8f9fa;
    transform: translateY(-5px);
}

.social-links {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.social-link {
    display: flex;
    align-items: center;
    padding: 10px;
    border-radius: 8px;
    text-decoration: none;
    color: #6c757d;
    transition: all 0.3s ease;
}

.social-link:hover {
    background-color: #f8f9fa;
    color: var(--primary-color);
    transform: translateX(5px);
}

.social-link i {
    width: 20px;
    margin-right: 10px;
}

.map-container {
    border-radius: 0 0 10px 10px;
    overflow: hidden;
}
</style>

<script>
// Tidak perlu JS khusus; form langsung dikirim ke server
</script>
@endsection
