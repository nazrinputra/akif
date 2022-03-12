<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Store;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('ms_MY');
        $stores = Store::all()->pluck('id');
        $relation = ['Mother', 'Father', 'Brother', 'Sister', 'Wife', 'Husband', 'Girlfriend', 'Boyfriend', 'Best Friend'];
        $status = ['Single', 'Married', 'Divorced', 'Complicated', 'Rather Not Say'];
        $shirt_size = ['XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL'];

        User::create([
            'name' => 'IT Staff',
            'store_id' => $faker->randomElement($stores),
            'slug' => 'it-staff',
            'phone_no' => '0129876543',
            'email' => 'akif@email.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$R5fmLgPcuHt7OVogqqNEWurkIjZL.kIOwd.wjrfGGvG1wYi2xLxMi', // password
            'ic_no' => $faker->myKadNumber(null, true),
            'email_verified_at' => now(),
            'bank' => $faker->bank(),
            'acc_no' => $faker->bankAccountNumber(),
            'address' => $faker->address(),
            'status' => $faker->randomElement($status),
            'shirt_size' => $faker->randomElement($shirt_size),
            'motor_license' => $faker->boolean(),
            'car_license' => $faker->boolean(),
            'oku_card' => $faker->boolean(),
            'enrolled_at' => now(),
            'resigned_at' => now()->addYears(5),
            'emergency_name_1' => $faker->name(),
            'emergency_phone_no_1' => $faker->mobileNumber(false, false),
            'emergency_relation_1' => $faker->randomElement($relation),
            'emergency_name_2' => $faker->name(),
            'emergency_phone_no_2' => $faker->mobileNumber(false, false),
            'emergency_relation_2' => $faker->randomElement($relation),
        ])->assignRole('IT');

        User::create([
            'name' => 'Admin',
            'store_id' => $faker->randomElement($stores),
            'slug' => 'admin',
            'phone_no' => '0123456789',
            'email' => 'admin@email.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$R5fmLgPcuHt7OVogqqNEWurkIjZL.kIOwd.wjrfGGvG1wYi2xLxMi', // password
            'ic_no' => $faker->myKadNumber(null, true),
            'email_verified_at' => now(),
            'bank' => $faker->bank(),
            'acc_no' => $faker->bankAccountNumber(),
            'address' => $faker->address(),
            'status' => $faker->randomElement($status),
            'shirt_size' => $faker->randomElement($shirt_size),
            'motor_license' => $faker->boolean(),
            'car_license' => $faker->boolean(),
            'oku_card' => $faker->boolean(),
            'enrolled_at' => now(),
            'resigned_at' => now()->addYears(5),
            'emergency_name_1' => $faker->name(),
            'emergency_phone_no_1' => $faker->mobileNumber(false, false),
            'emergency_relation_1' => $faker->randomElement($relation),
            'emergency_name_2' => $faker->name(),
            'emergency_phone_no_2' => $faker->mobileNumber(false, false),
            'emergency_relation_2' => $faker->randomElement($relation),
        ])->assignRole('Admin');
    }
}
