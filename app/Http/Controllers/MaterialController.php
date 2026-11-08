<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MaterialController extends Controller
{
    public function index(Request $request): View
    {
        $category = $request->query('category');
        $search = trim((string) $request->query('q', ''));

        $materials = Material::query()
            ->when($category, fn ($query) => $query->where('category', $category))
            ->when($search !== '', fn ($query) => $query->where(function ($query) use ($search): void {
                $query->where('title', 'like', '%'.$search.'%')
                    ->orWhere('content', 'like', '%'.$search.'%');
            }))
            ->latest()
            ->paginate(9)
            ->withQueryString();

        $completedMaterialIds = $request->user()->materialProgress()->pluck('material_id')->all();

        return view('materials.index', compact('materials', 'category', 'search', 'completedMaterialIds'));
    }

    public function show(Request $request, Material $material): View
    {
        $chartSections = [];

        if ($material->content_format === 'kana_chart') {
            $chartSections = array_map(function (string $section): array {
                $lines = preg_split('/\R/', trim($section)) ?: [];
                $title = array_shift($lines);
                $headers = explode('|', array_shift($lines) ?? '');
                $rows = [];
                $notes = [];

                foreach ($lines as $line) {
                    if (str_starts_with($line, '* ')) {
                        $notes[] = substr($line, 2);

                        continue;
                    }

                    $rows[] = array_pad(
                        array_slice(explode('|', $line), 0, count($headers)),
                        count($headers),
                        '—'
                    );
                }

                return compact('title', 'headers', 'rows', 'notes');
            }, preg_split('/\R{2,}/', trim($material->content)) ?: []);
        }

        $completedAt = $request->user()
            ->materialProgress()
            ->where('material_id', $material->id)
            ->value('completed_at');

        return view('materials.show', compact('material', 'chartSections', 'completedAt'));
    }

    public function complete(Request $request, Material $material): RedirectResponse
    {
        $request->user()->materialProgress()->firstOrCreate(
            ['material_id' => $material->id],
            ['completed_at' => now()]
        );

        return back()->with('status', 'Materi ditandai selesai. Progress belajarmu sudah diperbarui.');
    }
}