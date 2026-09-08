<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SourceCargo;
class SourceCargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SourceCargo::create([
            'name' => 'Makro',
            'url' => 'https://www.takealot.com/',
            'image' => 'retailers/makro-logo.png',
        ]);
    }
}
