<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\Queue;
use App\Models\Store;
use App\Models\Package;
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

    protected $package;

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
        $this->package  = $this->faker->randomElement(Package::all());
        $date = $this->faker->dateTimeThisMonth('+15 days');

        return [
            'store_id' => $this->faker->randomElement($this->stores),
            'car_id' => $this->car,
            'customer_id' => $this->customer,
            'package_id' => $this->package,
            'status' => $this->faker->randomElement($this->status),
            'remarks' => ucwords($this->faker->words(3, true)),
            'created_at' => $date,
            'updated_at' => $date
        ];
    }
}
