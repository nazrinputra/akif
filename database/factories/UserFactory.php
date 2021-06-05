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

    protected $relation = ['Mother', 'Father', 'Brother', 'Sister', 'Wife', 'Husband', 'Girlfriend', 'Boyfriend', 'Best Friend'];

    protected $status = ['Single', 'Married', 'Divorced', 'Complicated', 'Rather Not Say'];

    protected $shirt_size = ['XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL'];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->addProvider(new \Faker\Provider\ms_MY\Person($this->faker));
        $this->faker->addProvider(new \Faker\Provider\ms_MY\PhoneNumber($this->faker));
        $this->faker->addProvider(new \Faker\Provider\ms_MY\Payment($this->faker));
        $faker = \Faker\Factory::create('ms_MY');

        $this->stores = Store::all();

        $name = $this->faker->name();
        $slug = Str::slug($name);

        return [
            'name' => $name,
            'store_id' => $this->faker->randomElement($this->stores),
            'email' => $this->faker->unique()->safeEmail(),
            'slug' => $slug,
            'phone_no' => $this->faker->mobileNumber(false, false),
            'ic_no' => $this->faker->myKadNumber(null, true),
            'email_verified_at' => now(),
            'bank' => $this->faker->bank(),
            'acc_no' => $this->faker->bankAccountNumber(),
            'address' => $faker->address(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'status' => $this->faker->randomElement($this->status),
            'shirt_size' => $this->faker->randomElement($this->shirt_size),
            'motor_license' => $this->faker->boolean(),
            'car_license' => $this->faker->boolean(),
            'oku_card' => $this->faker->boolean(),
            'enrolled_at' => now(),
            'resigned_at' => now()->addYears(5),
            'emergency_name_1' => $this->faker->name(),
            'emergency_phone_no_1' => $this->faker->mobileNumber(false, false),
            'emergency_relation_1' => $this->faker->randomElement($this->relation),
            'emergency_name_2' => $this->faker->name(),
            'emergency_phone_no_2' => $this->faker->mobileNumber(false, false),
            'emergency_relation_2' => $this->faker->randomElement($this->relation),
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
