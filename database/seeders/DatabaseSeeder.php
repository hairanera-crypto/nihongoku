<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (! Schema::hasTable('materials') || ! Schema::hasTable('questions')) {
            $this->command?->warn('Jalankan php artisan migrate terlebih dahulu.');

            return;
        }

        $this->call(LearningContentSeeder::class);

        if (env('ADMIN_EMAIL') && env('ADMIN_PASSWORD')) {
            User::updateOrCreate(
                ['email' => env('ADMIN_EMAIL')],
                ['name' => env('ADMIN_NAME', 'Admin NIHONGOKU'), 'password' => Hash::make(env('ADMIN_PASSWORD')), 'role' => 'admin']
            );
        }
    }
}
