<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->integer('id_user');
            $table->string('nombre1');
            $table->string('nombre2');
            $table->string('apellido1');
            $table->string('apellido2');
            $table->string('usser');
            $table->string('contraseña');
            $table->integer('rut');
            $table->string('dv');
            $table->string('correo');
            $table->integer('telefono');
            $table->integer('id_tipo_user');
            $table->timestamp('fecha_nacimiento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
