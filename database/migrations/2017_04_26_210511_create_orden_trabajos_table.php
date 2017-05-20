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

            $table->date('fecha_registro');
            $table->date('fecha_entrega');
            $table->string('tipo_vehiculo')->nullable();
            $table->string('vehiculo')->nullable();
            $table->string('modelo')->nullable();
            $table->string('placa')->nullable();

            $table->string('usuario_registra');
            $table->string('usuario_responsable')->nullable();
           
            $table->longText('observaciones')->nullable();
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
