@extends('layouts.app')

@section('title', 'Acara dan Kegiatan - SMK Negeri 4 Bogor')

@section('content')
<!-- Hero Section -->
<section class="hero hero-events d-flex align-items-center text-white mb-5">
    <div class="container text-center">
        <div class="hero-content">
            <div class="mb-4">
                <i class="fas fa-calendar-alt fa-3x text-warning"></i>
            </div>
            <h1 class="display-4 fw-bold mb-3">Acara dan Kegiatan</h1>
            <p class="lead mb-0">Jangan lewatkan acara-acara menarik yang akan diselenggarakan di sekolah kami</p>
        </div>
    </div>
</section>

<div class="container">
    <!-- Events Grid -->
    <div class="row mb-5">
        <div class="col-lg-4 mb-4">
            <div class="card event-card h-100 border-0 shadow-sm" onclick="showEventDetail('pameran')">
                <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                     class="card-img-top" alt="Pameran Karya">
                <div class="card-body">
                    <div class="event-date mb-3">
                        <i class="fas fa-calendar me-2"></i>20 Januari 2024
                    </div>
                    <h5 class="card-title">Pameran Karya Siswa</h5>
                    <p class="card-text">Pameran karya siswa merupakan ajang untuk menampilkan hasil karya terbaik dari berbagai program studi.</p>
                    <div class="event-location mb-3">
                        <i class="fas fa-map-marker-alt me-2"></i>SMK Negeri 4 Bogor
                    </div>
                    <div class="event-actions">
                        <button class="btn btn-outline-primary">Lihat Detail</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4 mb-4">
            <div class="card event-card h-100 border-0 shadow-sm" onclick="showEventDetail('workshop')">
                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                     class="card-img-top" alt="Workshop">
                <div class="card-body">
                    <div class="event-date mb-3">
                        <i class="fas fa-calendar me-2"></i>25 Januari 2024
                    </div>
                    <h5 class="card-title">Workshop Teknologi Terkini</h5>
                    <p class="card-text">Workshop teknologi terkini menghadirkan praktisi industri untuk berbagi pengetahuan tentang perkembangan teknologi terbaru.</p>
                    <div class="event-location mb-3">
                        <i class="fas fa-map-marker-alt me-2"></i>Laboratorium Komputer
                    </div>
                    <div class="event-actions">
                        <button class="btn btn-outline-primary">Lihat Detail</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4 mb-4">
            <div class="card event-card h-100 border-0 shadow-sm" onclick="showEventDetail('wisuda')">
                <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                     class="card-img-top" alt="Wisuda">
                <div class="card-body">
                    <div class="event-date mb-3">
                        <i class="fas fa-calendar me-2"></i>30 Januari 2024
                    </div>
                    <h5 class="card-title">Upacara Wisuda</h5>
                    <p class="card-text">Upacara wisuda merupakan momen penting dalam perjalanan akademik siswa.</p>
                    <div class="event-location mb-3">
                        <i class="fas fa-map-marker-alt me-2"></i>Aula Utama
                    </div>
                    <div class="event-actions">
                        <button class="btn btn-outline-primary">Lihat Detail</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Upcoming Events -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        <i class="fas fa-clock me-2"></i>Acara Mendatang
                    </h4>
                </div>
                <div class="card-body p-4">
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-marker bg-primary"></div>
                            <div class="timeline-content">
                                <h6 class="timeline-title">Seminar Karir IT</h6>
                                <p class="timeline-text">Seminar tentang peluang karir di bidang teknologi informasi dengan pembicara dari industri.</p>
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>15 Februari 2024 | 
                                    <i class="fas fa-clock me-1"></i>09:00 - 12:00 WIB
                                </small>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-marker bg-success"></div>
                            <div class="timeline-content">
                                <h6 class="timeline-title">Lomba Desain Grafis</h6>
                                <p class="timeline-text">Kompetisi desain grafis tingkat nasional untuk siswa SMK se-Indonesia.</p>
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>20 Februari 2024 | 
                                    <i class="fas fa-clock me-1"></i>08:00 - 17:00 WIB
                                </small>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-marker bg-warning"></div>
                            <div class="timeline-content">
                                <h6 class="timeline-title">Workshop Kewirausahaan</h6>
                                <p class="timeline-text">Pelatihan kewirausahaan untuk mengembangkan jiwa entrepreneur siswa.</p>
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>25 Februari 2024 | 
                                    <i class="fas fa-clock me-1"></i>09:00 - 15:00 WIB
                                </small>
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
                        <i class="fas fa-images me-2"></i>Dokumentasi Acara
                    </h4>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                 class="img-fluid rounded shadow-sm" alt="Event 1">
                        </div>
                        <div class="col-md-3 mb-3">
                            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                 class="img-fluid rounded shadow-sm" alt="Event 2">
                        </div>
                        <div class="col-md-3 mb-3">
                            <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                 class="img-fluid rounded shadow-sm" alt="Event 3">
                        </div>
                        <div class="col-md-3 mb-3">
                            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                 class="img-fluid rounded shadow-sm" alt="Event 4">
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
</div>

