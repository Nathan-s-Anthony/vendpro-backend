<?php

namespace Database\Seeders;

use App\Models\Machine;
use App\Models\Location;
use Illuminate\Database\Seeder;
use App\Models\User;
class MachineSeeder extends Seeder
{
    public function run(): void
    {
        $locations = Location::all();

        $user = User::where('email', 'nathan@test.com')->first();

        Machine::create([
            'name' => 'Rosebank Snacks 01',
            'model' => 'Necta Festival',
            'serial_number' => 'NCT-FST-0001',
            'status' => 'online',
            'image' => 'machine/vendpro-v300.jpg',
            'location_id' => $locations[1]->id,
            'user_id' => $user->id,
            'last_maintenance' => now()->subDays(21),
            'next_maintenance' => now()->addDays(69),
        ]);


        Machine::create([

            'name' => 'Melrose Drinks 01',
            'model' => 'Azkoyen Palma HZ70',
            'serial_number' => 'AZK-HZ70-0002',
            'status' => 'warning',
            'image' => 'machine/vendpro-v400.jpg',
            'location_id' => $locations[2]->id,
            'user_id' => $user->id,
            'last_maintenance' => now()->subDays(45),
            'next_maintenance' => now()->addDays(45),
        ]);

        Machine::create([

            'name' => 'Fourways Combo 01',
            'model' => 'Crane Merchant Media',
            'serial_number' => 'CRN-MM-0001',
            'status' => 'offline',
            'image' => 'machine/vendpro-v500.jpg',
            'location_id' => $locations[3]->id,
            'user_id' => $user->id,
            'last_maintenance' => now()->subDays(60),
            'next_maintenance' => now()->addDays(30),
        ]);
    }
}