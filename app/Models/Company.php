<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use App\Models\Seo;
class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        // Add your other company fields here
    ];

    /**
     * SEO metadata for this company.
     */
    public function seo(): MorphOne
    {
        return $this->morphOne(Seo::class, 'seoable');
    }
}