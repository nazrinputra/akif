<?php

namespace Database\Factories;

use App\Models\Store;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Store::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->addProvider(new \Faker\Provider\ms_MY\Miscellaneous($this->faker));
        $name = $this->faker->city();
        $slug = Str::slug($name);

        return [
            'slug' => $slug,
            'name' => $name,
            'phone_no' => $this->faker->fixedLineNumber(false, false),
            'location' => $this->faker->address(),
        ];
    }
}
