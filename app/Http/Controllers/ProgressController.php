<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class ProgressController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();
        $completedMaterials = $user->materialProgress()->with('material')->get();
        $totalMaterials = Material::count();
        $completedCount = $completedMaterials->count();

        $categoryTotals = Material::query()
            ->selectRaw('category, count(*) as total')
            ->groupBy('category')
            ->orderBy('category')
            ->get()
            ->keyBy('category');

        $completedByCategory = $completedMaterials
            ->groupBy(fn ($progress) => $progress->material?->category)
            ->map(fn (Collection $progress) => $progress->count());

        $categories = $categoryTotals->map(function ($category) use ($completedByCategory): array {
            $completed = (int) $completedByCategory->get($category->category, 0);

            return [
                'name' => $category->category,
                'completed' => $completed,
                'total' => (int) $category->total,
                'percentage' => $category->total > 0
                    ? (int) round(($completed / $category->total) * 100)
                    : 0,
            ];
        })->values();

        $results = $user->results()->latest()->take(10)->get();
        $averageScore = (int) round((float) ($user->results()->avg('score') ?? 0));
        $materialActivities = $completedMaterials->map(fn ($progress): array => [
            'title' => 'Materi diselesaikan',
            'description' => $progress->material?->title ?? 'Materi',
            'date' => $progress->completed_at,
            'icon' => '✓',
        ])->all();
        $quizActivities = $results->map(fn ($result): array => [
            'title' => 'Quiz selesai',
            'description' => 'Nilai '.$result->score.'%',
            'date' => $result->created_at,
            'icon' => '文',
        ])->all();
        $activities = collect($materialActivities)
            ->concat($quizActivities)
            ->sortByDesc('date')
            ->take(8)
            ->values();

        $badges = [
            ['title' => 'Langkah pertama', 'description' => 'Selesaikan satu materi', 'earned' => $completedCount >= 1, 'icon' => '🌸'],
            ['title' => 'Konsisten belajar', 'description' => 'Selesaikan lima materi', 'earned' => $completedCount >= 5, 'icon' => '📚'],
            ['title' => 'Kuis pertamamu', 'description' => 'Kerjakan satu quiz', 'earned' => $results->isNotEmpty() || $user->results()->exists(), 'icon' => '🏅'],
            ['title' => 'Nilai gemilang', 'description' => 'Rata-rata nilai minimal 80%', 'earned' => $averageScore >= 80, 'icon' => '✨'],
        ];

        return view('progress.index', [
            'totalMaterials' => $totalMaterials,
            'completedCount' => $completedCount,
            'percentage' => $totalMaterials > 0
                ? (int) round(($completedCount / $totalMaterials) * 100)
                : 0,
            'quizCount' => $user->results()->count(),
            'averageScore' => $averageScore,
            'categories' => $categories,
            'activities' => $activities,
            'badges' => $badges,
        ]);
    }
}
