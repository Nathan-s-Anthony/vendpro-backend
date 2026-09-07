<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Machine extends Model
{
    protected $fillable = [
        'name',
        'model',
        'serial_number',
        'status',
        'image',
        'location_id',
        'last_maintenance',
        'next_maintenance',
    ];

    protected $casts = [
        'last_maintenance' => 'datetime',
        'next_maintenance' => 'datetime',
    ];

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function telemetry(): HasMany
    {
        return $this->hasMany(MachineTelemetry::class);
    }

    public function faults(): HasMany
    {
        return $this->hasMany(MachineFault::class);
    }
    public function latestTelemetry(): HasOne
    {
        return $this->hasOne(MachineTelemetry::class)
            ->latestOfMany('recorded_at');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}