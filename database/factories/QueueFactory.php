<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\Queue;
use App\Models\Store;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class QueueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Queue::class;

    protected $stores;

    protected $cars;

    protected $status = ['Waiting', 'Grooming', 'Completed', 'Collected', 'Cancelled'];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->stores = Store::all();
        $this->cars  = Car::all();

        return [
            'store_id' => $this->faker->randomElement($this->stores),
            'car_id' => $this->faker->randomElement($this->cars),
            'status' => $this->faker->randomElement($this->status),
        ];
    }
}
