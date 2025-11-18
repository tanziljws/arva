@extends('layouts.public')

@section('title', 'Agenda - SMKN 4 Bogor')

@section('content')
<style>
  .agenda-hero{
    position:relative;height:26vh;min-height:200px;
    background:linear-gradient(135deg,#e0f2ff 0%,#f5f9ff 60%,#ffffff 100%);
    border-bottom:1px solid #e5e7eb;display:flex;align-items:flex-end;
  }
  .agenda-hero .wrap{max-width:1100px;margin:0 auto;padding:22px 24px 22px;width:100%;display:flex;justify-content:flex-start;align-items:flex-end;gap:20px}
  .agenda-title{margin:4px 0 6px;font-size:30px;font-weight:800;color:#0b3a66}
  .agenda-kicker{font-size:12px;letter-spacing:.14em;text-transform:uppercase;color:#64748b}
  .agenda-sub{margin:0;color:#64748b;font-size:14px;max-width:460px}

  .agenda-container{background:#f8fafc;border-top:1px solid #e5e7eb;padding:26px 0 40px}
  .agenda-inner{max-width:1000px;margin:0 auto;padding:0 24px}
  .agenda-list-head{display:flex;justify-content:space-between;align-items:center;margin-bottom:12px}
  .agenda-list-title{margin:0;font-size:18px;font-weight:700;color:#0f172a}
  .agenda-count{font-size:13px;color:#64748b}

  .agenda-item{border-radius:16px;border:1px solid #e5e7eb;padding:14px 18px;margin-bottom:14px;background:#ffffff;box-shadow:0 8px 24px rgba(15,23,42,.04);display:flex;align-items:center;gap:18px}
  .agenda-datepill{width:70px;text-align:center;border-radius:14px;background:#e0edff;padding:8px 6px;flex-shrink:0}
  .agenda-datepill .day{display:block;font-size:20px;font-weight:800;color:#0b3a66;line-height:1}
  .agenda-datepill .month{display:block;font-size:11px;font-weight:700;color:#1d4ed8;letter-spacing:.08em;text-transform:uppercase;margin-top:3px}
  .agenda-main{flex:1}
  .agenda-title-item{font-weight:700;margin-bottom:4px;color:#0f172a;font-size:16px}
  .agenda-meta{font-size:13px;color:#64748b}
  .agenda-meta span+span{margin-left:10px}
  .agenda-desc{margin-top:6px;font-size:14px;color:#475569}

  .agenda-thumb{width:220px;border-radius:16px;overflow:hidden;flex-shrink:0;box-shadow:0 10px 24px rgba(15,23,42,.18);cursor:pointer}
  .agenda-thumb img{width:100%;height:140px;object-fit:cover;display:block;transition:transform .25s ease}
  .agenda-thumb:hover img{transform:scale(1.04)}

  @media (max-width: 768px){
    .agenda-hero{height:auto;min-height:0}
    .agenda-hero .wrap{flex-direction:column;align-items:flex-start;padding-top:18px}
    .agenda-container{padding-top:20px}
    .agenda-item{flex-direction:column;align-items:flex-start}
    .agenda-thumb{width:100%;margin-top:8px}
    .agenda-thumb img{height:180px}
  }
</style>

<section class="agenda-hero">
  <div class="wrap">
    <div>
      <div class="agenda-kicker">Agenda</div>
      <h1 class="agenda-title">Agenda Kegiatan</h1>
      <p class="agenda-sub">Rangkuman kegiatan penting SMKN 4 Bogor yang akan datang. Pastikan Anda tidak melewatkan tanggal-tanggal istimewa ini.</p>
    </div>
  </div>
</section>

<div class="agenda-container">
  <div class="agenda-inner">
    @if($agendas->isEmpty())
      <div class="alert alert-info">Belum ada agenda yang dijadwalkan.</div>
    @else
      <div class="agenda-list-head">
        <h2 class="agenda-list-title">Daftar Agenda</h2>
        <div class="agenda-count">{{ $agendas->total() }} kegiatan terjadwal</div>
      </div>

      @foreach($agendas as $agenda)
        <div class="agenda-item">
          @php
            $start = $agenda->start_date;
            $day = $start ? $start->format('d') : '';
            $month = $start ? $start->format('M') : '';
          @endphp
          <div class="agenda-datepill">
            <span class="day">{{ $day }}</span>
            <span class="month">{{ $month }}</span>
          </div>

          <div class="agenda-main">
            <div class="agenda-title-item">{{ $agenda->title }}</div>
            <div class="agenda-meta">
              @if($agenda->start_date)
                <span><i class="far fa-clock me-1"></i>{{ $agenda->start_date->format('d M Y H:i') }}</span>
              @endif
              @if($agenda->end_date)
                <span>s/d {{ $agenda->end_date->format('d M Y H:i') }}</span>
              @endif
              @if($agenda->location)
                <span><i class="fas fa-map-marker-alt me-1"></i>{{ $agenda->location }}</span>
              @endif
            </div>
            @if($agenda->description)
              <div class="agenda-desc">{{ $agenda->description }}</div>
            @endif
          </div>

          @if($agenda->image)
            <div class="agenda-thumb" data-bs-toggle="modal" data-bs-target="#agendaImageModal" data-img="{{ asset('storage/'.$agenda->image) }}" data-title="{{ $agenda->title }}" title="Lihat foto agenda">
              <img src="{{ asset('storage/'.$agenda->image) }}" alt="{{ $agenda->title }}">
            </div>
          @endif
        </div>
      @endforeach

      <div class="mt-3">
        {{ $agendas->links() }}
      </div>
    @endif
  </div>
</div>

<!-- Modal untuk preview gambar agenda -->
<div class="modal fade" id="agendaImageModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content" style="border-radius:18px;overflow:hidden">
      <div class="modal-header border-0 pb-1">
        <h5 class="modal-title" id="agendaImageModalLabel">Foto Agenda</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body pt-0">
        <img id="agendaImageModalImg" src="" alt="Foto agenda" class="img-fluid rounded" style="width:100%">
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  var imgModal = document.getElementById('agendaImageModal');
  if (!imgModal) return;

  imgModal.addEventListener('show.bs.modal', function (event) {
    var trigger = event.relatedTarget;
    if (!trigger) return;
    var src = trigger.getAttribute('data-img');
    var title = trigger.getAttribute('data-title') || 'Foto Agenda';
    var img = document.getElementById('agendaImageModalImg');
    var label = document.getElementById('agendaImageModalLabel');
    if (img && src) img.src = src;
    if (label) label.textContent = title;
  });
});
</script>
@endsection
