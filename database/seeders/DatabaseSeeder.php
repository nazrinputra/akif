<?php

namespace Database\Seeders;

use App\Models\Store;
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
        // \App\Models\User::factory(10)->create();

        Store::create([
            'name' => 'Tambak Bugis',
            'slug' => 'tambak-bugis',
            'address' => "Unknown"
        ]);

        Store::create([
            'name' => 'Bukit Katil',
            'slug' => 'bukit-katil',
            'address' => "Unknown"
        ]);
    }
}
