<?php

namespace Database\Seeders;

use App\Models\AvailableMachine;
use Illuminate\Database\Seeder;

class AvailableMachineSeeder extends Seeder
{
    public function run(): void
    {
        AvailableMachine::create([
            'name' => 'VendPro V-200',
            'model' => 'V-200',
            'serial_number' => 'VPV200-001842',
            'image' => 'machine/vendpro-v200.jpeg',
        ]);

        AvailableMachine::create([
            'name' => 'VendPro V-300',
            'model' => 'V-300',
            'serial_number' => 'VPV300-002731',
            'image' => 'machine/vendpro-v300.jpg',
        ]);


    }
}