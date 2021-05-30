<?php

namespace Database\Factories;

use App\Models\Role;
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

    protected $roles;

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
        $this->roles = Role::all();

        $roles = $this->roles->whereNotIn('name', ['Administrator', 'Owner']);
        $name = $this->faker->name();
        $slug = Str::slug($name);

        return [
            'name' => $name,
            'role_id' => $this->faker->randomElement($roles),
            'store_id' => $this->faker->randomElement($this->stores),
            'email' => $this->faker->unique()->safeEmail(),
            'slug' => $slug,
            'phone_no' => $this->faker->mobileNumber(false, false),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
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
