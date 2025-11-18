@extends('layouts.public')

@section('title', ($news->title ?? 'Detail Berita') . ' - SMKN 4 Bogor')

@section('content')
<style>
  .article-wrap{max-width:900px;margin:0 auto;padding:24px 24px 32px}
  .article-card{border-radius:18px;border:1px solid rgba(15,23,42,.08);box-shadow:0 14px 35px rgba(15,23,42,.12);background:#fff;overflow:hidden}
  .article-head{padding:20px 20px 12px}
  .article-title{margin:0 0 8px;font-size:26px;font-weight:800;color:#0f172a}
  .badge-cat{display:inline-block;background:#e6f5ff;color:#0b3a66;border-radius:999px;font-size:11px;font-weight:800;letter-spacing:.12em;padding:6px 10px;margin-bottom:8px}
  .article-img{max-height:420px;overflow:hidden}
  .article-img img{width:100%;height:100%;object-fit:cover;display:block}
  .article-body{padding:18px 20px 22px;color:#0f172a}
  .article-body p{margin-bottom:0.7rem;color:#475569}
</style>

<div class="article-wrap">
  <nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
      <li class="breadcrumb-item"><a href="{{ route('news.index') }}">Berita</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ $news->title }}</li>
    </ol>
  </nav>

  <article class="article-card">
    <div class="article-head">
      @if($news->category)
        <span class="badge-cat">{{ $news->category }}</span>
      @endif
      <h1 class="article-title">{{ $news->title }}</h1>
    </div>
    @php $img = $news->image ? asset('storage/'.$news->image) : null; @endphp
    @if($img)
      <div class="article-img">
        <img src="{{ $img }}" alt="{{ $news->title }}">
      </div>
    @endif
    <div class="article-body">
      @if($news->excerpt)
        <p class="text-muted">{{ $news->excerpt }}</p>
      @endif
      <div>{!! $news->content !!}</div>
    </div>
  </article>
</div>
@endsection
