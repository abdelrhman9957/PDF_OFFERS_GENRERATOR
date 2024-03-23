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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->longText('note')->nullable();
            $table->foreignId('offer_id')->constrained('o_f_f_e_r_s')->onDelete('restrict');
            $table->foreignId('city_id')->constrained('cities')->onDelete('restrict');
            $table->boolean('travel_type')->default(0);
            $table->string('details_ids');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
