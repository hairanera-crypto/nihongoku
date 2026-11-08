@extends('layouts.app')
@section('title', 'Progress Belajar | NihongoLearn')
@section('content')
<div class="page-wrap progress-page">
    <div class="page-heading">
        <div><span class="section-index">PERJALANAN BELAJARMU</span><h1>Progress belajar</h1><p>Setiap materi dan quiz yang kamu selesaikan tercatat di sini.</p></div>
        <a class="btn btn-primary px-4 py-2" href="{{ route('materials.index') }}">Lanjut belajar ↗</a>
    </div>

    <section class="progress-stats" aria-label="Ringkasan progress">
        <article class="progress-stat progress-stat-main">
            <span class="progress-stat-icon">進</span>
            <div><span class="section-index">TOTAL BELAJAR</span><strong>{{ $percentage }}%</strong><p>{{ $completedCount }} dari {{ $totalMaterials }} materi diselesaikan</p></div>
        </article>
        <article class="progress-stat"><span class="progress-stat-icon stat-pink">✓</span><div><span class="section-index">MATERI SELESAI</span><strong>{{ $completedCount }}</strong><p>dari {{ $totalMaterials }} materi</p></div></article>
        <article class="progress-stat"><span class="progress-stat-icon stat-lilac">文</span><div><span class="section-index">QUIZ DIKERJAKAN</span><strong>{{ $quizCount }}</strong><p>latihan tersimpan</p></div></article>
        <article class="progress-stat"><span class="progress-stat-icon stat-blue">★</span><div><span class="section-index">RATA-RATA NILAI</span><strong>{{ $averageScore }}%</strong><p>dari seluruh quiz</p></div></article>
    </section>

    <div class="progress-columns">
        <section class="content-panel" aria-labelledby="category-progress-title">
            <div class="panel-heading"><div><span class="section-index">LANGKAH DEMI LANGKAH</span><h2 id="category-progress-title">Progress per kategori</h2></div><span class="panel-heading-icon">学</span></div>
            @forelse($categories as $category)
                <div class="category-progress">
                    <div class="category-progress-label"><strong>{{ $category['name'] }}</strong><span>{{ $category['completed'] }}/{{ $category['total'] }} materi <b>{{ $category['percentage'] }}%</b></span></div>
                    <div class="progress-track" role="progressbar" aria-label="Progress {{ $category['name'] }}" aria-valuenow="{{ $category['percentage'] }}" aria-valuemin="0" aria-valuemax="100"><span style="width: {{ $category['percentage'] }}%"></span></div>
                </div>
            @empty
                <p class="empty-note">Materi belum tersedia. Cek kembali nanti.</p>
            @endforelse
        </section>

        <section class="content-panel badge-panel" aria-labelledby="badges-title">
            <div class="panel-heading"><div><span class="section-index">PENGHARGAAN</span><h2 id="badges-title">Badge pencapaian</h2></div><span class="panel-heading-icon">賞</span></div>
            <div class="badge-grid">
                @foreach($badges as $badge)
                    <article class="achievement-badge {{ $badge['earned'] ? 'is-earned' : 'is-locked' }}">
                        <span class="badge-emoji" aria-hidden="true">{{ $badge['icon'] }}</span>
                        <strong>{{ $badge['title'] }}</strong>
                        <small>{{ $badge['description'] }}</small>
                        <span class="badge-status">{{ $badge['earned'] ? 'Terbuka' : 'Belum terbuka' }}</span>
                    </article>
                @endforeach
            </div>
        </section>
    </div>

    <section class="content-panel activity-panel" aria-labelledby="activity-title">
        <div class="panel-heading"><div><span class="section-index">CATATAN TERBARU</span><h2 id="activity-title">Aktivitas belajar</h2></div><a class="section-more" href="{{ route('quiz.index') }}">Kerjakan quiz <span aria-hidden="true">↗</span></a></div>
        @forelse($activities as $activity)
            <article class="activity-item">
                <span class="activity-icon" aria-hidden="true">{{ $activity['icon'] }}</span>
                <div><strong>{{ $activity['title'] }}</strong><p>{{ $activity['description'] }}</p></div>
                <time datetime="{{ $activity['date']->toIso8601String() }}">{{ $activity['date']->format('d/m/Y · H:i') }}</time>
            </article>
        @empty
            <div class="empty-activity"><span aria-hidden="true">🌱</span><p>Belum ada aktivitas. Mulai dari satu materi sederhana, ya!</p><a class="btn btn-outline-navy" href="{{ route('materials.index') }}">Pilih materi <span aria-hidden="true">↗</span></a></div>
        @endforelse
    </section>
</div>
@endsection
