<?php

namespace Database\Factories;

use App\Models\Personality;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonalityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Personality::class;

    protected $color = ['Red', 'Yellow', 'Green', 'Black'];

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
            'color' => $this->faker->randomElement($this->color),
            'description' => $this->faker->sentence()
        ];
    }
}
