<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->create([
            // 'name' => 'Mateus Durães',
            // 'email' => 'mateusduraessilva.com.com',
        ]);

        Book::insert([
            [
                'user_id'    => $user->id,
                'titulo'     => 'Clean Code',
                'autor'      => 'Robert C. Martin',
                'capa_url'   => 'https://exemplo.com/capas/clean-code.jpg',
                'status'     => 'lendo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id'    => $user->id,
                'titulo'     => 'O Senhor dos Anéis',
                'autor'      => 'J. R. R. Tolkien',
                'capa_url'   => 'https://exemplo.com/capas/senhor-dos-aneis.jpg',
                'status'     => 'quero_ler',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
