<?php

namespace Database\Factories;

use App\Models\Whatsapp;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class WhatsappFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Whatsapp::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = ucwords($this->faker->words(3, true));
        $slug = Str::slug($title);

        return [
            'title' => $title,
            'slug' => $slug,
            'message' => $this->faker->sentences(3, true),
        ];
    }
}
