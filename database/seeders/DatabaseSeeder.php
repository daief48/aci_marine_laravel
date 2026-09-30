<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::updateOrCreate(
            ['email' => 'admin@acimarine.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password'),
            ]
        );

        $this->call([
            HeroSlideSeeder::class,
            ProductThumbleSeeder::class,
            ClientSeeder::class,
            NewsEventSeeder::class,
            GalleryCategorySeeder::class,
            GalleryItemSeeder::class,
            CompanyStatSeeder::class,
            SettingSeeder::class,
            ProjectGalleryCategorySeeder::class,
            ProjectReferenceSeeder::class,
        ]);
    }
}
