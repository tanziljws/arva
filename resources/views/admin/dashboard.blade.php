@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<!-- Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="mb-1">Selamat Datang, Admin2! 👋</h4>
        <p class="text-muted mb-0">Kelola galeri sekolah dengan mudah dari dashboard ini</p>
    </div>
    <div>
        <span class="badge bg-success px-3 py-2">
            <i class="fas fa-circle me-1" style="font-size: 8px;"></i>Online
        </span>
    </div>
</div>

<!-- Stats Cards -->
<div class="row g-4 mb-4">
    <div class="col-md-6 col-lg-3">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="bg-soft-primary rounded p-3">
                        <i class="fas fa-images text-primary"></i>
                    </div>
                    <div class="text-end">
                        <h6 class="mb-0">Total Foto</h6>
                        <p class="text-muted mb-0 small">Semua foto</p>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">{{ \App\Models\Gallery::count() }}</h3>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 col-lg-3">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="bg-soft-success rounded p-3">
                        <i class="fas fa-tags text-success"></i>
                    </div>
                    <div class="text-end">
                        <h6 class="mb-0">Kategori</h6>
                        <p class="text-muted mb-0 small">Total kategori</p>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">{{ \App\Models\Gallery::distinct('category')->count('category') }}</h3>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 col-lg-3">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="bg-soft-warning rounded p-3">
                        <i class="fas fa-calendar-day text-warning"></i>
                    </div>
                    <div class="text-end">
                        <h6 class="mb-0">Foto Hari Ini</h6>
                        <p class="text-muted mb-0 small">Upload hari ini</p>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">{{ \App\Models\Gallery::whereDate('created_at', today())->count() }}</h3>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 col-lg-3">
        <div class="card bg-primary text-white h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="bg-white bg-opacity-10 rounded p-3">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="text-end">
                        <h6 class="mb-0">Foto Minggu Ini</h6>
                        <p class="mb-0 text-white-50 small">7 hari terakhir</p>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">{{ \App\Models\Gallery::whereDate('created_at', '>=', now()->subDays(7))->count() }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions & Admin Info -->
<div class="row g-4">
    <!-- Quick Actions -->
    <div class="col-lg-8">
        <div class="row g-4">
            <!-- Tambah Foto -->
            <div class="col-md-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <div class="bg-soft-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fas fa-plus text-primary" style="font-size: 24px;"></i>
                        </div>
                        <h6 class="fw-bold mb-2">Tambah Foto</h6>
                        <p class="text-muted small mb-3">Upload foto baru ke galeri</p>
                        <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary btn-sm w-100">
                            <i class="fas fa-upload me-1"></i> Upload
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Kelola Galeri -->
            <div class="col-md-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <div class="bg-soft-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fas fa-cog text-success" style="font-size: 24px;"></i>
                        </div>
                        <h6 class="fw-bold mb-2">Kelola Galeri</h6>
                        <p class="text-muted small mb-3">Edit dan hapus foto</p>
                        <a href="{{ route('admin.gallery.index') }}" class="btn btn-success btn-sm w-100">
                            <i class="fas fa-images me-1"></i> Kelola
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Lihat Galeri -->
            <div class="col-md-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <div class="bg-soft-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fas fa-eye text-warning" style="font-size: 24px;"></i>
                        </div>
                        <h6 class="fw-bold mb-2">Lihat Galeri</h6>
                        <p class="text-muted small mb-3">Preview galeri publik</p>
                        <a href="{{ route('gallery.index') }}" class="btn btn-warning btn-sm w-100" target="_blank">
                            <i class="fas fa-external-link-alt me-1"></i> Lihat
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Admin Info -->
    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-header bg-white border-bottom">
                <h6 class="card-title mb-0 fw-bold">
                    <i class="fas fa-user-shield me-2 text-primary"></i>Informasi Admin
                </h6>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center mb-3 pb-3 border-bottom">
                    <div class="bg-soft-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                        <i class="fas fa-user text-primary" style="font-size: 20px;"></i>
                    </div>
                    <div>
                        <h6 class="mb-0 fw-bold">{{ Auth::user()->name }}</h6>
                        <small class="text-muted">Administrator</small>
                    </div>
                </div>
                
                <div class="d-flex align-items-center mb-3 pb-3 border-bottom">
                    <div class="bg-soft-success rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                        <i class="fas fa-envelope text-success" style="font-size: 20px;"></i>
                    </div>
                    <div>
                        <h6 class="mb-0 fw-bold">{{ Auth::user()->email }}</h6>
                        <small class="text-muted">Email</small>
                    </div>
                </div>
                
                <div class="d-flex align-items-center">
                    <div class="bg-soft-info rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                        <i class="fas fa-calendar text-info" style="font-size: 20px;"></i>
                    </div>
                    <div>
                        <h6 class="mb-0 fw-bold">{{ Auth::user()->created_at->format('d M Y') }}</h6>
                        <small class="text-muted">Terdaftar sejak</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
