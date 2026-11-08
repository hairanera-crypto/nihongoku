<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_creates_a_hashed_student_account(): void
    {
        $response = $this->post('/register', [
            'name' => 'Ayu',
            'email' => 'ayu@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $user = User::where('email', 'ayu@example.com')->firstOrFail();

        $response->assertRedirect('/login');
        $this->assertSame('student', $user->role);
        $this->assertNotSame('password123', $user->password);
        $this->assertGuest();

        $this->get('/login')
            ->assertOk()
            ->assertSee('Akun berhasil dibuat. Silakan masuk dengan akun Anda.');

        $this->post('/login', [
            'email' => 'ayu@example.com',
            'password' => 'password123',
        ])->assertRedirect('/materials');

        $this->assertAuthenticatedAs($user);
    }

    public function test_login_redirects_admin_to_dashboard(): void
    {
        User::factory()->create([
            'email' => 'admin@example.com',
            'password' => 'password123',
            'role' => 'admin',
        ]);

        $this->post('/login', [
            'email' => 'admin@example.com',
            'password' => 'password123',
        ])->assertRedirect('/admin/dashboard');
    }

    public function test_students_cannot_open_admin_dashboard(): void
    {
        $student = User::factory()->create(['role' => 'student']);

        $this->actingAs($student)
            ->get('/admin/dashboard')
            ->assertForbidden();
    }

    public function test_guests_are_redirected_to_login_when_opening_admin_dashboard(): void
    {
        $this->get('/admin/dashboard')
            ->assertRedirect('/login');

        $this->get('/login')->assertOk();
        $this->assertGuest();
    }
}