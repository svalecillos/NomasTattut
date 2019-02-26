<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDireccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_estado');
            $table->unsignedInteger('id_ciudad');
            $table->unsignedInteger('id_municipio');
            $table->unsignedInteger('id_parroquia');
            $table->string('edificio_casa', 100);
            $table->string('piso', 10);
            $table->string('apartamento', 10);
            $table->timestamps();

            $table->foreign('id_estado')
                  ->references('id')
                  ->on('estados')
                  ->onDelete('cascade');

            $table->foreign('id_ciudad')
                  ->references('id')
                  ->on('ciudads')
                  ->onDelete('cascade');

            $table->foreign('id_municipio')
                  ->references('id')
                  ->on('municipios')
                  ->onDelete('cascade');

            $table->foreign('id_parroquia')
                  ->references('id')
                  ->on('parroquias')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direccions');
    }
}
