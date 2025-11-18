@extends('layouts.admin')

@section('title', 'Edit Agenda')

@section('content')
<h2 class="h4 mb-4">Edit Agenda</h2>

<form action="{{ route('admin.agenda.update', $agenda->id) }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label class="form-label">Judul *</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $agenda->title) }}" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Lokasi</label>
    <input type="text" name="location" class="form-control" value="{{ old('location', $agenda->location) }}">
  </div>
  <div class="row mb-3">
    <div class="col-md-6 mb-3 mb-md-0">
      <label class="form-label">Tanggal & Waktu Mulai</label>
      <input type="datetime-local" name="start_date" class="form-control" value="{{ old('start_date', optional($agenda->start_date)->format('Y-m-d\TH:i')) }}">
    </div>
    <div class="col-md-6">
      <label class="form-label">Tanggal & Waktu Selesai</label>
      <input type="datetime-local" name="end_date" class="form-control" value="{{ old('end_date', optional($agenda->end_date)->format('Y-m-d\TH:i')) }}">
    </div>
  </div>
  <div class="mb-3">
    <label class="form-label">Deskripsi</label>
    <textarea name="description" class="form-control" rows="4">{{ old('description', $agenda->description) }}</textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Foto Agenda (opsional)</label>
    <input type="file" name="image" class="form-control">
    @if($agenda->image)
      <small class="d-block mt-1">Foto sekarang:</small>
      <img src="{{ asset('storage/'.$agenda->image) }}" alt="{{ $agenda->title }}" style="max-height:120px" class="mt-1 rounded">
    @endif
  </div>
  <div class="d-flex justify-content-between">
    <a href="{{ route('admin.agenda.index') }}" class="btn btn-secondary">Batal</a>
    <button type="submit" class="btn btn-primary">Update</button>
  </div>
</form>
@endsection
