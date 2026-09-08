<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SourceCargo extends Model
{
    protected $fillable = [
        'name',
        'url',
        'image',
    ];
}
