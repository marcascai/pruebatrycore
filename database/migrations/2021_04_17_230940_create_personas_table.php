<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('genero', 50);
            $table->integer('altura') ->nullable();
            $table->integer('peso') ->nullable();
            $table->date('nacimiento')->nullable();
            $table->integer('planeta');
            $table->string('color')->nullable();
            $table->string('elemento')->nullable();
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
        Schema::dropIfExists('personas');
    }
}
