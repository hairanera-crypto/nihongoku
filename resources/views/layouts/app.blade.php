<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#17234f">
    <title>@yield('title', 'NihongoLearn | 日本語を学ぼう')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Noto+Sans+JP:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<header class="site-header">
    <div class="header-inner">
        <a class="brand" href="{{ route('home') }}" aria-label="NihongoLearn, beranda">
            <span class="brand-mark" aria-hidden="true"><span></span></span>
            <span class="brand-copy"><strong>NihongoLearn</strong><small>日本語を学ぼう</small></span>
        </a>

        <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="primary-navigation" aria-label="Buka menu navigasi">
            <span></span><span></span><span></span>
        </button>

        <div class="nav-content" id="primary-navigation">
            <nav class="main-nav" aria-label="Navigasi utama">
                <a class="nav-link" href="{{ route('home') }}">Beranda</a>
                <details class="nav-dropdown">
                    <summary class="nav-link">Materi <span class="chevron" aria-hidden="true"></span></summary>
                    <div class="dropdown-menu">
                        <a href="{{ route('materials.index', ['category' => 'Hiragana']) }}"><span class="dropdown-kana">あ</span><span><strong>Hiragana</strong><small>Mulai dari huruf dasar</small></span></a>
                        <a href="{{ route('materials.index', ['category' => 'Katakana']) }}"><span class="dropdown-kana dropdown-kana-lilac">カ</span><span><strong>Katakana</strong><small>Kenali bunyi dan bentuk</small></span></a>
                        <a href="{{ route('materials.index', ['category' => 'Kanji']) }}"><span class="dropdown-kana dropdown-kana-blue">山</span><span><strong>Kanji</strong><small>Baca arti dan cara penggunaan</small></span></a>
                        <a href="{{ route('materials.index', ['category' => 'Kosakata']) }}"><span class="dropdown-kana dropdown-kana-blue">言</span><span><strong>Kosakata</strong><small>Perkaya kata sehari-hari</small></span></a>
                        <a href="{{ route('materials.index', ['category' => 'Grammar']) }}"><span class="dropdown-kana dropdown-kana-lilac">文</span><span><strong>Grammar</strong><small>Susun kalimat sederhana</small></span></a>
                        <a class="dropdown-all" href="{{ route('materials.index') }}">Lihat semua materi <span aria-hidden="true">→</span></a>
                    </div>
                </details>
                <a class="nav-link" href="{{ route('quiz.index') }}">Quiz</a>
                @auth
                    <a class="nav-link" href="{{ route('progress.index') }}">Progress Belajar</a>
                @else
                    <a class="nav-link" href="{{ route('login') }}">Progress Belajar</a>
                @endauth
            </nav>

            <div class="nav-tools">
                <form class="nav-search" method="GET" action="{{ route('materials.index') }}" role="search">
                    <label class="visually-hidden" for="site-search">Cari materi</label>
                    <input id="site-search" type="search" name="q" value="{{ request('q') }}" placeholder="Cari materi..." autocomplete="off">
                    <button type="submit" aria-label="Cari"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="10.8" cy="10.8" r="6.8"></circle><path d="m16 16 4.5 4.5"></path></svg></button>
                </form>
                @auth
                    @if(auth()->user()->role === 'admin')
                        <a class="nav-login" href="{{ route('admin.dashboard') }}">Dashboard</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">@csrf<button class="nav-register" type="submit">Keluar</button></form>
                @else
                    <a class="nav-login" href="{{ route('login') }}">Masuk</a>
                    <a class="nav-register" href="{{ route('register') }}">Daftar</a>
                @endauth
            </div>
        </div>
    </div>
</header>

<main>@yield('content')</main>

<footer class="site-footer">
    <a class="footer-brand" href="{{ route('home') }}">NihongoLearn <span>日本語を学ぼう</span></a>
    <p>Belajar sedikit, tumbuh setiap hari.</p>
    <span>Foto latar: Sotaro Kajihara / 500px</span>
    <a href="{{ route('materials.index') }}">Mulai belajar <span aria-hidden="true">↗</span></a>
</footer>
</body>
</html>
