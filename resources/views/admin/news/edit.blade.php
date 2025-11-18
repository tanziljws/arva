@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')
<h2 class="h4 mb-4">Edit Berita</h2>

<form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label class="form-label">Judul *</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $news->title) }}" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Kategori</label>
    <input type="text" name="category" class="form-control" value="{{ old('category', $news->category) }}">
  </div>
  <div class="mb-3">
    <label class="form-label">Ringkasan (excerpt)</label>
    <textarea name="excerpt" class="form-control" rows="3">{{ old('excerpt', $news->excerpt) }}</textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Konten</label>
    <textarea name="content" class="form-control" rows="6">{{ old('content', $news->content) }}</textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Gambar (opsional)</label>
    <input type="file" name="image" class="form-control">
    @if($news->image)
      <small class="d-block mt-1">Gambar sekarang:</small>
      <img src="{{ asset('storage/'.$news->image) }}" alt="{{ $news->title }}" style="max-height:120px" class="mt-1 rounded">
    @endif
  </div>
  <div class="mb-3">
    <label class="form-label">Tanggal Publikasi</label>
    <input type="date" name="published_at" class="form-control" value="{{ old('published_at', optional($news->published_at)->format('Y-m-d')) }}">
  </div>
  <div class="d-flex justify-content-between">
    <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Batal</a>
    <button type="submit" class="btn btn-primary">Update</button>
  </div>
</form>
@endsection
