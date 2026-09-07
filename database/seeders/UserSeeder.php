<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = request()->user();
        $location = request();
        $user->locations()->machines()->create([
            'name' => 'Sandton Drinks 01',
            'model' => 'Azkoyen Palma HZ70',
            'serial_number' => 'AZK-HZ70-0001',
            'status' => 'online',
            'location_id' => $location->id,
        ]);
    }
}
