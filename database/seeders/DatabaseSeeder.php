<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Box;
use App\Models\Blog;
use App\Models\Tenant;
use App\Models\Contract;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Vérifie si un utilisateur avec cet email existe déjà
        $user = User::firstOrCreate([
            'email' => 'toto@toto.fr'
        ], [
            'name' => 'toto',
            'password' => bcrypt('password')
        ]);

        // Créer des utilisateur
        User::factory(9)->create();

        // Créer des blogs
        Blog::factory(10)->create();

        // Créer des boxes et les associer à l'utilisateur
        Box::factory(10)->create();

        // Créer des tenants
        Tenant::factory(10)->create();

        Contract::factory(10)->create();

    }
}