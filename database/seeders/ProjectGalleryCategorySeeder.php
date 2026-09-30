<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProjectGalleryCategory;

class ProjectGalleryCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Installation', 'order' => 1, 'is_active' => true],
            ['name' => 'Machinery', 'order' => 2, 'is_active' => true],
            ['name' => 'Trials', 'order' => 3, 'is_active' => true],
        ];

        foreach ($categories as $cat) {
            ProjectGalleryCategory::updateOrCreate(
                ['name' => $cat['name']],
                $cat
            );
        }
    }
}
