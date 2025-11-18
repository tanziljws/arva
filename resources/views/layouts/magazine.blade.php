<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title','Gallery Magazine — SMKN 4 Bogor')</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
  <style>
    :root { --black:#0a0a0a; --white:#fff; --gray:#17181a; --muted:#c5c8cc; --blue:#52b6ff; }
    * { box-sizing: border-box; }
    html, body { height: 100%; }
    body { margin: 0; font-family: 'Inter', system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif; color: var(--white); background: var(--black); }
    .container { width: 100%; max-width: 1200px; margin: 0 auto; padding: 0 24px; }
    .site-header { position: sticky; top: 0; z-index: 50; background: rgba(10,10,10,.9); backdrop-filter: saturate(140%) blur(8px); border-bottom: 1px solid #151515; }
    .topbar { display: flex; align-items: center; justify-content: center; height: 70px; }
    .brand { font-weight: 800; letter-spacing: .04em; font-size: 20px; text-transform: uppercase; color: var(--white); text-decoration: none; }
    .nav-cats { display: flex; flex-wrap: wrap; gap: 16px; padding: 14px 0 18px; justify-content: center; border-top: 1px solid #151515; }
    .nav-cats a { color: #d8d8d8; text-decoration: none; font-size: 12px; letter-spacing: .12em; font-weight: 700; padding: 8px 10px; border-radius: 16px; }
    .nav-cats a:hover, .nav-cats a.active { color: var(--white); background: var(--gray); }
    main { padding: 26px 0 40px; }
    .site-footer { border-top: 1px solid #151515; padding: 28px 0; color: var(--muted); }
    .footer-nav { display: flex; gap: 18px; justify-content: center; flex-wrap: wrap; }
    .footer-nav a { color: var(--muted); text-decoration: none; font-size: 12px; letter-spacing: .12em; }
    .footer-nav a:hover { color: var(--white); }
  </style>
  @stack('head')
</head>
<body>
  <header class="site-header">
    <div class="container">
      <div class="topbar">
        <a href="{{ route('home') }}" class="brand">SMKN 4 BOGOR</a>
      </div>
      <nav class="nav-cats">
        <a class="{{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">BERANDA</a>
        <a class="{{ request()->routeIs('gallery.*') ? 'active' : '' }}" href="{{ route('gallery.index') }}">GALERI</a>
        <a class="{{ request()->routeIs('events.*') ? 'active' : '' }}" href="{{ route('events.index') }}">BERITA</a>
        <a class="{{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">KONTAK</a>
        <a class="{{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">LOGIN</a>
      </nav>
    </div>
  </header>

  <main>
    @yield('content')
  </main>

  <footer class="site-footer">
    <div class="container">
      <nav class="footer-nav">
        <a href="#">ABOUT</a>
        <a href="#">ADVERTISING</a>
        <a href="#">JOBS</a>
        <a href="{{ route('contact') }}">CONTACT</a>
      </nav>
    </div>
  </footer>
  @stack('scripts')
</body>
</html>
