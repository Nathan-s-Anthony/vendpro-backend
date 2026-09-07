<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('machine_faults', function (Blueprint $table) {
            $table->id();

            $table->foreignId('machine_id')
                ->constrained('machines')
                ->cascadeOnDelete();

            $table->string('code');

            $table->text('message');

            $table->enum('severity', [
                'info',
                'warning',
                'critical',
            ]);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('machine_faults');
    }
};