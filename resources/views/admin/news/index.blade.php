@extends('layouts.admin')

@section('title', 'Kelola Berita')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <h2 class="h4 mb-0">Kelola Berita</h2>
  <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
    <i class="fas fa-plus me-1"></i> Tambah Berita
  </a>
</div>

@if($news->isEmpty())
  <div class="alert alert-info">Belum ada berita.</div>
@else
  <div class="card shadow-sm">
    <div class="table-responsive">
      <table class="table align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Dipublikasi</th>
            <th class="text-end">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($news as $item)
            <tr>
              <td>{{ $item->title }}</td>
              <td>{{ $item->category ?? '-' }}</td>
              <td>{{ optional($item->published_at ?? $item->created_at)->format('d M Y') }}</td>
              <td class="text-end">
                <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-sm btn-outline-secondary me-1">
                  <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus berita ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger">
                    <i class="fas fa-trash"></i>
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endif
@endsection
