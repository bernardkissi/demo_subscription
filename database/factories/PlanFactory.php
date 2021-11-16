<?php

namespace Database\Factories;

use App\Models\Plan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

class PlanFactory extends Factory
{
    protected $model = Plan::class;


    public function definition(): array
    {
        return [
            'amount' =>$this->faker->numberBetween(1000, 9999),
            'frequency' => 'monthly'
        ];
    }

    public function plans(): PlanFactory
    {
        return $this->state(new Sequence(
            ['name' => 'Starter' ],
            ['name' => 'Startup'],
            ['name' => 'Enterprise']
        ));
    }
}
