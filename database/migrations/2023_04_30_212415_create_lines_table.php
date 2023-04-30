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
        Schema::create('lines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bus_id')->constrained();
            $table->string('code');
            $table->foreignId('start_station_id')->constrained('stations');
            $table->foreignId('end_station_id')->constrained('stations');
            $table->time('departure_time');
            $table->time('arrival_time');
            $table->float('distance_km');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lines');
    }
};
