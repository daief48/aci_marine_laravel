<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HeroSlide;

class HeroSlideSeeder extends Seeder
{
    public function run(): void
    {
        // Remove all existing slides
        HeroSlide::truncate();

        HeroSlide::insert([
            [
                'subtitle'   => 'Excellence in Naval Engineering',
                'title'      => 'Building the Future of Marine & Riverine Vessels',
                'video_url'  => null,
                'link_text'  => 'Discover Our Fleet',
                'link_url'   => '/projects',
                'text_color' => 'light',
                'order'      => 1,
                'is_active'  => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'subtitle'   => 'Defense & Security Solutions',
                'title'      => 'Robust Vessels Built for National Security & Patrol Operations',
                'video_url'  => null,
                'link_text'  => 'Explore Defense Projects',
                'link_url'   => '/projects',
                'text_color' => 'light',
                'order'      => 2,
                'is_active'  => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'subtitle'   => 'Advanced Research & Survey',
                'title'      => 'State-of-the-Art Research Vessels for Scientific Discovery',
                'video_url'  => null,
                'link_text'  => 'View Research Vessels',
                'link_url'   => '/projects',
                'text_color' => 'light',
                'order'      => 3,
                'is_active'  => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'subtitle'   => 'Trusted Across the Industry',
                'title'      => 'Decades of Experience Delivering Quality You Can Rely On',
                'video_url'  => null,
                'link_text'  => 'About ACI Marine',
                'link_url'   => '/about',
                'text_color' => 'light',
                'order'      => 4,
                'is_active'  => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'subtitle'   => 'Innovation at Sea',
                'title'      => 'Engineering Smarter, Greener & More Efficient Marine Solutions',
                'video_url'  => null,
                'link_text'  => 'Get in Touch',
                'link_url'   => '/contact',
                'text_color' => 'light',
                'order'      => 5,
                'is_active'  => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
