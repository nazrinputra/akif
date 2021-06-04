<?php

namespace Database\Factories;

use App\Models\Health;
use Illuminate\Database\Eloquent\Factories\Factory;

class HealthFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Health::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = ucwords($this->faker->unique()->word());
        $slug = Str::slug($name);

        return [
            'name' => $name,
            'slug' => $slug,
            'description' => $this->faker->sentence()
        ];
    }
}
