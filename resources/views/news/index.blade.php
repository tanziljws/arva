@extends('layouts.public')

@section('title', 'Berita - SMKN 4 Bogor')

@section('content')
<style>
  .news-hero{position:relative;height:36vh;min-height:260px;background:linear-gradient(135deg, rgba(11,58,102,.85), rgba(59,168,255,.65)), url('https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=1600&q=80') center/cover;border-bottom:1px solid #e5e7eb;color:#fff;display:flex;align-items:center}
  .news-hero .wrap{max-width:1200px;margin:0 auto;padding:0 24px;width:100%}
  .news-title{margin:0 0 6px;font-size:32px;font-weight:800}
  .news-kicker{font-size:12px;letter-spacing:.14em;text-transform:uppercase;opacity:.9}
  .cards{display:grid;grid-template-columns:repeat(12,1fr);gap:16px}
  .n-card{grid-column:span 4;border:1px solid rgba(2,132,199,.12);border-radius:14px;overflow:hidden;background:#fff;box-shadow:0 8px 22px rgba(15,23,42,.08);text-decoration:none;color:inherit;display:flex;flex-direction:column;transition:transform .25s ease, box-shadow .25s ease, border-color .25s ease}
  .n-card:hover{transform:translateY(-6px);box-shadow:0 16px 40px rgba(15,23,42,.16);border-color:rgba(2,132,199,.25)}
  .thumb{height:180px;overflow:hidden}
  .thumb img{width:100%;height:100%;object-fit:cover;display:block;transition:transform .45s ease}
  .n-card:hover .thumb img{transform:scale(1.05)}
  .meta{padding:14px}
  .badge-cat{display:inline-block;background:#e6f5ff;color:#0b3a66;border-radius:999px;font-size:11px;font-weight:800;letter-spacing:.12em;padding:6px 10px;margin-bottom:8px}
  .n-title{margin:0 0 6px;font-size:17px;font-weight:800;color:#0f172a}
  .n-exc{margin:0;color:#64748b;font-size:13px}
  @media(max-width: 992px){.n-card{grid-column:span 6}.thumb{height:160px}}
  @media(max-width: 600px){.n-card{grid-column:span 12}.thumb{height:170px}}
  .pager{display:flex;justify-content:center;margin-top:18px}
  .container-n{max-width:1200px;margin:0 auto;padding:0 24px}
  .section-head{display:flex;justify-content:space-between;align-items:end;margin:16px 0 14px}
  .btn-chip{display:inline-flex;align-items:center;background:#0b3a66;color:#fff;border-radius:999px;padding:10px 14px;text-decoration:none;font-weight:700;font-size:12px}
</style>

<section class="news-hero">
  <div class="wrap">
    <div class="news-kicker">Aktualitas</div>
    <h1 class="news-title">Berita Terbaru</h1>
    <a href="{{ route('home') }}" class="btn-chip" style="background:#3ba8ff;color:#0b3a66">Kembali ke Beranda</a>
  </div>
</section>

<div class="container-n" style="padding:24px 0 28px">
  @if($news->count() === 0)
    <div class="alert alert-info">Belum ada berita.</div>
  @else
    <div class="section-head">
      <div>
        <div class="news-kicker" style="color:#0b3a66">Terbaru</div>
        <h3 class="section-title" style="margin:4px 0 0;font-size:24px;font-weight:900;color:#0b3a66">Kabar Kampus</h3>
      </div>
    </div>
    <div class="cards">
      @foreach($news as $item)
        @php $img = $item->image ? asset('storage/'.$item->image) : 'https://images.unsplash.com/photo-1475724017904-b712052c192a?auto=format&fit=crop&w=900&q=80'; @endphp
        <a href="{{ route('news.show', $item->id) }}" class="n-card">
          <div class="thumb"><img src="{{ $img }}" alt="{{ $item->title }}"></div>
          <div class="meta">
            @if($item->category)
              <span class="badge-cat">{{ $item->category }}</span>
            @endif
            <h5 class="n-title">{{ $item->title }}</h5>
            <p class="n-exc">{{ Str::limit($item->excerpt ?? strip_tags($item->content), 110) }}</p>
          </div>
        </a>
      @endforeach
    </div>
    <div class="pager">{{ $news->links() }}</div>
  @endif
</div>
@endsection
