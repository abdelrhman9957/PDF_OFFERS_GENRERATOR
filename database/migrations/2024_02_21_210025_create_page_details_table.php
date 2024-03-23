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
        Schema::create('page_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->constrained('pages')->onDelete('restrict');
            $table->foreignId('hotel_id')->constrained('hotels')->onDelete('restrict');
            $table->date('entry_date');
            $table->integer('nights');
            $table->foreignId('room_id')->constrained('rooms')->onDelete('restrict');
            $table->foreignId('meal_id')->constrained('meals')->onDelete('restrict');
            $table->foreignId('user_id')->constrained('users')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_details');
    }
};
