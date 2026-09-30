<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectReferenceSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'slug' => 'crane',
                'hero_bg' => 'project/pic2.jpg',
                'vessel_type' => 'Floating Crane',
                'project_category' => 'Heavy Engineering',
                'title' => 'Propulsion & Control System for 70T Floating Crane',
                'client' => 'FMC Dockyard Ltd.',
                'end_owner' => 'Bangladesh Navy',
                'classification' => 'Bureau Veritas (BV)',
                'overview_heading' => 'Enhancing Heavy Lift Capabilities for Bangladesh Navy',
                'overview_text' => 'ACI Marine & Riverine Technologies Ltd. successfully delivered and installed the complete propulsion machinery package featuring the robust Mitsubishi S6A3-T2MTK3M engine for the Bangladesh Navy\'s 70-Ton Floating Crane.',
                'phases' => [
                    ['title' => 'Phase 1: Component Sourcing', 'status' => 'Verified', 'statusClass' => 'bg-[#F60000]/10 text-[#ff4d4d] border-[#F60000]/20', 'desc' => 'Procurement of original Mitsubishi engines from Japan and Reintjes gearboxes from Germany.'],
                    ['title' => 'Phase 2: On-board Installation', 'status' => 'Completed', 'statusClass' => 'bg-[#F60000]/10 text-[#ff4d4d] border-[#F60000]/20', 'desc' => 'Precision alignment of the propulsion shafting and engine coupling under BV survey.'],
                    ['title' => 'Phase 3: Sea Trials & Handover', 'status' => 'Commissioned', 'statusClass' => 'bg-green-500/10 text-green-400 border-green-500/20', 'desc' => 'Successfully passed rigorous sea trials demonstrating full power output and maneuverability.']
                ],
                'engine_model' => 'Model: S6A3-T2MTK3M',
                'engine_desc' => '2 Units Supplied & Installed',
                'gearbox_model' => 'Model: WAF 344L',
                'gearbox_desc' => 'Ratio: 2.96:1',
                'class_society' => 'Model: Bureau Veritas (BV)',
                'class_desc' => 'I + Hull + Mach',
                'class_specs' => 'I + Hull + Mach',
                'vessel_details' => 'Model: 70-Ton Floating Crane',
                'vessel_desc' => 'Built by FMC Dockyard',
                'diagram_engine' => 'MITSUBISHI',
                'diagram_engine_model' => 'S6A3-T2MTK3M',
                'diagram_gearbox' => 'REINTJES',
                'diagram_gearbox_model' => 'WAF 344L',
                'gallery_title' => 'Project Execution Gallery',
                'gallery_desc' => 'Documenting the installation, trials, and handover process of the propulsion package.',
                'gallery_items' => [
                    ['category' => 'Installation', 'img' => 'project/pic1.jpg', 'title' => 'Propulsion Engine Installation', 'desc' => 'Precise alignment and positioning of the S6A3-T2MTK3M engine on-board the 70T Floating Crane.'],
                    ['category' => 'Machinery', 'img' => 'project/pic2.jpg', 'title' => 'Reintjes Gearbox Coupling', 'desc' => 'Coupling of the premium Reintjes WAF 344L Gearbox (Ratio: 2.96:1) with the main shaft.'],
                    ['category' => 'Machinery', 'img' => 'project/pic3.jpg', 'title' => 'Dual Marine Engine Setup', 'desc' => 'Fully installed twin Mitsubishi marine propulsion package in the engine room layout.'],
                    ['category' => 'Installation', 'img' => 'project/pic4.jpg', 'title' => 'Factory Acceptance Trials (FAT)', 'desc' => 'Comprehensive pre-shipment tests and performance parameters inspection at the testing bay.'],
                    ['category' => 'Trials', 'img' => 'project/pic5.jpg', 'title' => 'Successful Sea Trials', 'desc' => 'Full power sea and river trials executing performance and load tests prior to navy takeover.']
                ],
                'simulation_data' => [
                    'stop' => ['rpm' => '0', 'fuel' => '0', 'cavitation' => '0', 'thrust' => '0', 'efficiency' => '0', 'slip' => '0', 'vibration' => '0'],
                    'slow' => ['rpm' => '350', 'fuel' => '68', 'cavitation' => '0.01', 'thrust' => '24.2', 'efficiency' => '96.2', 'slip' => '0.05', 'vibration' => '0.15'],
                    'normal' => ['rpm' => '850', 'fuel' => '135', 'cavitation' => '0.05', 'thrust' => '82.5', 'efficiency' => '98.4', 'slip' => '0.85', 'vibration' => '0.45'],
                    'max' => ['rpm' => '1250', 'fuel' => '280', 'cavitation' => '1.25', 'thrust' => '145.8', 'efficiency' => '92.1', 'slip' => '2.15', 'vibration' => '1.85']
                ]
            ],
            [
                'slug' => 'tugboat',
                'hero_bg' => 'project/pic1.jpg',
                'vessel_type' => 'Tugboat',
                'project_category' => 'Propulsion',
                'title' => 'Propulsion System Package for Harbour Assistance Tugboat',
                'client' => 'Western Marine Shipyard Ltd.',
                'end_owner' => 'Chittagong Port Authority (CPA)',
                'classification' => 'Bureau Veritas (BV)',
                'overview_heading' => 'Powering Harbour Tug Operations at Chittagong Port',
                'overview_text' => 'ACI Marine & Riverine Technologies Ltd. has successfully supplied and commissioned the high-power marine propulsion system featuring the S16R2-T2MPTA engine for Chittagong Port Authority\'s new harbour tug vessel.',
                'phases' => [
                    ['title' => 'Phase 1: Factory Acceptance (FAT)', 'status' => 'Verified', 'statusClass' => 'bg-[#F60000]/10 text-[#ff4d4d] border-[#F60000]/20', 'desc' => 'Stringent testing and certification of the S16R2 engine and Reintjes WAF series gearbox.'],
                    ['title' => 'Phase 2: Shaft Alignment & Integration', 'status' => 'Completed', 'statusClass' => 'bg-[#F60000]/10 text-[#ff4d4d] border-[#F60000]/20', 'desc' => 'Precise engine integration, coupling, and shaft alignment executed on-site inside the shipyard hull.'],
                    ['title' => 'Phase 3: Bollard Pull & Sea Trials', 'status' => 'Commissioned', 'statusClass' => 'bg-green-500/10 text-green-400 border-green-500/20', 'desc' => 'Successful execution of bollard pull tests and open-sea trials under Bureau Veritas rules.']
                ],
                'engine_model' => 'Model: S16R2-T2MPTA',
                'engine_desc' => '1 Unit Supplied & Installed',
                'gearbox_model' => 'Model: WAF 763',
                'gearbox_desc' => 'High Bollard Pull Output',
                'class_society' => 'Model: Bureau Veritas (BV)',
                'class_desc' => 'Harbour Tug Special Rules',
                'class_specs' => 'Harbour Tug Special Rules',
                'vessel_details' => 'Model: Harbour Tugboat',
                'vessel_desc' => 'Built by Western Marine',
                'diagram_engine' => 'MITSUBISHI',
                'diagram_engine_model' => 'S16R2-T2MPTA',
                'diagram_gearbox' => 'REINTJES',
                'diagram_gearbox_model' => 'WAF 763',
                'gallery_title' => 'Tugboat Integration Gallery',
                'gallery_desc' => 'Visual documentation of engine installation, alignment, and final bollard pull trials.',
                'gallery_items' => [
                    ['category' => 'Installation', 'img' => 'project/pic1.jpg', 'title' => 'Tugboat Propulsion Layout', 'desc' => 'Engine room layout integration for S16R2 marine package.'],
                    ['category' => 'Machinery', 'img' => 'project/pic4.jpg', 'title' => 'Heavy Machinery Assembly', 'desc' => 'Gearbox coupling and control systems calibration.'],
                    ['category' => 'Trials', 'img' => 'project/pic5.jpg', 'title' => 'Sea & Speed Trials', 'desc' => 'High maneuverability verification tests in port waterways.']
                ],
                'simulation_data' => [
                    'stop' => ['rpm' => '0', 'fuel' => '0', 'cavitation' => '0', 'thrust' => '0', 'efficiency' => '0', 'slip' => '0', 'vibration' => '0'],
                    'slow' => ['rpm' => '400', 'fuel' => '85', 'cavitation' => '0.02', 'thrust' => '30.5', 'efficiency' => '95.8', 'slip' => '0.15', 'vibration' => '0.20'],
                    'normal' => ['rpm' => '950', 'fuel' => '210', 'cavitation' => '0.15', 'thrust' => '110.2', 'efficiency' => '97.5', 'slip' => '1.15', 'vibration' => '0.65'],
                    'max' => ['rpm' => '1450', 'fuel' => '380', 'cavitation' => '2.10', 'thrust' => '210.5', 'efficiency' => '89.4', 'slip' => '4.50', 'vibration' => '2.15']
                ]
            ],
            [
                'slug' => 'ferry',
                'hero_bg' => 'project/pic3.jpg',
                'vessel_type' => 'Passenger Ferry',
                'project_category' => 'Marine Equipment',
                'title' => 'Twin Engine Propulsion Package for Passenger Ro-Ro Ferry',
                'client' => 'Three Angle Marine Ltd.',
                'end_owner' => 'BIWTC',
                'classification' => 'RINA Class',
                'overview_heading' => 'Improving Ro-Ro Passenger Ferry Reliability',
                'overview_text' => 'ACI Marine & Riverine Technologies Ltd. has successfully supplied, coupled, and commissioned the twin Mitsubishi S6R2-T2MPTK marine engine propulsion package on BIWTC\'s new Ro-Ro utility passenger ferry.',
                'phases' => [
                    ['title' => 'Phase 1: Pre-shipment Audit', 'status' => 'Verified', 'statusClass' => 'bg-[#F60000]/10 text-[#ff4d4d] border-[#F60000]/20', 'desc' => 'Audit of engine power curves and emission standards compliance checked at source labs.'],
                    ['title' => 'Phase 2: Shipboard Twin Integration', 'status' => 'Completed', 'statusClass' => 'bg-[#F60000]/10 text-[#ff4d4d] border-[#F60000]/20', 'desc' => 'Installation of twin engines and matching gearboxes with dual control levers.'],
                    ['title' => 'Phase 3: Commissioning & Endurance Trials', 'status' => 'Commissioned', 'statusClass' => 'bg-green-500/10 text-green-400 border-green-500/20', 'desc' => 'Endurance trials executed on river routes over 48 hours continuous running.']
                ],
                'engine_model' => 'Model: S6R2-T2MPTK',
                'engine_desc' => '2 Units (Twin Screw) Supplied',
                'gearbox_model' => 'Model: Twin Disc MGX',
                'gearbox_desc' => 'Quick Shift Technology',
                'class_society' => 'Model: RINA Class',
                'class_desc' => 'Passenger Vessel Rules',
                'class_specs' => 'Passenger Vessel Rules',
                'vessel_details' => 'Model: Utility Ro-Ro Ferry',
                'vessel_desc' => 'Built by Three Angle Marine',
                'diagram_engine' => 'MITSUBISHI (x2)',
                'diagram_engine_model' => 'S6R2-T2MPTK',
                'diagram_gearbox' => 'TWIN DISC',
                'diagram_gearbox_model' => 'MGX Series',
                'gallery_title' => 'Ferry Equipment Integration',
                'gallery_desc' => 'Twin engine setup and control panel testing documentation.',
                'gallery_items' => [
                    ['category' => 'Installation', 'img' => 'project/pic3.jpg', 'title' => 'Twin Screw Setup', 'desc' => 'Twin S6R2 engines installed in parallel.'],
                    ['category' => 'Machinery', 'img' => 'project/pic2.jpg', 'title' => 'Twin Disc Gearbox', 'desc' => 'Coupled with quick shift MGX gearboxes.'],
                ],
                'simulation_data' => [
                    'stop' => ['rpm' => '0', 'fuel' => '0', 'cavitation' => '0', 'thrust' => '0', 'efficiency' => '0', 'slip' => '0', 'vibration' => '0'],
                    'slow' => ['rpm' => '450', 'fuel' => '45', 'cavitation' => '0.01', 'thrust' => '18.4', 'efficiency' => '94.2', 'slip' => '0.10', 'vibration' => '0.10'],
                    'normal' => ['rpm' => '1150', 'fuel' => '165', 'cavitation' => '0.10', 'thrust' => '95.6', 'efficiency' => '98.8', 'slip' => '0.65', 'vibration' => '0.35'],
                    'max' => ['rpm' => '1650', 'fuel' => '295', 'cavitation' => '0.85', 'thrust' => '165.2', 'efficiency' => '94.5', 'slip' => '1.85', 'vibration' => '1.25']
                ]
            ]
        ];

        foreach ($projects as $project) {
            \App\Models\ProjectReference::updateOrCreate(
                ['slug' => $project['slug']],
                $project
            );
        }
    }
}
