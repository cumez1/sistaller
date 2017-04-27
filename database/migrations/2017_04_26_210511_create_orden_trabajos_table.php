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
            $table->string('cliente_contacto');

            $table->dateTime('fecha_registro');
            $table->dateTime('fecha_entrega');
            $table->string('tipo_vehiculo');
            $table->string('vehiculo');
            $table->string('modelo');
            $table->string('placa');

            $table->string('usuario_registra');
            $table->string('usuario_responsable');
           
            $table->longText('observaciones');
            $table->integer('estado');
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
