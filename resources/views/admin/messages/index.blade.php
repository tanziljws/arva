@extends('layouts.admin')

@section('title', 'Pesan Kontak')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <h2 class="h4 mb-0">Pesan Kontak</h2>
</div>

@if($messages->isEmpty())
  <div class="alert alert-info">Belum ada pesan yang masuk.</div>
@else
  <div class="card shadow-sm">
    <div class="table-responsive">
      <table class="table align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Subjek</th>
            <th>Tanggal</th>
            <th class="text-end">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($messages as $message)
            <tr>
              <td>{{ $message->name }}</td>
              <td>{{ $message->email }}</td>
              <td>{{ $message->subject }}</td>
              <td>{{ $message->created_at->format('d M Y H:i') }}</td>
              <td class="text-end">
                <button class="btn btn-sm btn-outline-info" type="button" data-bs-toggle="collapse" data-bs-target="#msg-{{ $message->id }}">
                  <i class="fas fa-eye"></i>
                </button>
                <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus pesan ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger">
                    <i class="fas fa-trash"></i>
                  </button>
                </form>
              </td>
            </tr>
            <tr class="collapse" id="msg-{{ $message->id }}">
              <td colspan="5">
                <div class="p-3 bg-light border">{{ $message->message }}</div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endif
@endsection
