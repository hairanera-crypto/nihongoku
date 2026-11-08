<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class MaterialController extends Controller
{
    private const CATEGORIES = ['Hiragana', 'Katakana', 'Kanji', 'Kosakata', 'Grammar'];

    public function index(): View
    {
        $materials = Material::query()->latest()->paginate(10);

        return view('admin.materials.index', compact('materials'));
    }

    public function create(): View
    {
        return view('admin.materials.form', ['material' => new Material(), 'categories' => self::CATEGORIES]);
    }

    public function store(Request $request): RedirectResponse
    {
        Material::create($this->validatedData($request));

        return redirect()->route('admin.materials.index')->with('status', 'Materi berhasil ditambahkan.');
    }

    public function edit(Material $material): View
    {
        return view('admin.materials.form', compact('material') + ['categories' => self::CATEGORIES]);
    }

    public function update(Request $request, Material $material): RedirectResponse
    {
        $material->update($this->validatedData($request));

        return redirect()->route('admin.materials.index')->with('status', 'Materi berhasil diperbarui.');
    }

    public function destroy(Material $material): RedirectResponse
    {
        $material->delete();

        return redirect()->route('admin.materials.index')->with('status', 'Materi berhasil dihapus.');
    }

    private function validatedData(Request $request): array
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', Rule::in(self::CATEGORIES)],
            'content' => ['required', 'string'],
            'content_format' => ['sometimes', Rule::in(['text', 'kana_chart'])],
        ]);

        return $validated + ['content_format' => 'text'];
    }
}