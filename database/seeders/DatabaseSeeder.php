<?php

namespace Database\Seeders;

use BlogCategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run():void
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            ManufacturerSeeder::class,
            PrdCategorySeeder::class,
            PaymentSeeder::class,
            AdminSeeder::class,
            BlogCategorySeeder::class,
            UserSeeder::class,
        ]);
    }
}
