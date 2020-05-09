<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedors', function (Blueprint $table) {
            $table->integer('rut_empresa');
            $table->string('razon_social');
            $table->string('id_direccion');
            $table->string('telefono');
            $table->string('correo');
            $table->integer('codigo_postal');
            $table->string('nombre_contacto');
            $table->integer('id_rubro');      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proveedors');
    }
}
