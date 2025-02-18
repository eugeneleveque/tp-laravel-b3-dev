<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ContractTemplate;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContractTemplate>
 */
class ContractTemplateFactory extends Factory
{
    protected $model = ContractTemplate::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'content' => json_encode(['blocks' => [['type' => 'paragraph', 'data' => ['text' => $this->faker->paragraph()]]]]),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
