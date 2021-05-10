<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Store::create([
            'id' => 1,
            'name' => 'Tambak Bugis',
            'slug' => 'tambak-bugis',
            'address' => "Unknown"
        ]);

        Store::create([
            'id' => 2,
            'name' => 'Bukit Katil',
            'slug' => 'bukit-katil',
            'address' => "Unknown"
        ]);
    }
}
