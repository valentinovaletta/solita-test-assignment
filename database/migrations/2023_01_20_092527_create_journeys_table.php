<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journeys', function (Blueprint $table) {
            $table->id();
            $table->timestamp('departure_time')->useCurrent();
            $table->timestamp('return_time')->useCurrent();
            $table->integer('departure_station_id');
            $table->string('departure_station_name');
            $table->integer('return_station_id');
            $table->string('return_station_name');
            $table->integer('covered_distance');
            $table->integer('duration');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('journeys');
    }
};
