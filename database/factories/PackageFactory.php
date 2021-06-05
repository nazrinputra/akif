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

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = ucwords($this->faker->words(3, true));
        $slug = Str::slug($name);
        $custom_price = $this->faker->boolean();

        if ($custom_price) {
            $price = NULL;
            $commission = NULL;
        } else {
            $price = $this->faker->randomNumber(4, true);
            $commission = $this->faker->randomNumber(3, true);
        }

        return [
            'slug' => $slug,
            'name' => $name,
            'custom_price' => $custom_price,
            'price' => $price,
            'commission' => $commission,
            'frequency' => $this->faker->words(3, true),
            'duration' => $this->faker->words(3, true),
            'description' => $this->faker->sentences(5, true),
            'promotion' => $this->faker->boolean(),
        ];
    }
}
