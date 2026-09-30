<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyStatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\CompanyStat::truncate();
        \App\Models\CompanyStat::create(['number' => '25+', 'label' => 'Years', 'order' => 1]);
        \App\Models\CompanyStat::create(['number' => '500+', 'label' => 'Projects', 'order' => 2]);
        \App\Models\CompanyStat::create(['number' => '50+', 'label' => 'Clients', 'order' => 3]);
        \App\Models\CompanyStat::create(['number' => '3', 'label' => 'Shipyards', 'order' => 4]);
    }
}
