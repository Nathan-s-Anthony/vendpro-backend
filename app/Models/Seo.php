<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Seo extends Model
{
    use HasFactory;

    protected $table = 'seo';

    protected $fillable = [
        'seoable_type',
        'seoable_id',

        // Search engines
        'title',
        'description',
        'keywords',
        'canonical_url',

        // Indexing
        'robots',
        'sitemap_priority',
        'sitemap_change_frequency',

        // Open Graph
        'og_title',
        'og_description',
        'og_image',
        'og_type',
        'og_url',

        // Twitter / X
        'twitter_card',
        'twitter_title',
        'twitter_description',
        'twitter_image',

        // Structured data
        'schema_type',
        'schema_data',

        // Optional extras
        'author',
        'locale',
    ];

    protected $casts = [
        'schema_data' => 'array',
        'sitemap_priority' => 'decimal:1',
    ];

    /**
     * The model this SEO data belongs to.
     */
    public function seoable(): MorphTo
    {
        return $this->morphTo();
    }
}