<!-- Detail Modal -->
<div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eventModalLabel">Detail Acara</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="eventModalBody">
                <!-- Content will be loaded here -->
            </div>
        </div>
    </div>
</div>

<style>
.hero-events {
    min-height: 50vh;
    background: linear-gradient(rgba(30,58,138,0.85), rgba(30,58,138,0.85)),
        url('https://images.unsplash.com/photo-1524178232363-1fb2b075b655?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80');
    background-size: cover;
    background-position: center;
    border-bottom-left-radius: 24px;
    border-bottom-right-radius: 24px;
}

.event-card {
    cursor: pointer;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.event-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15) !important;
}

.event-date {
    background: var(--primary-color);
    color: white;
    padding: 8px 15px;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: 600;
    display: inline-block;
}

.event-actions {
    opacity: 0;
    transition: opacity 0.3s ease;
}

.event-card:hover .event-actions {
    opacity: 1;
}

.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 15px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: #e9ecef;
}

.timeline-item {
    position: relative;
    margin-bottom: 30px;
}

.timeline-marker {
    position: absolute;
    left: -22px;
    top: 5px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 3px solid white;
    box-shadow: 0 0 0 3px #e9ecef;
}

.timeline-content {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.timeline-title {
    font-weight: 600;
    margin-bottom: 10px;
    color: var(--primary-color);
}

.timeline-text {
    margin-bottom: 10px;
    color: #6c757d;
}
</style>

<script>
function showEventDetail(eventId) {
    const events = {
        'pameran': {
            title: 'Pameran Karya Siswa',
            image: 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            description: 'Pameran karya siswa merupakan ajang untuk menampilkan hasil karya terbaik dari berbagai program studi. Acara ini menjadi wadah bagi siswa untuk menunjukkan kreativitas dan inovasi mereka.',
            details: [
                'Pameran karya dari program TKJ, Multimedia, Akuntansi, dan Bisnis',
                'Demo produk dan inovasi teknologi',
                'Kompetisi desain dan programming',
                'Workshop dan seminar industri',
                'Networking dengan alumni dan industri',
                'Penghargaan untuk karya terbaik'
            ],
            date: '20 Januari 2024',
            time: '08:00 - 16:00 WIB',
            location: 'SMK Negeri 4 Bogor, Aula Utama'
        },
        'workshop': {
            title: 'Workshop Teknologi Terkini',
            image: 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            description: 'Workshop teknologi terkini menghadirkan praktisi industri untuk berbagi pengetahuan tentang perkembangan teknologi terbaru dan implementasinya dalam dunia kerja.',
            details: [
                'Cloud Computing dan DevOps',
                'Artificial Intelligence dan Machine Learning',
                'Internet of Things (IoT)',
                'Cybersecurity dan Ethical Hacking',
                'Mobile App Development',
                'Data Science dan Analytics'
            ],
            date: '25 Januari 2024',
            time: '09:00 - 15:00 WIB',
            location: 'Laboratorium Komputer SMK Negeri 4 Bogor'
        },
        'wisuda': {
            title: 'Upacara Wisuda',
            image: 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            description: 'Upacara wisuda merupakan momen penting dalam perjalanan akademik siswa. Acara ini menandai berakhirnya masa belajar dan dimulainya perjalanan baru di dunia kerja.',
            details: [
                'Prosesi wisuda dan penyerahan ijazah',
                'Sambutan dari kepala sekolah dan komite sekolah',
                'Penghargaan untuk siswa berprestasi',
                'Testimoni dari alumni sukses',
                'Foto bersama dan dokumentasi',
                'Resepsi dan ramah tamah'
            ],
            date: '30 Januari 2024',
            time: '08:00 - 12:00 WIB',
            location: 'Aula Utama SMK Negeri 4 Bogor'
        }
    };

    const event = events[eventId];
    if (event) {
        document.getElementById('eventModalLabel').textContent = event.title;
        document.getElementById('eventModalBody').innerHTML = `
            <div class="row">
                <div class="col-md-4">
                    <img src="${event.image}" class="img-fluid rounded" alt="${event.title}">
                </div>
                <div class="col-md-8">
                    <p class="lead">${event.description}</p>
                    <h6><i class="fas fa-calendar me-2"></i>Tanggal: ${event.date}</h6>
                    <h6><i class="fas fa-clock me-2"></i>Waktu: ${event.time}</h6>
                    <h6><i class="fas fa-map-marker-alt me-2"></i>Lokasi: ${event.location}</h6>
                </div>
            </div>
            <hr>
            <h6><i class="fas fa-list me-2"></i>Kegiatan:</h6>
            <ul class="list-group list-group-flush">
                ${event.details.map(detail => `<li class="list-group-item"><i class="fas fa-check text-success me-2"></i>${detail}</li>`).join('')}
            </ul>
            <div class="mt-3">
                <a href="{{ route('gallery.index') }}" class="btn btn-primary me-2">
                    <i class="fas fa-images me-2"></i>Lihat Galeri
                </a>
                <button class="btn btn-outline-primary" data-bs-dismiss="modal">Tutup</button>
            </div>
        `;
        new bootstrap.Modal(document.getElementById('eventModal')).show();
    }
}
</script>
@endsection
