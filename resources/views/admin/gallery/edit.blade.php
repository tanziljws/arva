@extends('layouts.admin')

@section('title', 'Edit Foto')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="h3 mb-0">
                <i class="fas fa-edit me-2"></i>Edit Foto
            </h1>
            <p class="text-muted">Ubah informasi foto yang sudah ada</p>
        </div>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <h6><i class="fas fa-exclamation-triangle me-2"></i>Terjadi Kesalahan:</h6>
            <ul class="mb-0">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">
                                <i class="fas fa-heading me-2"></i>Judul Foto
                            </label>
                            <input type="text" name="title" id="title" 
                                   class="form-control @error('title') is-invalid @enderror" 
                                   value="{{ old('title', $gallery->title) }}" 
                                   placeholder="Masukkan judul foto" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">
                                <i class="fas fa-tags me-2"></i>Kategori
                            </label>
                            <select name="category" id="category" 
                                    class="form-select @error('category') is-invalid @enderror">
                                <option value="">Pilih Kategori</option>
                                <option value="acara" {{ old('category', $gallery->category) == 'acara' ? 'selected' : '' }}>Acara Sekolah</option>
                                <option value="kegiatan" {{ old('category', $gallery->category) == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                                <option value="prestasi" {{ old('category', $gallery->category) == 'prestasi' ? 'selected' : '' }}>Prestasi</option>
                                <option value="fasilitas" {{ old('category', $gallery->category) == 'fasilitas' ? 'selected' : '' }}>Fasilitas</option>
                                <option value="lainnya" {{ old('category', $gallery->category) == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">
                                <i class="fas fa-align-left me-2"></i>Deskripsi
                            </label>
                            <textarea name="description" id="description" 
                                      class="form-control @error('description') is-invalid @enderror" 
                                      rows="4" 
                                      placeholder="Masukkan deskripsi foto (opsional)">{{ old('description', $gallery->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                <i class="fas fa-image me-2"></i>Gambar Saat Ini
                            </label>
                            <div class="text-center">
                                <img src="{{ asset('storage/' . $gallery->image) }}" 
                                     width="200" class="rounded shadow">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="image" class="form-label">
                                <i class="fas fa-upload me-2"></i>Ganti Gambar (opsional)
                            </label>
                            <input type="file" name="image" id="image" 
                                   class="form-control @error('image') is-invalid @enderror" 
                                   accept="image/*">
                            <div class="form-text">
                                <i class="fas fa-info-circle me-1"></i>
                                Kosongkan jika tidak ingin mengganti gambar. Format: JPEG, PNG, JPG, GIF. Maksimal 2MB.
                            </div>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Update Foto
                            </button>
                            <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
