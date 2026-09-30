<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GalleryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        \App\Models\GalleryCategory::truncate();
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        \App\Models\GalleryCategory::create(['name' => 'Vessels', 'order' => 1]);
        \App\Models\GalleryCategory::create(['name' => 'Service', 'order' => 2]);
        \App\Models\GalleryCategory::create(['name' => 'Equipment', 'order' => 3]);
    }
}
