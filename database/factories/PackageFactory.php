<?php

namespace Database\Factories;

use App\Models\Package;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PackageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Package::class;

    protected $promotion = ['Yes', 'No'];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = ucwords($this->faker->words(3, true));
        $slug = Str::slug($name);

        return [
            'slug' => $slug,
            'name' => $name,
            'price' => $this->faker->randomNumber(4, true),
            'commission' => $this->faker->randomNumber(3, true),
            'frequency' => $this->faker->words(3, true),
            'duration' => $this->faker->words(3, true),
            'description' => $this->faker->sentences(5, true),
            'promotion' => $this->faker->randomElement($this->promotion)
        ];
    }
}
