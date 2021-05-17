<?php

namespace Database\Factories;

use App\Models\Car;
use Faker\Provider\Fakecar;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Car::class;

    protected $size = ['S', 'M', 'L', 'XL'];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->addProvider(new Fakecar($this->faker));

        return [
            'plate_no' => $this->faker->vehicleRegistration,
            'brand' => $this->faker->vehicleBrand,
            'model' => $this->faker->vehicleModel,
            'color' => $this->faker->colorName,
            'size' => $this->faker->randomElement($this->size)
        ];
    }
}
