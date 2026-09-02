<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('seo', function (Blueprint $table) {
            $table->id();
            // Polymorphic relationship
            $table->morphs('seoable');
            // Search engines
            $table->string('title', 60)->nullable();
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
            $table->string('canonical_url')->nullable();
            // Search engine indexing
            $table->string('robots')->default('index, follow');
            $table->decimal('sitemap_priority', 2, 1)->default(0.5);
            $table->string('sitemap_change_frequency')->default('monthly');

            // Open Graph
            $table->string('og_title', 60)->nullable();
            $table->text('og_description')->nullable();
            $table->string('og_image')->nullable();
            $table->string('og_type')->default('website');
            $table->string('og_url')->nullable();

            // Twitter / X
            $table->string('twitter_card')->default('summary_large_image');
            $table->string('twitter_title', 60)->nullable();
            $table->text('twitter_description')->nullable();
            $table->string('twitter_image')->nullable();

            // Structured data
            $table->string('schema_type')->nullable();
            $table->json('schema_data')->nullable();

            // Misc
            $table->string('author')->nullable();
            $table->string('locale', 10)->default('en_ZA');

            $table->timestamps();

            $table->unique(['seoable_type', 'seoable_id']);
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo');
    }
};
