<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\SourceCargo;
class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
                // CompanySeeder::class,
                // SeoSeeder::class,
            AvailableMachineSeeder::class,
            LocationSeeder::class,
            SourceCargoSeeder::class
        ]);

        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Nathan',
            'email' => 'nathan@test.com',
            'password' => "nathan",
        ]);




    }
}
