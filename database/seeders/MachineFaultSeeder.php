<?php

namespace Database\Seeders;

use App\Models\Machine;
use App\Models\MachineFault;
use Illuminate\Database\Seeder;

class MachineFaultSeeder extends Seeder
{
    public function run(): void
    {
        $machines = Machine::all();

        MachineFault::create([
            'machine_id' => $machines[2]->id,
            'code' => 'TEMP_HIGH',
            'message' => 'Machine temperature is above the configured threshold.',
            'severity' => 'warning',
        ]);

        MachineFault::create([
            'machine_id' => $machines[2]->id,
            'code' => 'COMPRESSOR_RUNTIME',
            'message' => 'Compressor runtime is higher than expected.',
            'severity' => 'warning',
        ]);

        MachineFault::create([
            'machine_id' => $machines[3]->id,
            'code' => 'MACHINE_OFFLINE',
            'message' => 'Machine has not sent a heartbeat recently.',
            'severity' => 'critical',
        ]);

        MachineFault::create([
            'machine_id' => $machines[3]->id,
            'code' => 'NETWORK_LOST',
            'message' => 'Machine has lost network connectivity.',
            'severity' => 'critical',
        ]);

        MachineFault::create([
            'machine_id' => $machines[0]->id,
            'code' => 'LOW_STOCK',
            'message' => 'Several product slots are running low.',
            'severity' => 'info',
        ]);
    }
}