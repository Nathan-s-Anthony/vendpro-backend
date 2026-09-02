<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Seo;


class SeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company = Company::first();
        $company->seo()->create([
            'title' => 'Vendors R Us | Professional Services',
            'description' => 'My Company provides professional services across South Africa.',
            'canonical_url' => 'https://example.com/my-company',

            'og_title' => 'My Company',
            'og_description' => 'Professional services across South Africa.',
            'og_image' => '/images/my-company.jpg',

            'twitter_card' => 'summary_large_image',

            'schema_type' => 'Organization',
            'schema_data' => [
                'name' => 'My Company',
                'url' => 'https://example.com/my-company',
            ],
        ]);
    }
}
