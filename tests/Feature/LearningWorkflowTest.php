<?php

namespace Tests\Feature;

use App\Models\Material;
use App\Models\Question;
use App\Models\User;
use Database\Seeders\LearningContentSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LearningWorkflowTest extends TestCase
{
    use RefreshDatabase;

    public function test_learning_content_seeder_populates_all_quiz_categories_idempotently(): void
    {
        $this->seed(LearningContentSeeder::class);
        $this->seed(LearningContentSeeder::class);

        $this->assertSame(73, Question::count());
        $this->assertSame(33, Material::count());
        $this->assertSame(['N1', 'N2', 'N3', 'N4', 'N5'], Question::query()
            ->distinct()
            ->orderBy('level')
            ->pluck('level')
            ->all());
        $this->assertTrue(Question::query()->get()->every(
            fn (Question $question): bool => count($question->options) === 4
                && in_array($question->correct_answer, $question->options, true)
        ));
        $this->assertDatabaseHas('materials', [
            'title' => 'Hiragana: dakuten dan handakuten',
            'category' => 'Hiragana',
        ]);
        $this->assertDatabaseHas('materials', [
            'title' => 'Tabel Hiragana lengkap',
            'content_format' => 'kana_chart',
        ]);
        $this->assertDatabaseHas('materials', [
            'title' => 'Tabel Katakana lengkap',
            'content_format' => 'kana_chart',
        ]);
        $this->assertDatabaseHas('questions', [
            'question' => 'Apa arti kata コーヒー?',
            'category' => 'Katakana',
        ]);

        $student = User::factory()->create();

        foreach (['Hiragana', 'Katakana', 'Kosakata', 'Kanji', 'Grammar'] as $category) {
            $this->actingAs($student)
                ->get('/quiz?category='.urlencode($category))
                ->assertOk();
        }
        $this->actingAs($student)->get('/quiz?category=Kanji&level=N5')->assertOk();
        foreach (['N4', 'N3', 'N2', 'N1'] as $level) {
            $this->actingAs($student)->get('/quiz?level='.$level)->assertOk();
        }

        $this->get('/materials/'.Material::where('title', 'Tabel Hiragana lengkap')->value('id'))
            ->assertOk()
            ->assertSee('きゃ kya')
            ->assertSee('Huruf dasar (gojūon)')
            ->assertSee('data-pronunciation-content');
        $this->get('/materials/'.Material::where('title', 'Tabel Katakana lengkap')->value('id'))
            ->assertOk()
            ->assertSee('キャ kya')
            ->assertSee('Bunyi tambahan untuk kata serapan');
        $this->get('/materials/'.Material::where('title', 'Salam dasar bahasa Jepang')->value('id'))
            ->assertOk()
            ->assertSee('こんにちは')
            ->assertSee('data-pronunciation-content')
            ->assertSee('data-pronunciation-status');

        $this->get('/materials?category=Hiragana')
            ->assertOk()
            ->assertSee('Tabel Hiragana lengkap')
            ->assertDontSee('Tabel Katakana lengkap');
        $this->get('/materials?q=koohii')
            ->assertOk()
            ->assertSee('Katakana: kata serapan sehari-hari');
        $this->get('/materials?category=Kosakata&q=koohii')
            ->assertOk()
            ->assertSee('Materi tidak ditemukan')
            ->assertDontSee('Katakana: kata serapan sehari-hari');
    }

    public function test_admin_can_create_material_and_students_cannot_manage_it(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $student = User::factory()->create(['role' => 'student']);

        $this->actingAs($admin)
            ->get('/admin/dashboard')
            ->assertOk()
            ->assertSee('Tambah materi')
            ->assertSee(route('admin.materials.create'));

        $this->actingAs($admin)->post('/admin/materials', [
            'title' => 'Hiragana dasar',
            'category' => 'Hiragana',
            'content' => 'あ dibaca a.',
        ])->assertRedirect('/admin/materials');

        $this->assertDatabaseHas('materials', ['title' => 'Hiragana dasar']);
        $this->actingAs($student)->get('/admin/materials')->assertForbidden();
    }

    public function test_progress_is_based_on_completed_materials_and_saved_quiz_results(): void
    {
        $this->seed(LearningContentSeeder::class);
        $student = User::factory()->create(['role' => 'student']);
        $material = Material::where('title', 'Kanji dasar dan level JLPT')->firstOrFail();

        $this->get('/culture')->assertNotFound();

        $this->actingAs($student)
            ->get('/progress')
            ->assertOk()
            ->assertSee('0 dari 33 materi diselesaikan')
            ->assertSee('0%');

        $this->post('/materials/'.$material->id.'/complete')->assertRedirect();
        $this->post('/materials/'.$material->id.'/complete')->assertRedirect();
        $this->assertSame(1, $student->materialProgress()->where('material_id', $material->id)->count());
        $this->assertDatabaseHas('material_progress', [
            'user_id' => $student->id,
            'material_id' => $material->id,
        ]);

        $this->get('/quiz?category=Kanji&level=N5')->assertOk();
        $answers = Question::where('category', 'Kanji')->pluck('correct_answer', 'id')->all();
        $this->post('/quiz', ['answers' => $answers])->assertRedirect();

        $this->get('/progress')
            ->assertOk()
            ->assertSee('1 dari 33 materi diselesaikan')
            ->assertSee('latihan tersimpan')
            ->assertSee('100%');

        $this->get('/materials?category=Kanji')
            ->assertOk()
            ->assertSee('✓ Selesai')
            ->assertSee('Kanji JLPT N1: bacaan formal dan akademik');
    }

    public function test_progress_page_supports_quiz_history_without_completed_materials(): void
    {
        $this->seed(LearningContentSeeder::class);
        $student = User::factory()->create(['role' => 'student']);
        $student->results()->create([
            'score' => 80,
            'date' => today(),
            'details' => [],
        ]);

        $this->actingAs($student)
            ->get('/progress')
            ->assertOk()
            ->assertSee('0 dari 33 materi diselesaikan')
            ->assertSee('80%')
            ->assertSee('Quiz selesai')
            ->assertSee('Nilai 80%');
    }

    public function test_quiz_score_is_calculated_and_saved_on_the_server(): void
    {
        $student = User::factory()->create(['role' => 'student']);
        $first = Question::create([
            'question' => 'あ dibaca?',
            'options' => ['a', 'i', 'u', 'e'],
            'correct_answer' => 'a',
            'category' => 'Hiragana',
        ]);
        $second = Question::create([
            'question' => 'い dibaca?',
            'options' => ['a', 'i', 'u', 'e'],
            'correct_answer' => 'i',
            'category' => 'Hiragana',
        ]);

        $this->actingAs($student)->get('/quiz')->assertOk();
        $this->post('/quiz', ['answers' => [$first->id => 'a', $second->id => 'u']])
            ->assertRedirect();

        $this->assertDatabaseHas('results', [
            'user_id' => $student->id,
            'score' => 50,
        ]);

        $result = $student->results()->latest()->firstOrFail();
        $this->assertSame(2, count($result->details));
        $detailsByQuestion = collect($result->details)->keyBy('question_id');
        $this->assertTrue($detailsByQuestion[$first->id]['is_correct']);
        $this->assertSame('a', $detailsByQuestion[$first->id]['selected_answer']);
        $this->assertFalse($detailsByQuestion[$second->id]['is_correct']);
        $this->assertSame('u', $detailsByQuestion[$second->id]['selected_answer']);
        $this->assertSame('i', $detailsByQuestion[$second->id]['correct_answer']);

        $this->get('/results/'.$result->id)
            ->assertOk()
            ->assertSee('Hasil jawaban')
            ->assertSee('Benar')
            ->assertSee('Salah')
            ->assertSee('Jawabanmu:')
            ->assertSee('Jawaban benar:');
    }

    public function test_result_is_only_visible_to_its_owner_or_an_admin(): void
    {
        $student = User::factory()->create();
        $otherStudent = User::factory()->create();
        $result = $student->results()->create(['score' => 80, 'date' => today()]);

        $this->actingAs($otherStudent)->get('/results/'.$result->id)->assertForbidden();
    }
}