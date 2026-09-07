<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('model');
            $table->string('serial_number')->unique();

            $table->enum('status', [
                'online',
                'offline',
                'warning',
            ])->default('offline');

            $table->string('image')->nullable();

            $table->foreignId('location_id')
                ->nullable()
                ->constrained('locations')
                ->nullOnDelete();
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->dateTime('last_maintenance')->nullable();
            $table->dateTime('next_maintenance')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('machines');
    }
};