@extends('layouts.app')
@section('title', $material->title.' | NihongoLearn')
@section('content')
<article class="page-wrap" style="max-width:1000px"><a class="text-link text-decoration-none small" href="{{ route('materials.index') }}">← Kembali ke materi</a>@if(session('status'))<div class="alert alert-success mt-3" role="status">{{ session('status') }}</div>@endif<div class="content-panel mt-4"><span class="category-label">{{ $material->category }}</span><h1 class="mt-3 mb-4">{{ $material->title }}</h1>
    @if($material->content_format === 'kana_chart')
        <p class="text-secondary">Tabel lengkap huruf kana beserta cara bacanya. Geser tabel ke samping jika membukanya dari layar kecil.</p>
        <p class="small text-secondary mb-3">Tekan ikon suara di samping huruf atau kata Jepang untuk mendengarkan pelafalannya.</p>
        <p class="small text-secondary" data-pronunciation-status role="status" aria-live="polite"></p>
        @foreach($chartSections as $section)
            <section class="kana-chart-section">
                <h2>{{ $section['title'] }}</h2>
                <div class="table-responsive">
                    <table class="table table-bordered kana-chart" data-pronunciation-content>
                        <thead><tr>@foreach($section['headers'] as $header)<th scope="col">{{ $header }}</th>@endforeach</tr></thead>
                        <tbody>
                            @foreach($section['rows'] as $row)
                                <tr>@foreach($row as $cell)<td>{{ $cell }}</td>@endforeach</tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @foreach($section['notes'] as $note)
                    <p class="small text-secondary mt-2">{{ $note }}</p>
                @endforeach
            </section>
        @endforeach
    @else
        <p class="small text-secondary mb-3">Tekan ikon suara di samping huruf atau kata Jepang untuk mendengarkan pelafalannya.</p>
        <p class="small text-secondary" data-pronunciation-status role="status" aria-live="polite"></p>
        <div data-pronunciation-content style="font-size:16px;line-height:1.9;white-space:pre-line">{{ $material->content }}</div>
    @endif
</div><div class="material-actions mt-4"><form method="POST" action="{{ route('materials.complete', $material) }}">@csrf<button class="btn {{ $completedAt ? 'btn-outline-success' : 'btn-primary' }} px-4 py-2" type="submit" @disabled($completedAt)>{{ $completedAt ? '✓ Materi selesai' : 'Tandai selesai' }}</button></form><a class="btn btn-outline-ink px-4 py-2" href="{{ route('quiz.index', ['category' => $material->category]) }}">Latihan {{ $material->category }} ↗</a></div></article>
@endsection