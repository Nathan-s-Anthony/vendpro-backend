<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('machine_telemetries', function (Blueprint $table) {
            $table->id();

            $table->foreignId('machine_id')
                ->constrained('machines')
                ->cascadeOnDelete();

            // Temperature
            $table->decimal('temperature', 5, 2);
            $table->enum('temperature_unit', ['°C', '°F']);
            $table->decimal('humidity', 5, 2);

            // Power
            $table->decimal('voltage', 8, 2);
            $table->decimal('current', 8, 2);
            $table->decimal('power_watts', 10, 2);

            // Door
            $table->enum('door_status', ['open', 'closed']);
            $table->dateTime('door_last_opened')->nullable();

            // Compressor
            $table->enum('compressor_status', [
                'running',
                'idle',
                'offline',
            ]);

            $table->unsignedInteger(
                'compressor_runtime_minutes_today'
            )->default(0);

            // Cooling
            $table->decimal('target_temperature', 5, 2);
            $table->decimal('current_temperature', 5, 2);

            // Inventory
            $table->unsignedInteger('total_slots')->default(0);
            $table->unsignedInteger('occupied_slots')->default(0);
            $table->unsignedInteger('empty_slots')->default(0);
            $table->unsignedInteger('low_stock_slots')->default(0);

            // Sales
            $table->unsignedInteger('sales_today')->default(0);
            $table->decimal('revenue_today', 10, 2)->default(0);
            $table->unsignedInteger('transactions_today')->default(0);

            // Connectivity
            $table->unsignedTinyInteger('signal_strength')->nullable();

            $table->enum('network', [
                '3G',
                '4G',
                '5G',
                'WiFi',
                'offline',
            ])->default('offline');

            $table->dateTime('last_heartbeat')->nullable();

            // Payment
            $table->boolean('cash')->default(false);
            $table->boolean('card')->default(false);
            $table->boolean('contactless')->default(false);
            $table->boolean('mobile_payment')->default(false);

            // Historical timestamp
            $table->dateTime('recorded_at');

            $table->timestamps();

            // Useful for historical queries
            $table->index([
                'machine_id',
                'recorded_at',
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('machine_telemetries');
    }
};