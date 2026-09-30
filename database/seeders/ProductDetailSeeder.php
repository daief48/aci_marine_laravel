<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = \App\Models\Product::all();

        foreach ($products as $product) {
            // Apply default rich data to existing products
            $product->update([
                'general_info' => "The " . $product->name . " engine is designed and built in Japan. From the combustion chamber design to the fuel injection technology, to the turbocharger and the advanced cooling system. Everything has been perfectly balanced to provide highly reliable operation, optimum fuel consumption and minimized installation footprint. Utilizing a long-stroke block with in-house MHI turbocharger technology, we have managed to maintain the footprint of our lower output engines, while substantially increasing the power output. Its maintenance is easy as each cylinder has its own cylinder head. We offer a complete package, including a built-up heat exchanger, a seawater pump and panels for a compact design, ensuring easy installation and maintenance.",
                'benefits' => ["Reliable and durable", "Compact in size", "Easy maintenance", "High torque density", "Fuel efficiency under heavy load"],
                'applications' => "Propulsion / Auxiliary Generator for fishing boats, work boats, tugboats, etc.",
                'features' => [
                    "ucd" => [
                        "title" => "Unrestricted Continuous Duty (UCD)",
                        "desc" => "Engine is rated for unrestricted continuous operation at full load, offering exceptional reliability for ocean-going vessels, large tugs, and deep sea fishing operations."
                    ],
                    "hd" => [
                        "title" => "Heavy Duty (HD)",
                        "desc" => "Optimized for heavy duty operation. Ideal for vessels running up to 6,000 hours per year, providing constant power with high fuel efficiency."
                    ],
                    "md" => [
                        "title" => "Medium Duty (MD)",
                        "desc" => "Ideal for vessels that require variable speeds and loads. Provides a perfect balance between high-end performance and long-term durability."
                    ],
                    "performance" => [
                        "title" => "Powerful Performance",
                        "desc" => "High torque and rapid speed acceleration are fully compatible with all marine propulsion applications, guaranteeing excellent maneuverability."
                    ],
                    "reliability" => [
                        "title" => "High Reliability",
                        "desc" => "ACI Marine has supplied over 120 thousand marine engines since 1916. The MHI design ensures maximum uptime and operation safety under extreme conditions."
                    ],
                    "safety" => [
                        "title" => "Safety Management",
                        "desc" => "Designed with safety in mind. Large inspection covers are available in the crankcase and oil pan for easy safety checks and quick maintenance access."
                    ]
                ],
                'specs' => [
                    ["key" => "Application", "val" => "Propulsion/Auxiliary Generator"],
                    ["key" => "Cylinder configuration", "val" => "6 in-line"],
                    ["key" => "Total displacement (l)", "val" => "14.6"],
                    ["key" => "Bore x stroke (mm)", "val" => "135 x 170"],
                    ["key" => "Flywheel and housing", "val" => "SAE 14/SAE No.1"],
                    ["key" => "Compression ratio", "val" => "14.2:1"],
                    ["key" => "Dry weight (kg)", "val" => "1600"],
                    ["key" => "Dimensions - L x W x H (mm)", "val" => "1834 x 873 x 1331"],
                    ["key" => "Method of operation", "val" => "4-cycle, water cooled, diesel engine, direct-injection, turbocharged with air-cooler"],
                    ["key" => "Cooling method", "val" => "Engine coolant: Indirect cooling by sea water / Intake air: Direct cooling by sea water"]
                ],
                'ratings' => "D rating (254 kW / 340 bhp @ 2330 rpm), Tier I emission class.",
                'docs' => "User manuals, parts catalogues, and technical installation guides are available upon request."
            ]);
        }
    }
}
