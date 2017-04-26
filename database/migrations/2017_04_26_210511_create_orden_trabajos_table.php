<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenTrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes', function (Blueprint $table) {
            $table->increments('id_orden');
            $table->integer('id_cliente')->unsigned();
            $table->dateTime('fecha_registro');
            $table->dateTime('fecha_entrega');
            $table->string('usuario');
            $table->string('responsable');
            $table->string('contacto');
            $table->longText('observaciones');
            $table->foreign('id_cliente')
                  ->references('id_cliente')
                  ->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ordenes');
    }
}
