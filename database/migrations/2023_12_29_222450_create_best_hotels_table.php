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
        Schema::create('best_hotels', function (Blueprint $table) {
            $table->id();
            $table->string('hotel');
            $table->unsignedTinyInteger('hotelRate');
            $table->decimal('hotelFare', 8, 2);
            $table->text('roomAmenities');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('best_hotels');
    }
};
