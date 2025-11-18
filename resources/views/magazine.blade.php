<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Gallery Magazine — SMK Negeri 4 Bogor</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
  <style>
    :root {
      --black: #0a0a0a;
      --white: #ffffff;
      --text: #0f172a; /* slate-900 */
      --muted: #64748b; /* slate-500 */
      --line: #e5e7eb; /* gray-200 */
      --gray-900: #111213;
      --gray-800: #1a1b1c;
      --gray-700: #2a2b2d;
      --gray-600: #3b3d40;
      --gray-400: #9aa0a6;
      --gray-300: #c7cbd1;
      --blue: #3ba8ff; /* aksen biru muda */
      --overlay: rgba(0,0,0,.45);
      --soft-overlay: rgba(0,0,0,.12);
    }

    * { box-sizing: border-box; }

    html, body { height: 100%; }

    body {
      margin: 0;
      font-family: 'Inter', system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
      color: var(--text);
      background: var(--white);
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }

    /* Header */
    .site-header { position: sticky; top: 0; z-index: 50; background: rgba(255,255,255,.9); backdrop-filter: saturate(140%) blur(6px); border-bottom: 1px solid var(--line); }
    .container { width: 100%; max-width: 1200px; margin: 0 auto; padding: 0 24px; }

    .topbar { display: flex; align-items: center; justify-content: center; height: 70px; }
    .brand { font-weight: 800; letter-spacing: .04em; font-size: 20px; text-transform: uppercase; color: var(--blue); text-decoration: none; }

    .nav-cats { display: flex; flex-wrap: wrap; gap: 22px; padding: 14px 0 18px; justify-content: center; border-top: 1px solid var(--line); }
    .nav-cats a { color: #0f172a; text-decoration: none; font-size: 12px; letter-spacing: .14em; font-weight: 800; padding: 8px 12px; border-radius: 999px; transition: color .2s ease, background .2s ease, box-shadow .2s ease; }
    .nav-cats a:hover { color: #0b3a66; }
    .nav-cats a.active { color: #0b3a66; background: #e6f5ff; box-shadow: inset 0 -2px 0 0 rgba(59,168,255,.35); }

    /* Hero Mosaic */
    .hero { padding: 28px 0 10px; border-bottom: 1px solid var(--line); }
    .mosaic { display: grid; grid-template-columns: repeat(12, 1fr); gap: 14px; }

    .card { position: relative; border-radius: 10px; overflow: hidden; background: #ffffff; min-height: 180px; isolation: isolate; box-shadow: 0 1px 2px rgba(0,0,0,.04); }
    .card img, .card video { width: 100%; height: 100%; object-fit: cover; display: block; }
    .card::after { content: ""; position: absolute; inset: 0; background: var(--soft-overlay); opacity: 0; transition: opacity .25s ease; }
    .card:hover::after { opacity: 1; }
    .card:hover .media { transform: scale(1.04); }
    .media { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; transition: transform .35s ease; filter: saturate(1.05) contrast(1.03); }

    .badge { position: absolute; top: 14px; left: 14px; font-size: 10px; letter-spacing: .16em; font-weight: 700; padding: 6px 10px; border-radius: 14px; color: #0b3a66; background: rgba(59,168,255,.18); backdrop-filter: blur(3px); }

    .overlay { position: absolute; inset: 0; display: flex; align-items: flex-end; padding: 18px; background: linear-gradient(180deg, rgba(0,0,0,0) 50%, rgba(0,0,0,.6) 100%); }
    .title { font-weight: 800; font-size: 24px; line-height: 1.15; margin: 0; letter-spacing: -.01em; }
    .subtitle { margin-top: 6px; font-size: 12px; color: #d2d6db; letter-spacing: .06em; text-transform: uppercase; }

    /* Mosaic spans */
    .span-12 { grid-column: span 12; }
    .span-8  { grid-column: span 8; }
    .span-6  { grid-column: span 6; }
    .span-4  { grid-column: span 4; }
    .span-3  { grid-column: span 3; }
    .row-2  { grid-row: span 2; }

    .ratio-56 { aspect-ratio: 16/9; }
    .ratio-75 { aspect-ratio: 4/3; }
    .ratio-1  { aspect-ratio: 1/1; }

    /* Play icon for video */
    .play { position: absolute; inset: 0; display: grid; place-items: center; z-index: 2; }
    .play i { width: 58px; height: 58px; display: grid; place-items: center; border-radius: 50%; background: rgba(0,0,0,.55); color: #fff; font-size: 18px; border: 1px solid rgba(255,255,255,.25); transition: transform .25s ease; }
    .card:hover .play i { transform: scale(1.06); }

    /* Main Grid (masonry-like) */
    .grid { padding: 26px 0 10px; }
    .grid-inner { display: grid; grid-template-columns: repeat(12, 1fr); gap: 14px; }

    /* CTA buttons */
    .btn { display: inline-flex; align-items: center; gap: 10px; padding: 10px 14px; border-radius: 999px; text-decoration: none; font-weight: 700; font-size: 12px; letter-spacing: .08em; }
    .btn-blue { background: var(--blue); color: #00111f; }
    .btn-blue:hover { filter: brightness(1.08); }

    /* Social Stats */
    .social { padding: 26px 0 26px; }
    .social-cards { display: grid; grid-template-columns: repeat(12, 1fr); gap: 14px; }
    .social-card { grid-column: span 12; background: var(--blue); color: #00111f; border-radius: 10px; padding: 24px; display: flex; align-items: center; justify-content: space-between; }
    .social-card .count { font-size: 28px; font-weight: 900; letter-spacing: .02em; }
    .social-card .label { font-size: 12px; font-weight: 700; letter-spacing: .14em; text-transform: uppercase; opacity: .8; }
    .social-card .btn { background: #ffffff; color: #00223b; }

    /* Footer */
    .site-footer { margin-top: 34px; background:#0b3a66; color:#dbe7f5; border-top: none; }
    .site-footer .container{ padding-top: 34px; padding-bottom: 12px; }
    .footer-columns { display:grid; grid-template-columns: 1.6fr 1fr 1fr 1fr; gap:28px; }
    .footer-col { font-size:14px; }
    .brand-mark { display:inline-flex; align-items:center; justify-content:center; width:46px; height:46px; border-radius:999px; background:transparent; border:1px solid rgba(255,255,255,.28); color:#3ba8ff; margin-bottom:10px; }
    .brand-mark i{font-size:18px}
    .brand-name{margin:0 0 10px; font-size:16px; font-weight:800; color:#ffffff}
    .footer-text { margin:0 0 12px; color:#dbe7f5; opacity:.9; line-height:1.6; }
    .footer-heading { font-size:12px; text-transform:uppercase; letter-spacing:.16em; color:#a8c3e6; margin:0 0 10px; }
    .footer-list { list-style:none; padding:0; margin:0; display:grid; gap:8px; }
    .footer-list a { color:#eaf2fb; text-decoration:none; }
    .footer-list a:hover { color:#ffffff; text-decoration:underline; }
    .social-mini a { display:inline-grid; place-items:center; width:34px; height:34px; background:#0a3256; color:#ffffff; border-radius:50%; margin-right:6px; text-decoration:none; font-size:13px; }
    .copyright-bar { border-top: 1px solid rgba(255,255,255,.14); padding: 12px 0 16px; text-align:center; font-size:12px; color:#cfe0f5; margin-top: 18px; }
    @media (max-width: 992px){ .footer-columns{ grid-template-columns: 1fr 1fr; } }
    @media (max-width: 600px){ .footer-columns{ grid-template-columns: 1fr; } }

    /* New: Hero banner + gallery grid */
    .hero-banner { position: relative; height: 48vh; min-height: 360px; background-size: cover; background-position: center; border-bottom: 1px solid var(--line); }
    .hero-overlay { position: absolute; inset: 0; background: linear-gradient(180deg, rgba(0,0,0,.35) 0%, rgba(0,0,0,.45) 100%); display: flex; align-items: center; }
    .hero-title { color: #fff; font-size: 42px; font-weight: 800; letter-spacing: .01em; margin: 0 0 6px; }
    .breadcrumb { color: #e5e7eb; font-size: 12px; letter-spacing: .14em; text-transform: uppercase; }

    .gallery-section { padding: 48px 0 64px; background: #fff; }
    .section-heading { font-size: 28px; font-weight: 800; color: var(--text); margin: 0 0 22px; }
    .gallery-grid { display: grid; grid-template-columns: repeat(12, 1fr); gap: 18px; }
    .g-item { position: relative; border-radius: 10px; overflow: hidden; box-shadow: 0 1px 2px rgba(0,0,0,.05); background: #f8fafc; }
    .g-item img { width: 100%; height: 100%; display: block; object-fit: cover; transition: transform .35s ease; }
    /* Spans */
    .span-3 { grid-column: span 3; }
    .span-6 { grid-column: span 6; }
    .row-2 { grid-row: span 2; }
    /* Ratios */
    .ratio-portrait { aspect-ratio: 3/4; }
    .ratio-std { aspect-ratio: 4/5; }
    .ratio-land { aspect-ratio: 16/10; }
    .ratio-wide { aspect-ratio: 16/9; }
    /* Overlay caption box (for one item) */
    .overlay-box { position: absolute; inset: 0; display: grid; place-items: center; }
    .overlay-box .box { background: #ffffff; color: #0f172a; padding: 18px 22px; border-radius: 10px; box-shadow: 0 8px 24px rgba(0,0,0,.12); border: 1px solid var(--line); text-align: center; }
    .overlay-box .box small { display:block; color:#64748b; margin-top:6px; letter-spacing:.02em; }
    .g-item:hover img { transform: scale(1.04); }

    @media (max-width: 992px) { .g-item { grid-column: span 4; } .hero-title{font-size:34px;} }
    @media (max-width: 600px) { .g-item { grid-column: span 6; } .hero-banner{height:40vh;min-height:280px;} }

    /* Responsive */
    @media (max-width: 992px) {
      .span-8 { grid-column: span 12; }
      .span-6 { grid-column: span 12; }
      .span-4 { grid-column: span 6; }
      .span-3 { grid-column: span 6; }
    }
    @media (max-width: 600px) {
      .title { font-size: 18px; }
      .nav-cats { gap: 8px; }
      .nav-cats a { font-size: 11px; }
      .span-4, .span-3 { grid-column: span 12; }
      .social-card { flex-direction: column; gap: 10px; align-items: flex-start; }
    }
    .home-hero{padding:24px 0 6px;background:#f4f9ff}
    .hero-wrap{position:relative}
    .hero-bg-shape{position:absolute;left:0;right:0;top:40px;height:140px;background:#3ba8ff;opacity:.25;border-radius:18px;}
    .hero-top{position:relative;z-index:2;display:flex;justify-content:flex-start;margin:0 4px 10px 4px}
    .hero-card{position:relative;border-radius:18px;overflow:hidden;box-shadow:0 12px 30px rgba(2,32,71,.12);border:1px solid var(--line);background:#fff}
    .hero-slider{position:relative;width:100%;height:380px}
    .hero-slide{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;display:none}
    .hero-slide.active{display:block}
    .hero-nav{position:absolute;inset:0;display:flex;align-items:center;justify-content:space-between;padding:0 10px;z-index:4}
    .nav-btn{width:38px;height:38px;border-radius:50%;border:1px solid rgba(255,255,255,.5);background:rgba(0,0,0,.35);color:#fff;display:grid;place-items:center;cursor:pointer}
    .nav-btn:hover{background:rgba(0,0,0,.5)}
    .hero-card-overlay{position:absolute;inset:0;display:flex;flex-direction:column;justify-content:flex-end;padding:18px 22px;background:linear-gradient(180deg,rgba(0,0,0,0) 40%, rgba(0,0,0,.55) 100%);color:#fff;z-index:3}
    .hero-badge{display:inline-block;background:#fff;color:#0b3a66;border-radius:999px;font-weight:800;font-size:11px;letter-spacing:.12em;padding:6px 10px;margin-bottom:8px}
    .hero-headline{margin:0;font-size:26px;font-weight:800}
    .hero-sub{margin:6px 0 10px;color:#e5e7eb}
    .hero-dots{display:flex;gap:6px}
    .hero-dots span{width:8px;height:8px;border-radius:50%;background:#e5e7eb;opacity:.8}
    .hero-dots span.active{background:#3ba8ff}

    .features{padding:22px 0 10px;background:#fff}
    .features-grid{display:grid;grid-template-columns:repeat(6,1fr);gap:14px}
    .feat{display:flex;flex-direction:column;align-items:center;gap:10px;padding:16px;border:1px solid var(--line);border-radius:12px;background:#f8fbff;text-decoration:none;color:#0b3a66;font-weight:700}
    .feat i{font-size:20px;color:#0b3a66}

    .section-head{display:flex;justify-content:space-between;align-items:center;margin:16px 0 14px}
    .kicker{font-size:12px;letter-spacing:.14em;text-transform:uppercase;color:#0b3a66}
    .section-title{margin:4px 0 0;font-size:24px;font-weight:900;color:#0b3a66}
    .btn-chip{display:inline-flex;align-items:center;background:#0b3a66;color:#fff;border-radius:999px;padding:10px 14px;text-decoration:none;font-weight:700;font-size:12px}
    .btn-chip.alt{background:#3ba8ff;color:#0b3a66}

    .news{padding:12px 0 26px;background:#fff}
    .cards-3{display:grid;grid-template-columns:repeat(3,1fr);gap:16px}
    .card-news{display:block;border:1px solid var(--line);border-radius:14px;overflow:hidden;background:#fff;color:inherit;text-decoration:none}
    .card-news .thumb{height:170px;overflow:hidden}
    .card-news img{width:100%;height:100%;object-fit:cover;display:block;transition:transform .35s}
    .card-news:hover img{transform:scale(1.04)}
    .card-news .meta{padding:14px}
    .badge-cat{display:inline-block;background:#e6f5ff;color:#0b3a66;border-radius:999px;font-size:11px;font-weight:800;letter-spacing:.12em;padding:6px 10px;margin-bottom:8px}
    .card-news .title{margin:0 0 6px;font-size:16px;font-weight:800;color:#0f172a}
    .card-news .excerpt{margin:0;color:#64748b;font-size:13px}

    .agenda{padding:22px 0 36px;background:#f7fbff;border-top:1px solid var(--line);border-bottom:1px solid var(--line)}
    .agenda .actions{display:flex;gap:10px}
    .agenda-scroller{display:grid;grid-template-columns:repeat(4,1fr);gap:14px;margin-top:8px}
    .agenda-card{display:block;border-radius:12px;overflow:hidden;border:1px solid var(--line);background:#fff;color:inherit;text-decoration:none}
    .agenda-card .thumb{height:140px;overflow:hidden}
    .agenda-card img{width:100%;height:100%;object-fit:cover;display:block}
    .agenda-card .info{display:flex;align-items:center;justify-content:space-between;padding:10px 12px}
    .date-pill{background:#0b3a66;color:#fff;border-radius:999px;font-size:11px;font-weight:800;letter-spacing:.08em;padding:6px 10px}
    .agenda-card .t{font-weight:700;color:#0f172a;margin-left:12px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}

    .follow{background:#0b3a66;color:#fff;padding:20px 0}
    .follow-wrap{display:flex;align-items:center;justify-content:space-between;gap:14px}
    .follow .txt{font-weight:900;font-size:18px}
    .subscribe{display:flex;gap:8px}
    .subscribe input{padding:10px 12px;border-radius:8px;border:none;min-width:220px}
    .subscribe button{padding:10px 12px;border-radius:8px;border:none;background:#3ba8ff;color:#0b3a66;font-weight:800}
    .follow .social a{display:inline-grid;place-items:center;width:34px;height:34px;background:#11385f;color:#fff;border-radius:50%;margin-left:6px;text-decoration:none}

    @media (max-width: 992px){
      .features-grid{grid-template-columns:repeat(3,1fr)}
      .cards-3{grid-template-columns:1fr 1fr}
      .agenda-scroller{grid-template-columns:1fr 1fr}
    }
    @media (max-width: 600px){
      .hero-card img{height:260px}
      .features-grid{grid-template-columns:repeat(2,1fr)}
      .cards-3{grid-template-columns:1fr}
      .agenda-scroller{grid-template-columns:1fr}
      .follow-wrap{flex-direction:column;align-items:flex-start}
    }
    .home-gallery{padding:8px 0 24px;background:#fff}
    .hg-head{display:flex;align-items:flex-end;justify-content:space-between;margin:2px 0 10px}
    .hg-title{margin:0;font-weight:900;color:#0f172a}
    .hg-title .text-blue{color:#0b3a66}
    .hg-sub{margin:2px 0 0;color:#64748b}
    .hg-row{display:grid;grid-template-columns:repeat(4,1fr);gap:14px}
    .hg-item{display:block;border-radius:14px;overflow:hidden;border:1px solid var(--line);background:#fff}
    .hg-item img{width:100%;height:150px;object-fit:cover;display:block}
    @media (max-width: 992px){.hg-row{grid-template-columns:repeat(2,1fr)}.hg-item img{height:140px}}
    @media (max-width: 600px){.hg-row{grid-template-columns:1fr}.hg-item img{height:160px}}
  </style>
</head>
<body>
  <!-- Header -->
  <header class="site-header">
    <div class="container">
      <div class="topbar">
        <a href="{{ route('home') }}" class="brand">SMKN 4 BOGOR</a>
      </div>
      <nav class="nav-cats">
        <a class="{{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">BERANDA</a>
        <a class="{{ request()->routeIs('gallery.*') ? 'active' : '' }}" href="{{ route('gallery.index') }}">GALERI</a>
        <a class="{{ request()->routeIs('news.*') ? 'active' : '' }}" href="{{ route('news.index') }}">BERITA</a>
        <a class="{{ request()->routeIs('agenda.*') ? 'active' : '' }}" href="{{ route('agenda.index') }}">AGENDA</a>
        <a class="{{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">KONTAK</a>
        @guest
          <a class="{{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">LOGIN</a>
        @endguest
        @auth
          <a class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">DASHBOARD ADMIN</a>
          <form method="POST" action="{{ route('logout') }}" style="display:inline; margin:0;">
            @csrf
            <button type="submit" class="btn-logout" style="border:none;background:none;color:#0f172a;font-size:12px;letter-spacing:.14em;font-weight:800;padding:8px 12px;border-radius:999px;cursor:pointer;">LOGOUT</button>
          </form>
        @endauth
      </nav>
    </div>
  </header>

  <main>
    @php 
      use Illuminate\Support\Str;
      $heroImages = isset($latestGalleries)
        ? $latestGalleries->take(5)->map(fn($g) => asset('storage/'.$g->image))->toArray()
        : [];
      if (!count($heroImages)) {
        $heroImages = [
          'https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?q=80&w=2000&auto=format&fit=crop',
          'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=2000&auto=format&fit=crop',
          'https://images.unsplash.com/photo-1519681393784-d120267933ba?q=80&w=2000&auto=format&fit=crop',
        ];
      }
      $fallbackNews = [
        [
          'title' => 'Peresmian Studio Multimedia Baru',
          'excerpt' => 'Laboratorium multimedia dengan perangkat sinematik terbaru siap dipakai untuk projek siswa.',
          'image' => 'https://images.unsplash.com/photo-1475724017904-b712052c192a?auto=format&fit=crop&w=900&q=80',
          'badge' => 'Kampus',
        ],
        [
          'title' => 'Prestasi LKS Nasional 2025',
          'excerpt' => 'Tim SMKN 4 Bogor meraih juara pertama bidang IT Network System Administration.',
          'image' => 'https://images.unsplash.com/photo-1529333166437-7750a6dd5a70?auto=format&fit=crop&w=900&q=80',
          'badge' => 'Prestasi',
        ],
        [
          'title' => 'Program Magang Industri Batch 3',
          'excerpt' => 'Lebih dari 120 siswa siap magang di perusahaan partner selama enam bulan.',
          'image' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=900&q=80',
          'badge' => 'Kemitraan',
        ],
      ];
    @endphp
    <section class="home-hero">
      <div class="container">
        <div class="hero-wrap">
          <div class="hero-bg-shape"></div>
          <div class="hero-top">
            <div class="hero-badge">SMKN 4 BOGOR</div>
          </div>
          <div class="hero-card">
            <div class="hero-slider">
              @foreach($heroImages as $idx => $src)
                <img class="hero-slide {{ $idx === 0 ? 'active' : '' }}" src="{{ $src }}" alt="Hero {{ $idx+1 }}"/>
              @endforeach
            </div>
            <div class="hero-nav" aria-hidden="false">
              <button class="nav-btn hero-prev" type="button" aria-label="Sebelumnya"><i class="fas fa-chevron-left"></i></button>
              <button class="nav-btn hero-next" type="button" aria-label="Berikutnya"><i class="fas fa-chevron-right"></i></button>
            </div>
            <div class="hero-card-overlay">
              <h2 class="hero-headline">Judul Utama di Beranda</h2>
              <p class="hero-sub">Highlight Kegiatan SMKN 4 </p>
              <div class="hero-dots">
                @foreach($heroImages as $i => $src)
                  <span class="{{ $i === 0 ? 'active' : '' }}" data-idx="{{ $i }}"></span>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    {{-- Galeri Kegiatan strip --}}
    <section class="home-gallery">
      <div class="container">
        <div class="hg-head">
          <div>
            <h3 class="hg-title"><span class="text-blue">Galeri</span> Kegiatan</h3>
            <p class="hg-sub">Momen-momen terbaik dari kegiatan SMKN 4 Bogor</p>
          </div>
          <a href="{{ route('gallery.index') }}" class="btn-chip">Lihat Semua Galeri</a>
        </div>
        <div class="hg-row">
          @forelse(($latestGalleries ?? collect())->take(4) as $g)
            <a class="hg-item" href="{{ route('gallery.show', $g->id) }}" title="{{ $g->title }}">
              <img src="{{ asset('storage/'.$g->image) }}" alt="{{ $g->title }}" loading="lazy">
            </a>
          @empty
            @php $ph = 'https://images.unsplash.com/photo-1519681393784-d120267933ba?q=80&w=1600&auto=format&fit=crop'; @endphp
            <div class="hg-item placeholder"><img src="{{ $ph }}" alt="Placeholder"></div>
            <div class="hg-item placeholder"><img src="{{ $ph }}" alt="Placeholder"></div>
            <div class="hg-item placeholder"><img src="{{ $ph }}" alt="Placeholder"></div>
            <div class="hg-item placeholder"><img src="{{ $ph }}" alt="Placeholder"></div>
          @endforelse
        </div>
      </div>
    </section>

    <section class="news">
      <div class="container">
        <div class="section-head">
          <div>
            <div class="kicker">Berita</div>
            <h3 class="section-title">Berita Terkini</h3>
          </div>
          <a href="{{ route('news.index') }}" class="btn-chip">Semua Berita</a>
        </div>
        <div class="cards-3">
          @php $items = (isset($latestNews) && $latestNews->count()) ? $latestNews : collect($fallbackNews); @endphp
          @foreach($items as $item)
            @php
              $title = is_array($item) ? $item['title'] : $item->title;
              $excerpt = is_array($item) ? $item['excerpt'] : ($item->excerpt ?? Str::limit(strip_tags($item->content ?? ''), 90));
              $image = is_array($item) ? $item['image'] : ($item->image ? asset('storage/'.$item->image) : 'https://images.unsplash.com/photo-1475724017904-b712052c192a?auto=format&fit=crop&w=900&q=80');
              $badge = is_array($item) ? ($item['badge'] ?? 'Berita') : ($item->category ?? 'Berita');
              $url = is_array($item) ? route('news.index') : route('news.show', $item->id);
            @endphp
            <a href="{{ $url }}" class="card-news">
              <div class="thumb"><img src="{{ $image }}" alt="{{ $title }}" loading="lazy"></div>
              <div class="meta">
                <div class="badge-cat">{{ $badge }}</div>
                <h5 class="title">{{ $title }}</h5>
                <p class="excerpt">{{ Str::limit($excerpt, 90) }}</p>
              </div>
            </a>
          @endforeach
        </div>
      </div>
    </section>

    <section class="agenda">
      <div class="container">
        <div class="section-head">
          <div>
            <div class="kicker">Kegiatan yang Akan Datang</div>
            <h3 class="section-title">Agenda</h3>
          </div>
          <div class="actions">
            <a href="{{ route('agenda.index') }}" class="btn-chip">Semua Acara</a>
          </div>
        </div>
        @php $homeAgendas = ($latestAgendas ?? collect())->take(4); @endphp
        @if($homeAgendas->isEmpty())
          <p class="text-muted mt-2">Belum ada agenda yang dijadwalkan.</p>
        @else
          <div class="agenda-scroller">
            @foreach($homeAgendas as $agenda)
              <a href="{{ route('agenda.index') }}" class="agenda-card">
                <div class="thumb">
                  @php
                    $img = $agenda->image
                      ? asset('storage/'.$agenda->image)
                      : 'https://images.unsplash.com/photo-1475724017904-b712052c192a?auto=format&fit=crop&w=800&q=80';
                    $dateLabel = $agenda->start_date ? $agenda->start_date->format('d M') : '';
                  @endphp
                  <img src="{{ $img }}" alt="{{ $agenda->title }}" loading="lazy">
                </div>
                <div class="info">
                  <div class="date-pill">{{ $dateLabel }}</div>
                  <div class="t">{{ Str::limit($agenda->title, 40) }}</div>
                </div>
              </a>
            @endforeach
          </div>
        @endif
      </div>
    </section>

    <section class="follow">
      <div class="container">
        <div class="follow-wrap">
          <div class="txt">Ikuti Kami</div>
          <div class="subscribe">
            <input type="email" placeholder="Email Anda"/>
            <button type="button">Berlangganan</button>
          </div>
          <div class="social">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="site-footer">
    <div class="container">
      <div class="footer-columns">
        <div class="footer-col">
          <div class="brand-mark"><i class="fas fa-landmark"></i></div>
          <h5 class="brand-name">SMKN 4 Bogor</h5>
          <p class="footer-text">Pendidikan vokasi berstandar industri. Berkomitmen menghasilkan lulusan berkompeten dan berkarakter.</p>
          <div class="social-mini">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
          </div>
        </div>
        <div class="footer-col">
          <h5 class="footer-heading">Quick Link</h5>
          <ul class="footer-list">
            <li><a href="{{ route('home') }}">Beranda</a></li>
            <li><a href="{{ route('gallery.index') }}">Galeri</a></li>
            <li><a href="{{ route('news.index') }}">Berita</a></li>
            <li><a href="{{ route('contact') }}">Kontak</a></li>
            @guest
              <li><a href="{{ route('login') }}">Login</a></li>
            @endguest
            @auth
              <li><a href="{{ route('admin.dashboard') }}">Dashboard Admin</a></li>
              <li>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" style="background:none;border:none;color:#eaf2fb;padding:0;cursor:pointer;text-decoration:underline;">Logout</button>
                </form>
              </li>
            @endauth
          </ul>
        </div>
        <div class="footer-col">
          <h5 class="footer-heading">Contact Us</h5>
          <ul class="footer-list">
            <li><i class="fas fa-location-dot me-2"></i>SMK Negeri 4 Bogor, Jl. Raya Tajur No.1</li>
            <li><i class="fas fa-phone me-2"></i>(0251) 123-4567</li>
            <li><i class="fas fa-envelope me-2"></i>info@smkn4bogor.sch.id</li>
          </ul>
        </div>
        <div class="footer-col">
          <h5 class="footer-heading">Open Hours</h5>
          <ul class="footer-list">
            <li>Senin–Jumat: 07.00–16.00 WIB</li>
            <li>Sabtu: 07.00–12.00 WIB</li>
            <li>Minggu & hari libur: Tutup</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="copyright-bar">© {{ date('Y') }} SMK Negeri 4 Bogor. All rights reserved.</div>
  </footer>
<script>
  (function(){
    const slides = Array.from(document.querySelectorAll('.hero-slide'));
    const dots = Array.from(document.querySelectorAll('.hero-dots span'));
    const btnPrev = document.querySelector('.hero-prev');
    const btnNext = document.querySelector('.hero-next');
    if (!slides.length) return;

    let idx = 0; let timer;
    const show = (n) => {
      idx = (n + slides.length) % slides.length;
      slides.forEach((s,i)=> s.classList.toggle('active', i===idx));
      dots.forEach((d,i)=> d.classList.toggle('active', i===idx));
    };
    const play = () => {
      clearInterval(timer);
      timer = setInterval(()=> show(idx+1), 4000);
    };
    dots.forEach(d => d.addEventListener('click', (e)=>{ show(parseInt(d.dataset.idx||'0',10)); play(); }));
    btnPrev && btnPrev.addEventListener('click', ()=>{ show(idx-1); play(); });
    btnNext && btnNext.addEventListener('click', ()=>{ show(idx+1); play(); });
    show(0); play();
  })();
  </script>
</body>
</html>
