@extends('layouts.app')

@section('title', 'Beranda - SMK Negeri 4 Bogor')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
            <h1 class="display-4 mb-4">
                <i class="fas fa-graduation-cap text-primary me-3"></i>
                Selamat Datang di SMK Negeri 4 Bogor
            </h1>
            <p class="lead mb-5">
                Sekolah Menengah Kejuruan yang berkomitmen untuk menghasilkan lulusan berkualitas tinggi 
                dengan keterampilan praktis yang relevan dengan kebutuhan industri.
            </p>
            <div class="d-flex gap-3 justify-content-center flex-wrap">
                <a href="{{ route('gallery.index') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-images me-2"></i>Lihat Galeri
                </a>
                <a href="#programs" class="btn btn-outline-primary btn-lg">
                    <i class="fas fa-book me-2"></i>Program Studi
                </a>
            </div>
        </div>
    </div>
</div>
@endsection