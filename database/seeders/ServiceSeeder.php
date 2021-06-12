<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('ms_MY');

        Service::create([
            'slug' => 'maintenance-wash',
            'name' => 'Maintenance Wash',
            'custom_price' => false,
            'commission' => 200,
            'description' => $faker->sentence()
        ]);

        Service::create([
            'slug' => 'signature-wash',
            'name' => 'Signature Wash',
            'custom_price' => false,
            'commission' => 300,
            'description' => $faker->sentence()
        ]);

        Service::create([
            'slug' => 'vip-wash',
            'name' => 'VIP Wash',
            'custom_price' => false,
            'commission' => 1000,
            'description' => $faker->sentence()
        ]);

        Service::create([
            'slug' => 'protection-wax',
            'name' => 'Protection Wax',
            'custom_price' => false,
            'commission' => 500,
            'description' => $faker->sentence()
        ]);

        Service::create([
            'slug' => 'scrubbing',
            'name' => 'Scrubbing',
            'custom_price' => false,
            'commission' => 3000,
            'description' => $faker->sentence()
        ]);

        Service::create([
            'slug' => 'glaze-and-wax',
            'name' => 'Glaze and Wax',
            'custom_price' => false,
            'commission' => 3000,
            'description' => $faker->sentence()
        ]);

        Service::create([
            'slug' => 'paint-polish',
            'name' => 'Paint Polish',
            'custom_price' => false,
            'commission' => 5000,
            'description' => $faker->sentence()
        ]);

        Service::create([
            'slug' => 'paint-glass-coating',
            'name' => 'Paint Glass Coating',
            'custom_price' => false,
            'commission' => 15000,
            'description' => $faker->sentence()
        ]);

        Service::create([
            'slug' => 'paint-ceramic-coating',
            'name' => 'Paint Ceramic Coating',
            'custom_price' => false,
            'commission' => 15000,
            'description' => $faker->sentence()
        ]);

        Service::create([
            'slug' => 'engine-bay-wash',
            'name' => 'Engine Bay Wash',
            'custom_price' => false,
            'commission' => 500,
            'description' => $faker->sentence()
        ]);

        Service::create([
            'slug' => 'windows-treatment',
            'name' => 'Windows Treatment',
            'custom_price' => true,
            'commission' => null,
            'description' => $faker->sentence()
        ]);

        Service::create([
            'slug' => 'headlamp-polish',
            'name' => 'Headlamp Polish',
            'custom_price' => false,
            'commission' => 500,
            'description' => $faker->sentence()
        ]);

        Service::create([
            'slug' => 'headlamp-cerakote-koating',
            'name' => 'Headlamp Cerakote Coating',
            'custom_price' => false,
            'commission' => 1000,
            'description' => $faker->sentence()
        ]);

        Service::create([
            'slug' => 'headlamp-aikka-koating',
            'name' => 'Headlamp Aikka Coating',
            'custom_price' => false,
            'commission' => 4000,
            'description' => $faker->sentence()
        ]);

        Service::create([
            'slug' => 'windows-tattooing',
            'name' => 'Windows Tattooing',
            'custom_price' => false,
            'commission' => 500,
            'description' => $faker->sentence()
        ]);

        Service::create([
            'slug' => 'seat-and-interiors-cleaning',
            'name' => 'Seat and Interiors Cleaning',
            'custom_price' => true,
            'commission' => null,
            'description' => $faker->sentence()
        ]);

        Service::create([
            'slug' => 'nano-mist-treatment',
            'name' => 'Nano Mist Treatment',
            'custom_price' => false,
            'commission' => 300,
            'description' => $faker->sentence()
        ]);

        Service::create([
            'slug' => 'inner-cabin-pest-control',
            'name' => 'Inner Cabin Pest Control',
            'custom_price' => false,
            'commission' => 300,
            'description' => $faker->sentence()
        ]);

        Service::create([
            'slug' => 'interior-maintenance-plastic',
            'name' => 'Interior Maintenance Plastic',
            'custom_price' => false,
            'commission' => 100,
            'description' => $faker->sentence()
        ]);

        Service::create([
            'slug' => 'interior-maintenance-leather',
            'name' => 'Interior Maintenance Leather',
            'custom_price' => true,
            'commission' => null,
            'description' => $faker->sentence()
        ]);

        Service::create([
            'slug' => 'exterior-trims-restore',
            'name' => 'Exterior Trims Restore',
            'custom_price' => false,
            'commission' => 300,
            'description' => $faker->sentence()
        ]);

        Service::create([
            'slug' => 'door-handle-scratch-remover',
            'name' => 'Door Handle Scratch Remover',
            'custom_price' => false,
            'commission' => 100,
            'description' => $faker->sentence()
        ]);

        Service::create([
            'slug' => 'cg-jetseal',
            'name' => 'CG Jetseal',
            'custom_price' => false,
            'commission' => 500,
            'description' => $faker->sentence()
        ]);

        Service::create([
            'slug' => 'touchup-polish',
            'name' => 'Touchup Polish',
            'custom_price' => true,
            'commission' => null,
            'description' => $faker->sentence()
        ]);
    }
}
