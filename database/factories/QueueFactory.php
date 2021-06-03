<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\Queue;
use App\Models\Store;
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

    protected $car;

    protected $customer;

    protected $status = ['Waiting', 'Grooming', 'Completed', 'Collected', 'Cancelled'];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->stores = Store::all();
        $this->car  = $this->faker->randomElement(Car::all());
        $this->customer  = $this->car->owners->first();

        return [
            'store_id' => $this->faker->randomElement($this->stores),
            'car_id' => $this->car,
            'customer_id' => $this->customer,
            'status' => $this->faker->randomElement($this->status),
            'remarks' => ucwords($this->faker->words(3, true)),
            'created_at' => $this->faker->dateTimeThisMonth($max = 'now', $timezone = null)
        ];
    }
}
