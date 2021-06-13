<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('ms_MY');

        Package::create([
            'slug' => 'signature-wash',
            'name' => 'Signature Wash',
            'custom_price' => false,
            'price' => 3000,
            'commission' => 300,
            'frequency' => $faker->words(3, true),
            'duration' => $faker->words(3, true),
            'description' => $faker->sentences(5, true),
            'promotion' => true,
        ]);

        Package::create([
            'slug' => 'signature-wax',
            'name' => 'Signature Wax',
            'custom_price' => false,
            'price' => 10000,
            'commission' => 1000,
            'frequency' => $faker->words(3, true),
            'duration' => $faker->words(3, true),
            'description' => $faker->sentences(5, true),
            'promotion' => true,
        ]);

        Package::create([
            'slug' => 'signature-scrub',
            'name' => 'Signature Scrub',
            'custom_price' => false,
            'price' => 35000,
            'commission' => 3500,
            'frequency' => $faker->words(3, true),
            'duration' => $faker->words(3, true),
            'description' => $faker->sentences(5, true),
            'promotion' => true,
        ]);

        Package::create([
            'slug' => 'signature-polish',
            'name' => 'Signature Polish',
            'custom_price' => true,
            'price' => 15000,
            'commission' => null,
            'frequency' => $faker->words(3, true),
            'duration' => $faker->words(3, true),
            'description' => $faker->sentences(5, true),
            'promotion' => true,
        ]);
    }
}
