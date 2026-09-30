<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('project_references', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('hero_bg')->nullable();
            $table->string('vessel_type');
            $table->string('project_category');
            $table->string('title');
            $table->string('client');
            $table->string('end_owner');
            $table->string('classification');
            
            $table->string('overview_heading');
            $table->text('overview_text');
            
            $table->string('engine_model')->nullable();
            $table->string('engine_desc')->nullable();
            $table->string('gearbox_model')->nullable();
            $table->string('gearbox_desc')->nullable();
            $table->string('class_society')->nullable();
            $table->string('class_desc')->nullable();
            $table->string('class_specs')->nullable();
            $table->string('vessel_details')->nullable();
            $table->string('vessel_desc')->nullable();
            
            $table->string('diagram_engine')->nullable();
            $table->string('diagram_engine_model')->nullable();
            $table->string('diagram_gearbox')->nullable();
            $table->string('diagram_gearbox_model')->nullable();
            
            $table->string('gallery_title')->nullable();
            $table->text('gallery_desc')->nullable();
            
            $table->json('phases')->nullable();
            $table->json('gallery_items')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_references');
    }
};
