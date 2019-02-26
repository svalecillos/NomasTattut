<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 25);
            $table->string('apellido', 25);
            $table->string('email',50)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('usuario',10)->unique();
            $table->string('password',10);
            $table->unsignedInteger('id_cargo');
            $table->rememberToken(); //Es el token que permitira mantener activa la seccion de un usuario.
            $table->timestamps();

            $table->foreign('id_cargo')
                  ->references('id')
                  ->on('cargos_users')
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
        Schema::dropIfExists('users');
    }
}
