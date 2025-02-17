<?php

namespace Database\Factories;

use App\Models\Box;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class BoxFactory extends Factory
{
    protected $model = Box::class;

    public function definition(): array
    {
        return [
            'owner_id' => random_int(1, User::count()),
            'name' => $this->faker->word(),
            'size' => $this->faker->numberBetween(5, 50), // Taille aléatoire entre 5 et 50 m²
            'price' => $this->faker->randomFloat(2, 50, 500), // Prix aléatoire entre 50€ et 500€
            'location' => $this->faker->address(),
            'status' => $this->faker->randomElement(['disponible', 'occupé', 'réservé']),
        ];
    }
}
