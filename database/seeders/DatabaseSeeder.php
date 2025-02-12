<?php

namespace Database\Seeders;

use App\Models\User;  // Garder cette ligne unique
use App\Models\Box;
use App\Models\Blog;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Créer un utilisateur
        $user = User::factory()->create([
            'name' => 'toto',
            'email' => 'toto@toto.fr',
        ]);

        // Créer des blogs
        Blog::factory(10)->create();

        // Créer des boxes et les associer à l'utilisateur
        Box::factory(10)->create([
            'user_id' => $user->id
        ]);
    }
}
