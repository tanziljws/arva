@extends('layouts.public')

@section('title', $gallery->title)

@section('content')
<!-- Hero Section to align with landing -->
<section class="hero hero-gallery d-flex align-items-center text-white mb-5">
	<div class="container text-center">
		<h1 class="display-6 fw-bold mb-1">{{ $gallery->title }}</h1>
		<p class="mb-0">Kategori: {{ $gallery->category ?? '-' }}</p>
	</div>
</section>

<div class="container">

    <div class="text-center mb-4">
        <img src="{{ asset('storage/' . $gallery->image) }}" 
             class="img-fluid rounded shadow" 
             style="max-height: 500px;">
        <div class="mt-3">
            <a href="{{ route('gallery.download', $gallery->id) }}" class="btn btn-primary">
                <i class="fas fa-download me-1"></i>Unduh Foto
            </a>
        </div>
    </div>

    @if($gallery->description)
        <div class="mb-4">
            <p>{{ $gallery->description }}</p>
        </div>
    @endif

    <div class="text-center mt-4">
        <a href="{{ route('gallery.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Kembali ke Galeri
        </a>
    </div>
</div>

<style>
/* Hero match landing */
.hero-gallery {
    min-height: 30vh;
    background: linear-gradient(rgba(30,58,138,0.85), rgba(30,58,138,0.85)),
        url('https://images.unsplash.com/photo-1562774053-701939374585?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80');
    background-size: cover;
    background-position: center;
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;
}

.card {
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    border: 1px solid rgba(0, 0, 0, 0.125);
}
</style>
@endsection
