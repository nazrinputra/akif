<?php

namespace Database\Factories;

use App\Models\Package;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->words(3, true);
        $slug = Str::slug($name);

        return [
            'slug' => $slug,
            'name' => $name,
            'price' => $this->faker->randomNumber(2, true),
            'description' => $this->faker->sentences(5, true),
        ];
    }
}
