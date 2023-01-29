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
        Schema::create('stations', function (Blueprint $table) {
            $table->id("FID");
            $table->integer('ID');
            $table->string('Nimi');
            $table->string('Namn');
            $table->string('Name');
            $table->string('Osoite');
            $table->string('Adress');
            $table->string('Kaupunki');
            $table->string('Stad');
            $table->string('Operaattor');
            $table->string('Kapasiteet');
            $table->float('x', 15, 13);
            $table->float('y', 15, 13);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stations');
    }
};
