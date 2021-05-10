<?php

namespace Database\Seeders;

use App\Models\Store;
use App\Models\Car;
use App\Models\Customer;
use App\Models\Queue;
use App\Models\Service;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CarSeeder::class,
            CustomerSeeder::class,
            QueueSeeder::class,
            ServiceSeeder::class,
            StoreSeeder::class,
        ]);
    }
}
