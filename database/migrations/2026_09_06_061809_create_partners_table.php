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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g. MHIET Japan / Mitsubishi
            $table->string('role_subtitle')->nullable(); // e.g. Global Engineering & Technology
            $table->string('badge_text')->default('Authorized Distributor'); // e.g. Authorized Distributor / Exclusive Partner
            $table->string('estd_year')->nullable()->default('ESTD. 2018'); // e.g. ESTD. 2018
            $table->string('logo'); // Image path
            $table->text('description')->nullable(); // Partnership statement
            $table->string('partner_url')->nullable(); // External link or info
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
