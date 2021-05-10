<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Service::create([
            'id' => 1,
            'title' => 'Service 1',
            'price' => 'RM1',
            'duration' => '1 hour',
            'frequency' => 'Every day',
            'package' => 'Wash and Vacuum',
            'details' => 'Good service choice'
        ]);
    }
}
