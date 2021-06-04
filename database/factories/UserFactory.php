<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Store;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    protected $stores;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->addProvider(new \Faker\Provider\ms_MY\Person($this->faker));
        $this->faker->addProvider(new \Faker\Provider\ms_MY\PhoneNumber($this->faker));

        $this->stores = Store::all();

        $name = $this->faker->name();
        $slug = Str::slug($name);

        return [
            'name' => $name,
            'store_id' => $this->faker->randomElement($this->stores),
            'email' => $this->faker->unique()->safeEmail(),
            'slug' => $slug,
            'phone_no' => $this->faker->mobileNumber(false, false),
            'email_verified_at' => now(),
            'acc_no' => $this->faker->numberBetween($min = 1000000000, $max = 9999999999),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            /**
         * ic_no
         * acc_no
         * address
         * status
         * shirt_size
         * motor_license
         * car_license
         * start_at
         * resign_at
         * emergency_name_1
         * emergency_phone_no_1
         * emergency_relation_1
         * emergency_name_2
         * emergency_phone_no_2
         * emergency_relation_2
         */
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
