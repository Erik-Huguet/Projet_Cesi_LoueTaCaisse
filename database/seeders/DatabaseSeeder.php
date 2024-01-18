<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Cars;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersSeeder::class,
            AdressesSeeder::class,
            CarsSeeder::class,
            ContratsSeeder::class,
            FacturesSeeder::class,
            RolesSeeder::class,

            ]);
        // \App\Models\Users::factory(10)->create();

        // \App\Models\Users::factory()->create([
        //     'name' => 'Test Users',
        //     'email' => 'test@example.com',
        // ]);
    }
}
