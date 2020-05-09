<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFiadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiados', function (Blueprint $table) {
            $table->integer('id_fiado');
            $table->timestamp('fecha_fiado');
            $table->integer('rut_cliente');
            $table->integer('id_venta');
            $table->integer('total_fiado');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fiados');
    }
}
