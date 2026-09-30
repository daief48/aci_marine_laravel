<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Setting::updateOrCreate(
            ['key' => 'clients_page_subtitle'],
            ['value' => 'Valued Partners']
        );
        \App\Models\Setting::updateOrCreate(
            ['key' => 'clients_page_title'],
            ['value' => 'Major Clients']
        );
        \App\Models\Setting::updateOrCreate(
            ['key' => 'clients_page_description'],
            ['value' => 'MarTech Shipping & Engineering has earned the confidence and trust of its valued clients through consistent performance and reliability. Our team brings extensive experience and strong professional associations with various national and international organizations. A selection of our esteemed clients includes']
        );
    }
}
