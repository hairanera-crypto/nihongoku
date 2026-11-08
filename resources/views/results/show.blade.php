@extends('layouts.app')
@section('title', 'Hasil Latihan | NihongoLearn')
@section('content')
<div class="page-wrap" style="max-width:820px">
    <div class="content-panel text-center py-5">
        <span class="section-index">LATIHAN SELESAI</span>
        <h1 class="h2 mt-3">Bagus, {{ $result->user->name }}.</h1>
        <p class="text-secondary">Nilai latihanmu hari ini</p>
        <div class="result-score">{{ $result->score }}<span style="font-size:30px">%</span></div>
        <p class="mt-3 text-secondary">{{ $result->date->format('d F Y') }}</p>
        <div class="d-flex justify-content-center flex-wrap gap-2 mt-4">
            <a class="btn btn-primary px-4 py-2" href="{{ route('quiz.index') }}">Coba lagi</a>
            <a class="btn btn-outline-ink" href="{{ route('materials.index') }}">Kembali ke materi</a>
        </div>
    </div>

    @if($result->details)
        @php
            $correctAnswers = collect($result->details)->where('is_correct', true)->count();
            $incorrectAnswers = count($result->details) - $correctAnswers;
        @endphp
        <section class="content-panel mt-4" aria-labelledby="answer-review-title">
            <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-3">
                <div>
                    <span class="section-index">PEMBAHASAN</span>
                    <h2 id="answer-review-title" class="h4 mt-2">Hasil jawaban</h2>
                </div>
                <p class="mb-0 text-secondary">
                    <span class="text-success fw-semibold">{{ $correctAnswers }} benar</span>
                    <span aria-hidden="true"> · </span>
                    <span class="text-danger fw-semibold">{{ $incorrectAnswers }} salah</span>
                </p>
            </div>

            @foreach($result->details as $index => $detail)
                <article class="answer-review {{ $detail['is_correct'] ? 'answer-review-correct' : 'answer-review-incorrect' }}">
                    <div class="d-flex justify-content-between align-items-start gap-3">
                        <div>
                            <span class="category-label">SOAL {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }} · {{ $detail['category'] }}</span>
                            <h3 class="h6 mt-2 mb-3">{{ $detail['question'] }}</h3>
                        </div>
                        <span class="answer-status {{ $detail['is_correct'] ? 'text-success' : 'text-danger' }}">
                            {{ $detail['is_correct'] ? 'Benar' : 'Salah' }}
                        </span>
                    </div>
                    <p class="mb-1">
                        Jawabanmu:
                        <strong>{{ $detail['selected_answer'] ?? 'Tidak dijawab' }}</strong>
                    </p>
                    @unless($detail['is_correct'])
                        <p class="mb-0">Jawaban benar: <strong>{{ $detail['correct_answer'] }}</strong></p>
                    @endunless
                </article>
            @endforeach
        </section>
    @else
        <p class="text-center text-secondary mt-4">Rincian jawaban tidak tersedia untuk hasil latihan lama.</p>
    @endif
</div>
@endsection