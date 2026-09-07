<?php

namespace Database\Seeders;

use App\Models\Machine;
use App\Models\Location;
use Illuminate\Database\Seeder;

class MachineSeeder extends Seeder
{
    public function run(): void
    {
        $locations = Location::all();

        Machine::create([
            'name' => 'Sandton Drinks 01',
            'model' => 'Azkoyen Palma HZ70',
            'serial_number' => 'AZK-HZ70-0001',
            'status' => 'online',
            'image' => 'machines/palma-hz70.jpg',
            'location_id' => $locations[0]->id,
            'last_maintenance' => now()->subDays(14),
            'next_maintenance' => now()->addDays(76),
        ]);

        Machine::create([
            'name' => 'Rosebank Snacks 01',
            'model' => 'Necta Festival',
            'serial_number' => 'NCT-FST-0001',
            'status' => 'online',
            'image' => 'machines/necta-festival.jpg',
            'location_id' => $locations[1]->id,
            'last_maintenance' => now()->subDays(21),
            'next_maintenance' => now()->addDays(69),
        ]);

        Machine::create([
            'name' => 'Melrose Drinks 01',
            'model' => 'Azkoyen Palma HZ70',
            'serial_number' => 'AZK-HZ70-0002',
            'status' => 'warning',
            'image' => 'machines/palma-hz70.jpg',
            'location_id' => $locations[2]->id,
            'last_maintenance' => now()->subDays(45),
            'next_maintenance' => now()->addDays(45),
        ]);

        Machine::create([
            'name' => 'Fourways Combo 01',
            'model' => 'Crane Merchant Media',
            'serial_number' => 'CRN-MM-0001',
            'status' => 'offline',
            'image' => 'machines/crane-merchant.jpg',
            'location_id' => $locations[3]->id,
            'last_maintenance' => now()->subDays(60),
            'next_maintenance' => now()->addDays(30),
        ]);
    }
}