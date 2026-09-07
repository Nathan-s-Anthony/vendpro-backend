<?php

namespace Database\Seeders;

use App\Models\Machine;
use App\Models\MachineTelemetry;
use Illuminate\Database\Seeder;

class MachineTelemetrySeeder extends Seeder
{
    public function run(): void
    {
        $machines = Machine::all();

        foreach ($machines as $machine) {

            for ($i = 23; $i >= 0; $i--) {

                $recordedAt = now()->subHours($i);

                $temperature = match ($machine->status) {
                    'online' => fake()->randomFloat(2, 2.5, 6.5),
                    'warning' => fake()->randomFloat(2, 6.5, 10),
                    'offline' => fake()->randomFloat(2, 3, 8),
                };

                MachineTelemetry::create([
                    'machine_id' => $machine->id,

                    // Temperature
                    'temperature' => $temperature,
                    'temperature_unit' => '°C',
                    'humidity' => fake()->randomFloat(2, 45, 70),

                    // Power
                    'voltage' => fake()->randomFloat(2, 220, 240),
                    'current' => fake()->randomFloat(2, 1.5, 5),
                    'power_watts' => fake()->randomFloat(2, 300, 900),

                    // Door
                    'door_status' => fake()->randomElement([
                        'open',
                        'closed',
                        'closed',
                        'closed',
                        'closed',
                    ]),
                    'door_last_opened' => $recordedAt->copy()->subMinutes(
                        fake()->numberBetween(1, 180)
                    ),

                    // Compressor
                    'compressor_status' => fake()->randomElement([
                        'running',
                        'running',
                        'idle',
                    ]),
                    'compressor_runtime_minutes_today' => fake()->numberBetween(
                        100,
                        800
                    ),

                    // Cooling
                    'target_temperature' => 4.0,
                    'current_temperature' => $temperature,

                    // Inventory
                    'total_slots' => 40,
                    'occupied_slots' => fake()->numberBetween(25, 40),
                    'empty_slots' => fake()->numberBetween(0, 15),
                    'low_stock_slots' => fake()->numberBetween(0, 8),

                    // Sales
                    'sales_today' => fake()->numberBetween(20, 80),
                    'revenue_today' => fake()->randomFloat(2, 300, 2500),
                    'transactions_today' => fake()->numberBetween(15, 70),

                    // Connectivity
                    'signal_strength' => fake()->numberBetween(50, 100),
                    'network' => fake()->randomElement([
                        '4G',
                        '4G',
                        '5G',
                        'WiFi',
                    ]),
                    'last_heartbeat' => $recordedAt,

                    // Payment
                    'cash' => true,
                    'card' => true,
                    'contactless' => true,
                    'mobile_payment' => true,

                    // Historical timestamp
                    'recorded_at' => $recordedAt,
                ]);
            }
        }
    }
}