<?php

namespace Database\Factories;

use App\Models\Site;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'site_id' => Site::factory()->create()->id,
            'title' => $name = $this->faker->unique()->name(),
            'slug' => Str::slug($name),
            'description' => $this->faker->sentence(5),
        ];
    }


    public function hasBeenDispatched()
    {
        return $this->state(new Sequence(
            ['is_dispatched' => false ],
            ['is_dispatched' => true]
        ));
    }
}
