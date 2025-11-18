<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'SMKN 4 Bogor')</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
  <style>
    :root { --line:#e5e7eb; --blue:#3ba8ff; --text:#0f172a; }
    *{box-sizing:border-box}
    body{margin:0;font-family:'Inter',system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif;color:var(--text);background:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}
    .site-header{position:sticky;top:0;z-index:50;background:rgba(255,255,255,.9);backdrop-filter:saturate(140%) blur(6px);border-bottom:1px solid var(--line)}
    .container-n{width:100%;max-width:1200px;margin:0 auto;padding:0 24px}
    .topbar{display:flex;align-items:center;justify-content:center;height:64px}
    .brand{font-weight:800;letter-spacing:.04em;font-size:18px;text-transform:uppercase;color:var(--blue);text-decoration:none}
    .nav-cats{display:flex;flex-wrap:wrap;gap:22px;padding:12px 0 16px;justify-content:center;border-top:1px solid var(--line)}
    .nav-cats a{color:#0f172a;text-decoration:none;font-size:12px;letter-spacing:.14em;font-weight:800;padding:8px 12px;border-radius:999px;transition:color .2s ease, background .2s ease, box-shadow .2s ease}
    .nav-cats a:hover{color:#0b3a66}
    .nav-cats a.active{color:#0b3a66;background:#e6f5ff;box-shadow:inset 0 -2px 0 0 rgba(59,168,255,.35)}
    .btn-logout{border:none;background:none;color:#0f172a;font-size:12px;letter-spacing:.14em;font-weight:800;padding:8px 12px;border-radius:999px;cursor:pointer}
    main{min-height:60vh}
    footer{border-top:1px solid var(--line);margin-top:24px}
    .copyright{padding:12px 0 16px;text-align:center;font-size:12px;color:#64748b}
  </style>
</head>
<body>
  <header class="site-header">
    <div class="container-n">
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
          <form method="POST" action="{{ route('logout') }}" style="display:inline;margin:0">
            @csrf
            <button type="submit" class="btn-logout">LOGOUT</button>
          </form>
        @endauth
      </nav>
    </div>
  </header>

  <main>
    @yield('content')
  </main>

  <footer>
    <div class="container-n">
      <div class="copyright">© {{ date('Y') }} SMK Negeri 4 Bogor. All rights reserved.</div>
    </div>
  </footer>
</body>
</html>
