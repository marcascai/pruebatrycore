<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planetas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('periodo')->nullable(); //en días terrestres
            $table->integer('diametro')->nullable(); //en Km
            $table->string('clima',100)->nullable(); //clima
            $table->string('terreno',100)->nullable();
            $table->integer('gravedad')->nullable(); // en m/s2
            $table->string('agua',2)->nullable(); //hay agua si/no
            $table->integer('visitas');
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
        Schema::dropIfExists('planetas');
    }
}
