<?php

namespace Database\Factories;

use App\Models\Car;
use Faker\Provider\Fakecar;
use Illuminate\Support\Str;
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
        $this->faker->addProvider(new \Faker\Provider\ms_MY\Miscellaneous($this->faker));
        $plate_no = $this->faker->jpjNumberPlate;
        $slug = Str::slug($plate_no);

        return [
            'plate_no' => $plate_no,
            'slug' => $slug,
            'brand' => $this->faker->vehicleBrand,
            'model' => $this->faker->vehicleModel,
            'color' => $this->faker->colorName,
            'size' => $this->faker->randomElement($this->size)
        ];
    }
}
