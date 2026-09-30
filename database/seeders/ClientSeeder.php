<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Client::truncate();
        
        $clients = [
            ['name' => 'Chittagong Port Authority', 'logo_url' => 'image/logos/cpa.svg'],
            ['name' => 'Mongla Port Authority', 'logo_url' => 'image/logos/mongla.svg'],
            ['name' => 'Payra Port Authority', 'logo_url' => 'image/logos/payra.svg'],
            ['name' => 'Bangladesh Navy', 'logo_url' => 'image/logos/navy.svg'],
            ['name' => 'Bangladesh Coast Guard', 'logo_url' => 'image/logos/coastguard.svg'],
            ['name' => 'Khulna Shipyard', 'logo_url' => 'image/logos/khulna.svg'],
            ['name' => 'Dockyard & Engineering Works Limited', 'logo_url' => 'image/logos/dockyard.svg'],
            ['name' => 'Chittagong Dry Dock Limited', 'logo_url' => 'image/logos/cddl.svg'],
            ['name' => 'BIWTA', 'logo_url' => 'image/logos/biwta.svg'],
            ['name' => 'BIWTC', 'logo_url' => 'image/logos/biwtc.svg'],
            ['name' => 'BWDB', 'logo_url' => 'image/logos/bwdb.svg'],
            ['name' => 'BSC', 'logo_url' => 'image/logos/bsc.svg'],
            ['name' => 'DBL Group', 'logo_url' => 'image/logos/dbl.svg'],
            ['name' => 'SSR Group', 'logo_url' => 'image/logos/ssr.svg'],
            ['name' => 'Quest Logistics', 'logo_url' => 'image/logos/quest.svg'],
            ['name' => 'Green Line Paribahan', 'logo_url' => 'image/logos/greenline.svg'],
            ['name' => 'Petromax LPG', 'logo_url' => 'image/logos/petromax.svg'],
            ['name' => 'BM LP Gas', 'logo_url' => 'image/logos/bmlpgas.svg'],
            ['name' => 'BRAC Development', 'logo_url' => 'image/logos/brac.svg'],
            ['name' => 'Sea Pearl Resort & Spa', 'logo_url' => 'image/logos/seapearl.svg'],
            ['name' => 'City Group', 'logo_url' => 'image/logos/citygroup.svg'],
            ['name' => 'Bashundhara', 'logo_url' => 'image/logos/bashundhara.svg'],
            ['name' => 'Karnafully Shipbuilders Ltd', 'logo_url' => 'image/logos/karnafully.svg'],
            ['name' => 'Marine House Consultancy', 'logo_url' => 'image/logos/marinehouse.svg'],
            ['name' => 'Radiant Shipyard Limited', 'logo_url' => 'image/logos/radiant.svg'],
            ['name' => 'OMEL', 'logo_url' => 'image/logos/omel.svg'],
            ['name' => 'Toggi Shipping & Logistics', 'logo_url' => 'image/logos/toggi.svg'],
        ];

        foreach ($clients as $i => $client) {
            \App\Models\Client::create([
                'name' => $client['name'],
                'logo_url' => $client['logo_url'],
                'order' => $i + 1
            ]);
        }
    }
}
