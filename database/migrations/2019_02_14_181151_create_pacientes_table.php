<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            //Datos basicos del paciente
            $table->string('primer_nombre', 30);
            $table->string('segundo_nombre', 30)->nullable();
            $table->string('primer_apellido', 30);
            $table->string('segundo_apellido', 30)->nullable();
            $table->date('fecha_nacimiento');
            $table->char('nacionalidad',2);
            $table->string('cedula', 10)->unique();
            $table->string('edad', 3);
            $table->char('sexo',10);
            $table->string('telefono_local', 15)->nullable();
            $table->string('telefono_movil', 15);
            $table->string('email', 50);
            //Datos laborales
            $table->string('empresa', 150)->nullable();
            $table->string('cargo', 100)->nullable();
            $table->string('telefono_laboral', 15)->nullable();
            $table->string('nombre_jefe', 15)->nullable();
            $table->text('direccion_laboral')->nullable();
             //Datos Tatuaje
            $table->unsignedInteger('id_tipo_tatuaje');
            $table->unsignedInteger('id_autor_tatuaje');
            $table->unsignedInteger('id_tipo_piel');
            $table->string('tiempo_tatuado', 50);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_tipo_tatuaje')
                  ->references('id')
                  ->on('tipo_tatuajes')
                  ->onDelete('cascade');

            $table->foreign('id_autor_tatuaje')
                  ->references('id')
                  ->on('autor_tatuajes')
                  ->onDelete('cascade');

            $table->foreign('id_tipo_piel')
                  ->references('id')
                  ->on('tipo_piels')
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
        Schema::dropIfExists('pacientes');
    }
}
