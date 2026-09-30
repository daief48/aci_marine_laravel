<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductThumble;
use App\Models\Product;
use Illuminate\Support\Facades\Schema;

class ProductThumbleSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Product::truncate();
        ProductThumble::truncate();
        Schema::enableForeignKeyConstraints();

        // ─── 1. Marine Engines ───────────────────────────────────────────────
        $t1 = ProductThumble::create([
            'title'     => 'Marine Engines',
            'tag'       => 'Marine Engines',
            'subtitle'  => 'High-performance marine propulsion systems from world-leading manufacturers — Mitsubishi and Yuchai — trusted by navies and commercial fleets worldwide.',
            'image'     => 'uploads/product-thumbles/thumb_1_marine_engines.jpg',
            'image_url' => '',
            'order'     => 1,
            'is_active' => true,
        ]);
        $t1->products()->createMany([
            [
                'name'      => 'Mitsubishi Marine Engine',
                'link_url'  => '',
                'order'     => 1,
                'is_active' => true,
            ],
            [
                'name'      => 'Yuchai Marine Engine',
                'link_url'  => '',
                'order'     => 2,
                'is_active' => true,
            ],
        ]);

        // ─── 2. Propulsion & Deck Machinery ──────────────────────────────────
        $t2 = ProductThumble::create([
            'title'     => 'Propulsion & Deck Machinery',
            'tag'       => 'Propulsion & Deck',
            'subtitle'  => 'Complete propulsion solutions and deck equipment — from DAMEN-class tugboats to advanced propeller systems and deck handling machinery for all vessel types.',
            'image'     => 'uploads/product-thumbles/thumb_2_propulsion_deck.jpg',
            'image_url' => '',
            'order'     => 2,
            'is_active' => true,
        ]);
        $t2->products()->createMany([
            [
                'name'      => 'DAMEN Propulsion Systems',
                'link_url'  => '',
                'order'     => 1,
                'is_active' => true,
            ],
            [
                'name'      => 'Propulsion Machineries',
                'link_url'  => '',
                'order'     => 2,
                'is_active' => true,
            ],
            [
                'name'      => 'Deck Machineries',
                'link_url'  => '',
                'order'     => 3,
                'is_active' => true,
            ],
        ]);

        // ─── 3. Navigation & Safety ───────────────────────────────────────────
        $t3 = ProductThumble::create([
            'title'     => 'Navigation & Safety',
            'tag'       => 'Navigation & Safety',
            'subtitle'  => 'State-of-the-art navigation, communication and life-safety systems ensuring crew protection and vessel compliance with international maritime regulations.',
            'image'     => 'uploads/product-thumbles/thumb_3_navigation_safety.jpg',
            'image_url' => '',
            'order'     => 3,
            'is_active' => true,
        ]);
        $t3->products()->createMany([
            [
                'name'      => 'Navigational & Communication Equipment',
                'link_url'  => '',
                'order'     => 1,
                'is_active' => true,
            ],
            [
                'name'      => 'Life Saving & Fire Fighting Appliances',
                'link_url'  => '',
                'order'     => 2,
                'is_active' => true,
            ],
        ]);

        // ─── 4. Navigation & Communication ────────────────────────────────────
        $t4 = ProductThumble::create([
            'title'     => 'Navigation & Communication',
            'tag'       => 'Nav & Comm',
            'subtitle'  => 'Advanced navigation tools, radar systems, AIS, GMDSS communication equipment and integrated bridge solutions for safe and efficient marine operations.',
            'image'     => 'uploads/product-thumbles/thumb_4_navigation_comm.jpg',
            'image_url' => '',
            'order'     => 4,
            'is_active' => true,
        ]);
        $t4->products()->createMany([
            [
                'name'      => 'Radar & Navigation Systems',
                'link_url'  => '',
                'order'     => 1,
                'is_active' => true,
            ],
            [
                'name'      => 'GMDSS Communication Equipment',
                'link_url'  => '',
                'order'     => 2,
                'is_active' => true,
            ],
            [
                'name'      => 'AIS & Integrated Bridge Systems',
                'link_url'  => '',
                'order'     => 3,
                'is_active' => true,
            ],
        ]);

        // ─── 5. Life Saving & Firefighting ────────────────────────────────────
        $t5 = ProductThumble::create([
            'title'     => 'Life Saving & Firefighting',
            'tag'       => 'Safety & Protection',
            'subtitle'  => 'IMO-certified life-saving appliances and firefighting systems — lifeboats, life rafts, fire detection systems and suppression equipment for vessels of all sizes.',
            'image'     => 'uploads/product-thumbles/thumb_5_life_saving.jpg',
            'image_url' => '',
            'order'     => 5,
            'is_active' => true,
        ]);
        $t5->products()->createMany([
            [
                'name'      => 'Life-Saving Appliances (LSA)',
                'link_url'  => '',
                'order'     => 1,
                'is_active' => true,
            ],
            [
                'name'      => 'Firefighting Equipment (FFE)',
                'link_url'  => '',
                'order'     => 2,
                'is_active' => true,
            ],
            [
                'name'      => 'Rescue Boats & Davit Systems',
                'link_url'  => '',
                'order'     => 3,
                'is_active' => true,
            ],
        ]);

        // ─── 6. DAMEN (Tug & Dredgers) ────────────────────────────────────────
        $t6 = ProductThumble::create([
            'title'     => 'DAMEN (Tug & Dredgers)',
            'tag'       => 'Tug & Dredger',
            'subtitle'  => 'Purpose-built DAMEN tugboats and dredging vessels engineered for harbour towage, offshore towing and dredging operations in challenging marine environments.',
            'image'     => 'uploads/product-thumbles/thumb_6_damen.png',
            'image_url' => '',
            'order'     => 6,
            'is_active' => true,
        ]);
        $t6->products()->createMany([
            [
                'name'      => 'DAMEN Tugboats',
                'link_url'  => '',
                'order'     => 1,
                'is_active' => true,
            ],
            [
                'name'      => 'DAMEN Dredging Vessels',
                'link_url'  => '',
                'order'     => 2,
                'is_active' => true,
            ],
        ]);
    }
}
