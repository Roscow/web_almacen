<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->integer('codigo_producto');
            $table->string('nombre');
            $table->integer('rut_empresa');
            $table->integer('precio_compra');
            $table->integer('precio_venta');
            $table->integer('stock');
            $table->integer('stock_critico');
            $table->string('descripcion');
            $table->integer('id_tipo');
            $table->integer('id_familia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
