<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contract;
use App\Models\Box;
use App\Models\Tenant;
use App\Models\User;
use App\Models\ContractTemplate;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contract>
 */
class ContractFactory extends Factory
{
    protected $model = Contract::class;

    public function definition()
    {
        return [
            'box_id' => Box::inRandomOrder()->first()->id ?? Box::factory(),
            'tenant_id' => Tenant::inRandomOrder()->first()->id ?? Tenant::factory(),
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'contract_template_id' => ContractTemplate::inRandomOrder()->first()->id ?? ContractTemplate::factory(),
            'monthly_price' => $this->faker->randomFloat(2, 50, 500), // Prix entre 50 et 500€
            'start_date' => now(),
            'end_date' => now()->addMonths($this->faker->numberBetween(3, 24)), // Entre 3 et 24 mois
        ];
    }
}
