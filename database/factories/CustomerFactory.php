<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->addProvider(new \Faker\Provider\ms_MY\Person($this->faker));
        $this->faker->addProvider(new \Faker\Provider\ms_MY\PhoneNumber($this->faker));
        $name = $this->faker->name;
        $slug = Str::slug($name);

        return [
            'name' => $name,
            'slug' => $slug,
            'phone_no' => $this->faker->mobileNumber(false, false),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
        ];
    }
}
