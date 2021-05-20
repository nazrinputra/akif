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

    protected $colors = ['Blue', 'Gray', 'Green', 'Red', 'Yellow', 'Light Blue', 'White', 'Black'];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->emoji;
        $slug = Str::slug($name);

        return [
            'name' => $name,
            'slug' => $slug,
            'color' => $this->faker->randomElement($this->colors),
            'description' => $this->faker->sentence()
        ];
    }
}
