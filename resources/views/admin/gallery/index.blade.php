@extends('layouts.admin')

@section('title', 'Manajemen Galeri')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h3 mb-0">
                        <i class="fas fa-images me-2"></i>Manajemen Galeri
                    </h1>
                    <p class="text-muted">Kelola foto-foto di galeri sekolah</p>
                </div>
                <a href="{{ route('admin.gallery.create') }}" class="btn btn-success">
                    <i class="fas fa-plus me-2"></i>Tambah Foto
                </a>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="border-0">No</th>
                            <th class="border-0">Gambar</th>
                            <th class="border-0">Judul</th>
                            <th class="border-0">Kategori</th>
                            <th class="border-0">Deskripsi</th>
                            <th class="border-0 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($galleries as $gallery)
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">
                                <img src="{{ asset('storage/' . $gallery->image) }}" 
                                     width="80" height="60" 
                                     class="rounded shadow-sm object-fit-cover">
                            </td>
                            <td class="align-middle">
                                <strong>{{ $gallery->title }}</strong>
                            </td>
                            <td class="align-middle">
                                @if($gallery->category)
                                    <span class="badge bg-primary">{{ ucfirst($gallery->category) }}</span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td class="align-middle">
                                @if($gallery->description)
                                    <small class="text-muted">{{ Str::limit($gallery->description, 50) }}</small>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td class="align-middle text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.gallery.edit', $gallery->id) }}" 
                                       class="btn btn-outline-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.gallery.destroy', $gallery->id) }}" 
                                          method="POST" 
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-outline-danger btn-sm"
                                                onclick="return confirm('Yakin hapus foto ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="fas fa-images fa-3x mb-3"></i>
                                    <p class="mb-0">Belum ada foto di galeri.</p>
                                    <small>Klik tombol "Tambah Foto" untuk menambahkan foto pertama.</small>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
