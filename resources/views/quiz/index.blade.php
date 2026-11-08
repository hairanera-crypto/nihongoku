@extends('layouts.app')
@section('title', 'Quiz Interaktif | NihongoLearn')
@section('content')
<div class="page-wrap quiz-page">
    <div class="page-heading">
        <div><span class="section-index">LATIHAN HARI INI</span><h1>Uji pemahamanmu</h1><p>{{ $questions->count() }} soal pilihan ganda · Jawaban diperiksa otomatis</p></div>
        <a class="section-more" href="{{ route('progress.index') }}">Lihat progress <span aria-hidden="true">↗</span></a>
    </div>

    @if($errors->has('quiz'))<div class="alert alert-warning">{{ $errors->first('quiz') }}</div>@endif

    <form class="quiz-filter content-panel" method="GET" action="{{ route('quiz.index') }}">
        <label><span>Kategori</span><select name="category"><option value="">Semua materi</option>@foreach(['Hiragana', 'Katakana', 'Kanji', 'Kosakata', 'Grammar'] as $category)<option value="{{ $category }}" @selected($selectedCategory === $category)>{{ $category }}</option>@endforeach</select></label>
        <label><span>Level JLPT</span><select name="level"><option value="">Semua level</option>@foreach(['N5', 'N4', 'N3', 'N2', 'N1'] as $level)<option value="{{ $level }}" @selected($selectedLevel === $level)>{{ $level }} · {{ ['N5' => 'Pemula', 'N4' => 'Dasar', 'N3' => 'Menengah', 'N2' => 'Lanjut', 'N1' => 'Mahir'][$level] }}</option>@endforeach</select></label>
        <button class="btn btn-outline-navy" type="submit">Pilih latihan <span aria-hidden="true">↗</span></button>
    </form>

    <form method="POST" action="{{ route('quiz.submit') }}" class="quiz-card" data-quiz-form>
        @csrf
        <div class="quiz-progress-head">
            <span class="category-label" data-quiz-count>SOAL 01 DARI {{ str_pad($questions->count(), 2, '0', STR_PAD_LEFT) }}</span>
            <span class="quiz-level-pill">{{ $selectedLevel ?: 'N5' }} · {{ ['N5' => 'Pemula', 'N4' => 'Dasar', 'N3' => 'Menengah', 'N2' => 'Lanjut', 'N1' => 'Mahir'][$selectedLevel ?: 'N5'] }}</span>
        </div>
        <div class="quiz-progress-track" role="progressbar" aria-label="Progress quiz" aria-valuenow="1" aria-valuemin="1" aria-valuemax="{{ $questions->count() }}" data-quiz-progress><span></span></div>

        @foreach($questions as $index => $question)
            <section class="quiz-question" data-quiz-step>
                <span class="section-index">SOAL {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }} · {{ $question['category'] }} · {{ $question['level'] }}</span>
                <h2 class="quiz-prompt" data-pronunciation-content>{{ $question['question'] }}</h2>
                <div class="quiz-options">
                    @foreach($question['options'] as $option)
                        <label class="quiz-option">
                            <input type="radio" name="answers[{{ $question['id'] }}]" value="{{ $option }}" @if($loop->first) required @endif>
                            <span class="quiz-option-letter">{{ chr(65 + $loop->index) }}</span><span class="quiz-option-text">{{ $option }}</span>
                        </label>
                    @endforeach
                </div>
            </section>
        @endforeach

        <nav class="quiz-controls" aria-label="Navigasi soal" data-quiz-controls hidden>
            <button class="btn btn-outline-ink" type="button" data-quiz-previous>← Sebelumnya</button>
            <span data-quiz-status aria-live="polite"></span>
            <button class="btn btn-primary" type="button" data-quiz-next>Selanjutnya →</button>
            <button class="btn btn-primary" type="submit" data-quiz-submit hidden>Kirim jawaban ↗</button>
        </nav>
        <noscript><button class="btn btn-primary mt-4 px-4 py-2" type="submit">Kirim jawaban ↗</button></noscript>
    </form>
</div>
@endsection
