@extends('layouts.admin')

@section('title', 'Tambah Agenda')

@section('content')
<h2 class="h4 mb-4">Tambah Agenda</h2>

<form action="{{ route('admin.agenda.store') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
  @csrf
  <div class="mb-3">
    <label class="form-label">Judul *</label>
    <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Lokasi</label>
    <input type="text" name="location" class="form-control" value="{{ old('location') }}">
  </div>
  <div class="row mb-3">
    <div class="col-md-6 mb-3 mb-md-0">
      <label class="form-label">Tanggal & Waktu Mulai</label>
      <input type="datetime-local" name="start_date" class="form-control" value="{{ old('start_date') }}">
    </div>
    <div class="col-md-6">
      <label class="form-label">Tanggal & Waktu Selesai</label>
      <input type="datetime-local" name="end_date" class="form-control" value="{{ old('end_date') }}">
    </div>
  </div>
  <div class="mb-3">
    <label class="form-label">Deskripsi</label>
    <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Foto Agenda (opsional)</label>
    <input type="file" name="image" class="form-control">
    <small class="text-muted">Maksimal 10MB, jpeg/png/jpg/gif.</small>
  </div>
  <div class="d-flex justify-content-between">
    <a href="{{ route('admin.agenda.index') }}" class="btn btn-secondary">Batal</a>
    <button type="submit" class="btn btn-primary">Simpan</button>
  </div>
</form>
@endsection
