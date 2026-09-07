<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Location;
class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Location::create([
            'name' => 'Sandton City',
            'address' => '83 Rivonia Road, Sandton, Johannesburg',
        ]);

        Location::create([
            'name' => 'Rosebank Mall',
            'address' => '15A Cradock Avenue, Rosebank, Johannesburg',
        ]);

        Location::create([
            'name' => 'Melrose Arch',
            'address' => '1 Melrose Boulevard, Melrose Arch, Johannesburg',
        ]);

        Location::create([
            'name' => 'Fourways Mall',
            'address' => '6 Magwa Crescent, Fourways, Johannesburg',
        ]);
    }
}
