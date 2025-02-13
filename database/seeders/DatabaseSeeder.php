<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Box;
use App\Models\Blog;
use App\Models\Tenant;
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

        // Créer des utilisateur
        User::factory(9)->create();

        // Créer des blogs
        Blog::factory(10)->create();

        // Créer des boxes et les associer à l'utilisateur
        Box::factory(10)->create([
            'user_id' => $user->id
        ]);

        // Créer des tenants
        Tenant::factory(10)->create();
    }
}
