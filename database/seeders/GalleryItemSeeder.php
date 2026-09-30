<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GalleryItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        \App\Models\GalleryItem::truncate();
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        $items = [
            // VESSELS
            ['category' => 'vessels', 'image_url' => 'general%20picture/Survey%20vessel.jpg', 'badge' => 'Vessels', 'title' => 'Hydrographic Survey Vessel', 'description' => 'Purpose-built vessel for precision hydrographic surveys', 'is_featured' => true],
            ['category' => 'vessels', 'image_url' => 'general%20picture/354915555_677420691049576_5606179065659663370_n.jpg', 'badge' => 'Vessels', 'title' => 'Coastal Patrol Craft', 'description' => 'High-speed patrol vessel for maritime security', 'is_featured' => false],
            ['category' => 'vessels', 'image_url' => 'general%20picture/486493534_1089576656500642_7106133393976490661_n.jpg', 'badge' => 'Vessels', 'title' => 'Cargo Vessel Fleet', 'description' => 'Commercial cargo vessel powered by Mitsubishi engines', 'is_featured' => false],
            // SERVICE
            ['category' => 'service', 'image_url' => 'general%20picture/pic6.jpg', 'badge' => 'Service', 'title' => 'Shipyard Operations', 'description' => 'Active vessel construction and maintenance at our partner shipyard', 'is_featured' => false],
            ['category' => 'service', 'image_url' => 'general%20picture/331804601_1562375384276335_1235203292799377914_n.jpg', 'badge' => 'Service', 'title' => 'Dry Dock Facility', 'description' => 'State-of-the-art dry dock for vessel overhaul and repair', 'is_featured' => false],
            ['category' => 'service', 'image_url' => 'general%20picture/486470191_1089390536519254_335357332023646958_n.jpg', 'badge' => 'Service', 'title' => 'Vessel Maintenance', 'description' => 'Comprehensive marine engine maintenance and service', 'is_featured' => false],
            // EQUIPMENT
            ['category' => 'equipment', 'image_url' => 'general%20picture/572508178_122189430116544653_6398468528580544483_n.jpg', 'badge' => 'Equipment', 'title' => 'Marine Equipment Delivery', 'description' => 'Specialized marine equipment ready for installation', 'is_featured' => false],
        ];

        $catMap = [
            'vessels' => \App\Models\GalleryCategory::where('name', 'Vessels')->first()->id,
            'service' => \App\Models\GalleryCategory::where('name', 'Service')->first()->id,
            'equipment' => \App\Models\GalleryCategory::where('name', 'Equipment')->first()->id,
        ];

        foreach ($items as $i => $item) {
            $catId = $catMap[$item['category']];
            unset($item['category']);
            \App\Models\GalleryItem::create(array_merge($item, ['gallery_category_id' => $catId, 'order' => $i + 1]));
        }
    }
}
