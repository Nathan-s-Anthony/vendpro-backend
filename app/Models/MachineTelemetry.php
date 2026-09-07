<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MachineTelemetry extends Model
{
    protected $fillable = [
        'machine_id',
        'temperature',
        'temperature_unit',
        'humidity',
        'voltage',
        'current',
        'power_watts',
        'door_status',
        'door_last_opened',
        'compressor_status',
        'compressor_runtime_minutes_today',
        'target_temperature',
        'current_temperature',
        'total_slots',
        'occupied_slots',
        'empty_slots',
        'low_stock_slots',
        'sales_today',
        'revenue_today',
        'transactions_today',
        'signal_strength',
        'network',
        'last_heartbeat',
        'cash',
        'card',
        'contactless',
        'mobile_payment',
        'recorded_at',
    ];

    protected $casts = [
        'temperature' => 'decimal:2',
        'humidity' => 'decimal:2',
        'voltage' => 'decimal:2',
        'current' => 'decimal:2',
        'power_watts' => 'decimal:2',

        'door_last_opened' => 'datetime',
        'last_heartbeat' => 'datetime',
        'recorded_at' => 'datetime',

        'target_temperature' => 'decimal:2',
        'current_temperature' => 'decimal:2',
        'revenue_today' => 'decimal:2',

        'cash' => 'boolean',
        'card' => 'boolean',
        'contactless' => 'boolean',
        'mobile_payment' => 'boolean',
    ];

    public function machine(): BelongsTo
    {
        return $this->belongsTo(Machine::class);
    }
}