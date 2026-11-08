<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class QuestionController extends Controller
{
    private const CATEGORIES = ['Hiragana', 'Katakana', 'Kanji', 'Kosakata', 'Grammar'];
    private const LEVELS = ['N5', 'N4', 'N3', 'N2', 'N1'];

    public function index(): View
    {
        $questions = Question::query()->latest()->paginate(10);

        return view('admin.questions.index', compact('questions'));
    }

    public function create(): View
    {
        return view('admin.questions.form', [
            'question' => new Question(),
            'categories' => self::CATEGORIES,
            'levels' => self::LEVELS,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        Question::create($this->validatedData($request));

        return redirect()->route('admin.questions.index')->with('status', 'Soal berhasil ditambahkan.');
    }

    public function edit(Question $question): View
    {
        return view('admin.questions.form', compact('question') + [
            'categories' => self::CATEGORIES,
            'levels' => self::LEVELS,
        ]);
    }

    public function update(Request $request, Question $question): RedirectResponse
    {
        $question->update($this->validatedData($request));

        return redirect()->route('admin.questions.index')->with('status', 'Soal berhasil diperbarui.');
    }

    public function destroy(Question $question): RedirectResponse
    {
        $question->delete();

        return redirect()->route('admin.questions.index')->with('status', 'Soal berhasil dihapus.');
    }

    private function validatedData(Request $request): array
    {
        $options = $request->input('options', []);

        return $request->validate([
            'question' => ['required', 'string', 'max:1000'],
            'category' => ['required', Rule::in(self::CATEGORIES)],
            'level' => ['required', Rule::in(self::LEVELS)],
            'options' => ['required', 'array', 'size:4'],
            'options.*' => ['required', 'string', 'max:255', 'distinct'],
            'correct_answer' => ['required', 'string', Rule::in($options)],
        ]);
    }
}