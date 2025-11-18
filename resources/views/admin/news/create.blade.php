@extends('layouts.admin')

@section('title', 'Tambah Berita')

@section('content')
<h2 class="h4 mb-4">Tambah Berita</h2>

@if($errors->any())
  <div class="alert alert-danger">
    <h6 class="mb-1"><i class="fas fa-exclamation-triangle me-1"></i>Terjadi Kesalahan:</h6>
    <ul class="mb-0">
      @foreach($errors->all() as $err)
        <li>{{ $err }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
  @csrf
  <div class="mb-3">
    <label class="form-label">Judul *</label>
    <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Kategori</label>
    <input type="text" name="category" class="form-control" value="{{ old('category') }}">
  </div>
  <div class="mb-3">
    <label class="form-label">Ringkasan (excerpt)</label>
    <textarea name="excerpt" class="form-control" rows="3">{{ old('excerpt') }}</textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Konten</label>
    <textarea name="content" class="form-control" rows="6">{{ old('content') }}</textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Gambar (opsional)</label>
    <input type="file" name="image" class="form-control">
    <small class="text-muted">Maksimal 10MB, jpeg/png/jpg/gif.</small>
  </div>
  <div class="mb-3">
    <label class="form-label">Tanggal Publikasi</label>
    <input type="date" name="published_at" class="form-control" value="{{ old('published_at') }}">
  </div>
  <div class="d-flex justify-content-between">
    <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Batal</a>
    <button type="submit" class="btn btn-primary">Simpan</button>
  </div>
</form>
@endsection
