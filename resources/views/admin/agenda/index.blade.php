@extends('layouts.admin')

@section('title', 'Kelola Agenda')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <h2 class="h4 mb-0">Kelola Agenda</h2>
  <a href="{{ route('admin.agenda.create') }}" class="btn btn-primary">
    <i class="fas fa-plus me-1"></i> Tambah Agenda
  </a>
</div>

@if($agendas->isEmpty())
  <div class="alert alert-info">Belum ada agenda.</div>
@else
  <div class="card shadow-sm">
    <div class="table-responsive">
      <table class="table align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th>Judul</th>
            <th>Lokasi</th>
            <th>Mulai</th>
            <th>Selesai</th>
            <th class="text-end">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($agendas as $agenda)
            <tr>
              <td>{{ $agenda->title }}</td>
              <td>{{ $agenda->location ?? '-' }}</td>
              <td>{{ optional($agenda->start_date)->format('d M Y H:i') }}</td>
              <td>{{ optional($agenda->end_date)->format('d M Y H:i') }}</td>
              <td class="text-end">
                <a href="{{ route('admin.agenda.edit', $agenda->id) }}" class="btn btn-sm btn-outline-secondary me-1">
                  <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('admin.agenda.destroy', $agenda->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus agenda ini?')">
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
