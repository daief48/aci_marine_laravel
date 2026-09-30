<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Setting::truncate();
        \App\Models\Setting::create([
            'key' => 'story_narrative_1',
            'value' => 'For over two decades, ACI Marine has been at the forefront of Bangladesh\'s maritime industry — delivering world-class marine engines, propulsion systems, and comprehensive engineering solutions. As the authorized distributor of Mitsubishi Heavy Industries marine engines, we power the vessels that drive the nation\'s economy.'
        ]);
        \App\Models\Setting::create([
            'key' => 'story_narrative_2',
            'value' => 'From the Bangladesh Navy and Coast Guard to major port authorities and private shipping lines, our partnerships span the entire maritime ecosystem. Each project reflects our commitment to precision engineering, reliability, and maritime excellence.'
        ]);
        \App\Models\Setting::create([
            'key' => 'story_featured_image',
            'value' => 'general%20picture/Survey%20vessel.jpg'
        ]);
        \App\Models\Setting::create([
            'key' => 'story_featured_title',
            'value' => 'Hydrographic Survey Vessel'
        ]);

        // About Page Settings
        \App\Models\Setting::create([
            'key' => 'about_mission_paragraph',
            'value' => 'ACI Marine and Riverine Technologies Limited, a concern of ACI Group started its Marine and Riverine Technology business at 2018 with the vision to contribute in Marine and Riverine sector in Bangladesh. The company is driven with a mission of \'Improving Quality of Life through responsible application of technology and services in Marine & Riverine operation\'.'
        ]);
        \App\Models\Setting::create([
            'key' => 'about_vision_paragraph',
            'value' => 'ACI Marine are initially concentrating in Improving quality of Marine Engines which are used in ocean going and inland ships, fishing trawler as well as dredging sectors. ACI Marine have plan to improve the quality of dredging operation in Bangladesh which will help to improve the navigability of inland water system.'
        ]);
        \App\Models\Setting::create([
            'key' => 'about_quote',
            'value' => 'ACI Marine and Riverine Technologies Limited started journey with one of the world\'s leading Marine Engine & generator brand \'Mitsubishi Heavy Industries Engine and Turbocharger Ltd\' in the Bangladesh.'
        ]);
        \App\Models\Setting::create([
            'key' => 'about_partnership_paragraph_1',
            'value' => 'Mitsubishi Heavy Industries Engine and Turbocharger Ltd (MHIET), a concern of \'Mitsubishi Heavy Industries\' who are one of the world\'s leading industrial groups, spanning energy, logistics and infrastructure, industrial machinery, aerospace and defense.'
        ]);
        \App\Models\Setting::create([
            'key' => 'about_partnership_paragraph_2',
            'value' => 'Mitsubishi Engines and Generator sets are built to last and meet the high demands of reliability needed in the extreme conditions of the offshore industry. Mitsubishi engines are purpose-designed for marine use. The engine is designed based on marine vessels used in Unrestricted Continuous Duty circumstances.'
        ]);
        \App\Models\Setting::create([
            'key' => 'about_partnership_paragraph_3',
            'value' => 'MHIET is now offering completely customized offshore wind containerized generator sets for backup applications. Mitsubishi Marine Engines are available in a wide output range from 106 kW to 3850 kW suitable for propulsion, auxiliary, diesel-electric, emergency and harbor emergency use.'
        ]);
        \App\Models\Setting::create([
            'key' => 'about_output_range',
            'value' => '106 - 3850 kW'
        ]);
        \App\Models\Setting::create([
            'key' => 'about_duty_rating',
            'value' => 'Unrestricted'
        ]);
        \App\Models\Setting::create([
            'key' => 'about_durability_value',
            'value' => '98'
        ]);
        \App\Models\Setting::create([
            'key' => 'about_efficiency_value',
            'value' => '94'
        ]);
        \App\Models\Setting::create([
            'key' => 'about_economy_value',
            'value' => '96'
        ]);
        \App\Models\Setting::create([
            'key' => 'about_conclusion_paragraph',
            'value' => 'Possibilities in different hotspots of inland riverine and coastal development can create a new era of development and ACI Marine & Riverine Technologies Ltd is heading toward the same goal. Large scale projects in the domain of marine and riverine industries are inevitable in Bangladesh which will eventually ensure sustainable growth for ACI Marine & Riverine Technologies. Moreover, complete monitored instrument ensure the marine diesel engine & generator\'s Safe operation.'
        ]);

        // Projects Page Settings
        \App\Models\Setting::create([
            'key' => 'projects_page_subtitle',
            'value' => 'Reference Projects'
        ]);
        \App\Models\Setting::create([
            'key' => 'projects_page_title',
            'value' => 'Successful Track Records'
        ]);
        \App\Models\Setting::create([
            'key' => 'projects_page_description',
            'value' => 'Showcase of our high-performance marine projects. Click any project card below to explore its technical details.'
        ]);

        // Contact and Footer Settings
        \App\Models\Setting::create([
            'key' => 'contact_address',
            'value' => 'ACI Centre, 245 Tejgaon Industrial Area, Dhaka-1208, Bangladesh'
        ]);
        \App\Models\Setting::create([
            'key' => 'contact_map_url',
            'value' => 'https://www.google.com/maps/embed?pb=...'
        ]);
        \App\Models\Setting::create([
            'key' => 'contact_email',
            'value' => 'acimarine@aci-bd.com'
        ]);
        \App\Models\Setting::create([
            'key' => 'contact_office_phone',
            'value' => '(+88) 01700701761'
        ]);
        \App\Models\Setting::create([
            'key' => 'contact_hotline',
            'value' => '16533'
        ]);
        \App\Models\Setting::create([
            'key' => 'contact_hours',
            'value' => 'Sat - Thu: 9:00 AM - 6:00 PM'
        ]);
        \App\Models\Setting::create([
            'key' => 'footer_about_text',
            'value' => 'ACI Marine and Riverine Technologies Limited, a concern of ACI Group, started its journey in 2018 with the vision to pioneer advanced engineering, shipbuilding, and propulsion systems in Bangladesh.'
        ]);
        \App\Models\Setting::create([
            'key' => 'footer_facebook_1',
            'value' => 'https://www.facebook.com/mhi.acimarine'
        ]);
        \App\Models\Setting::create([
            'key' => 'footer_facebook_2',
            'value' => 'https://www.facebook.com/ACIMarineEquipment'
        ]);
        \App\Models\Setting::create([
            'key' => 'footer_linkedin',
            'value' => 'https://www.linkedin.com/company/mhi-acimarine'
        ]);
    }
}
