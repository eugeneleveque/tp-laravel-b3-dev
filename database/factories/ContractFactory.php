<?php

namespace Database\Factories;

use App\Models\Contract;
use App\Models\Box;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContractFactory extends Factory
{
    protected $model = Contract::class;

    public function definition(): array
    {
        $box = Box::inRandomOrder()->first();
        $tenant = Tenant::inRandomOrder()->first();

        do {
            $start_date = fake()->dateTimeBetween('-1 year', 'now');
            $end_date = fake()->dateTimeBetween($start_date, '+6 months');
        } while (Contract::where('box_id', $box->id)
            ->where(function ($query) use ($start_date, $end_date) {
                $query->whereBetween('start_date', [$start_date, $end_date])
                    ->orWhereBetween('end_date', [$start_date, $end_date])
                    ->orWhere(function ($query) use ($start_date, $end_date) {
                        $query->where('start_date', '<=', $start_date)
                            ->where('end_date', '>=', $end_date);
                    });
            })
            ->exists());

        return [
            'box_id' => $box->id,
            'tenant_id' => $tenant->id,
            'start_date' => $start_date,
            'end_date' => $end_date,
        ];
    }

}
