<?php

namespace Database\Factories;

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
        $name = ucfirst($this->faker->words(3, true));
        $slug = Str::slug($name);
        $custom_price = $this->faker->boolean();

        if ($custom_price) {
            $commission = NULL;
        } else {
            $commission = $this->faker->randomNumber(3, true);
        }

        return [
            'slug' => $slug,
            'name' => $name,
            'custom_price' => $custom_price,
            'commission' => $commission,
            'description' => $this->faker->sentences(5, true),
        ];
    }
}
