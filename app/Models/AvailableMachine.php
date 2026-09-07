<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvailableMachine extends Model
{
    protected $fillable = [
        'name',
        'model',
        'serial_number',
        'image',
    ];
}
