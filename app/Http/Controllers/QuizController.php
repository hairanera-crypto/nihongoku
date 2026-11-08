<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class QuizController extends Controller
{
    public function index(Request $request): View|RedirectResponse
    {
        $validated = $request->validate([
            'category' => ['nullable', Rule::in(['Hiragana', 'Katakana', 'Kanji', 'Kosakata', 'Grammar'])],
            'level' => ['nullable', Rule::in(['N5', 'N4', 'N3', 'N2', 'N1'])],
        ]);
        $query = Question::query();

        if ($validated['category'] ?? false) {
            $query->where('category', $validated['category']);
        }

        if ($validated['level'] ?? false) {
            $query->where('level', $validated['level']);
        }

        $questions = $query->inRandomOrder()->limit(10)->get();

        if ($questions->isEmpty()) {
            return redirect()->route('quiz.index')->withErrors([
                'quiz' => 'Belum ada soal untuk pilihan kategori dan level ini. Coba pilih level lain.',
            ]);
        }

        $request->session()->put('quiz_question_ids', $questions->modelKeys());
        $questions = $questions->map(fn (Question $question) => [
            'id' => $question->id,
            'question' => $question->question,
            'options' => $question->options,
            'category' => $question->category,
            'level' => $question->level,
        ]);

        return view('quiz.index', [
            'questions' => $questions,
            'selectedCategory' => $validated['category'] ?? '',
            'selectedLevel' => $validated['level'] ?? '',
        ]);
    }

    public function submit(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'answers' => ['nullable', 'array'],
            'answers.*' => ['required', 'string', 'max:255'],
        ]);

        $questionIds = $request->session()->pull('quiz_question_ids', []);

        if ($questionIds === []) {
            return redirect()->route('quiz.index')->withErrors(['quiz' => 'Sesi latihan berakhir. Silakan mulai kembali.']);
        }

        $questionsById = Question::query()->whereKey($questionIds)->get()->keyBy('id');
        $questions = collect($questionIds)
            ->map(fn (int $questionId) => $questionsById->get($questionId))
            ->filter()
            ->values();

        if ($questions->isEmpty()) {
            return redirect()->route('quiz.index')->withErrors(['quiz' => 'Soal latihan sudah tidak tersedia. Silakan mulai kembali.']);
        }

        $answers = $validated['answers'] ?? [];
        $details = $questions->map(function (Question $question) use ($answers): array {
            $selectedAnswer = $answers[$question->id] ?? null;

            return [
                'question_id' => $question->id,
                'question' => $question->question,
                'category' => $question->category,
                'options' => $question->options,
                'selected_answer' => $selectedAnswer,
                'correct_answer' => $question->correct_answer,
                'is_correct' => $selectedAnswer !== null && $selectedAnswer === $question->correct_answer,
            ];
        });
        $correctCount = $details->where('is_correct', true)->count();
        $score = (int) round(($correctCount / $questions->count()) * 100);

        $result = $request->user()->results()->create([
            'score' => $score,
            'date' => today(),
            'details' => $details->all(),
        ]);

        return redirect()->route('results.show', $result);
    }
}