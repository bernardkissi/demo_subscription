<?php

namespace Database\Factories;

use App\Models\Subscription;
use App\Models\User;
use App\Models\Plan;
use App\Models\Site;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriptionFactory extends Factory
{

    protected $model = Subscription::class;

    public function definition(): array
    {
        return [
            'site_id' => Site::factory()->create()->id,
            'user_id' => User::factory()->create()->id,
            'plan_id' => Plan::factory()->plans()->create()->id,
            'starts_on' => now(),
            'expires_at' => now()->addDays(90),
            'next_due_date' => now()->addDays(30)
        ];
    }
}
