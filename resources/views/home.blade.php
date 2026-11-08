@extends('layouts.app')

@section('title', 'NihongoLearn | Belajar Bahasa Jepang dengan Menyenangkan')

@section('content')
<div class="home-page">
    <section class="hero-shell" aria-labelledby="hero-title">
        <div class="hero-scene" aria-hidden="true"></div>
        <div class="hero-copy">
            <span class="hero-kicker"><span class="kicker-flower">✿</span> YOUR JAPANESE JOURNEY STARTS HERE</span>
            <p class="hero-japanese">はじめまして！</p>
            <p class="hero-romanji">(Hajimemashite!)</p>
            <h1 id="hero-title">Selamat Datang di <span>NihongoLearn!</span></h1>
            <p class="lead-copy">Belajar Bahasa Jepang dengan cara yang mudah, seru, dan menyenangkan.</p>
            <div class="hero-actions">
                @auth
                    <a class="btn btn-hero" href="{{ route('materials.index') }}">Mulai Belajar <span aria-hidden="true">→</span></a>
                @else
                    <a class="btn btn-hero" href="{{ route('register') }}">Mulai Belajar <span aria-hidden="true">→</span></a>
                    <a class="hero-login-link" href="{{ route('login') }}">Sudah punya akun? Masuk</a>
                @endauth
            </div>
            <div class="hero-trust"><span class="trust-avatars" aria-hidden="true"><i>あ</i><i>カ</i><i>日</i></span><span>Langkah kecil, kemampuan besar.</span></div>
        </div>

        <div class="hero-art" aria-hidden="true">
            <span class="art-sakura art-sakura-one" aria-hidden="true">✿</span>
            <span class="art-sakura art-sakura-two" aria-hidden="true">✿</span>
            <span class="art-sakura art-sakura-three" aria-hidden="true">✿</span>
        </div>
        <div class="hero-scroll" aria-hidden="true"><span></span> SCROLL TO EXPLORE</div>
    </section>

    <section class="learning-section" id="belajar" aria-labelledby="learning-title">
        <div class="section-heading">
            <div><span class="section-eyebrow">MULAI DARI SINI</span><h2 id="learning-title">Pilih perjalanan belajarmu</h2><p>Materi ringan untuk menemani setiap langkah pertamamu.</p></div>
            <a class="section-more" href="{{ route('materials.index') }}">Semua materi <span aria-hidden="true">↗</span></a>
        </div>
        <div class="learning-grid">
            <a class="learning-card card-pink" href="{{ route('materials.index', ['category' => 'Hiragana']) }}"><span class="learning-icon">あ</span><span class="card-number">01 / HURUF</span><h3>Hiragana &amp; Katakana</h3><p>Kenali huruf dasar dan mulai membaca bahasa Jepang.</p><span class="card-arrow" aria-hidden="true">↗</span></a>
            <a class="learning-card card-lilac" href="{{ route('materials.index', ['category' => 'Kanji']) }}"><span class="learning-icon">山</span><span class="card-number">02 / KANJI</span><h3>Materi Kanji</h3><p>Pelajari arti, cara baca, dan Kanji dasar JLPT.</p><span class="card-arrow" aria-hidden="true">↗</span></a>
            <a class="learning-card card-blue" href="{{ route('quiz.index') }}"><span class="learning-icon">文</span><span class="card-number">03 / LATIHAN</span><h3>Quiz interaktif</h3><p>Uji pemahaman dengan latihan singkat dan menyenangkan.</p><span class="card-arrow" aria-hidden="true">↗</span></a>
            <a class="learning-card card-peach" href="{{ route('materials.index', ['category' => 'Kosakata']) }}"><span class="learning-icon">言</span><span class="card-number">04 / KATA</span><h3>Kosakata Jepang</h3><p>Perluas kata-kata Jepang untuk percakapan sehari-hari.</p><span class="card-arrow" aria-hidden="true">↗</span></a>
            <a class="learning-card card-lilac" href="{{ route('materials.index', ['category' => 'Grammar']) }}"><span class="learning-icon">文</span><span class="card-number">05 / TATA BAHASA</span><h3>Grammar</h3><p>Pahami partikel dan pola kalimat dengan contoh.</p><span class="card-arrow" aria-hidden="true">↗</span></a>
            <a class="learning-card card-pink" href="{{ route('materials.index', ['category' => 'Kosakata']) }}"><span class="learning-icon">🔊</span><span class="card-number">06 / PENGUCAPAN</span><h3>Audio pengucapan</h3><p>Dengarkan cara membaca huruf, kosakata, dan kalimat.</p><span class="card-arrow" aria-hidden="true">↗</span></a>
            <a class="learning-card card-blue" href="{{ auth()->check() ? route('progress.index') : route('login') }}"><span class="learning-icon">進</span><span class="card-number">07 / PERJALANANMU</span><h3>Progress belajar</h3><p>Lihat materi selesai, riwayat quiz, dan pencapaianmu.</p><span class="card-arrow" aria-hidden="true">↗</span></a>
        </div>
    </section>

    <section class="progress-section" id="progress" aria-labelledby="progress-title">
        <div class="progress-decoration" aria-hidden="true">学</div>
        <div><span class="section-eyebrow">SEDIKIT DEMI SEDIKIT</span><h2 id="progress-title">Setiap latihan adalah kemajuan.</h2><p>Tandai materi yang selesai dan kerjakan quiz untuk membangun catatan belajar pribadimu.</p></div>
        <a class="btn btn-hero" href="{{ auth()->check() ? route('progress.index') : route('register') }}">Lihat progress <span aria-hidden="true">→</span></a>
    </section>
</div>
@endsection
