<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenTrabajosServTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes_trabajo_serv', function (Blueprint $table) {
            $table->integer('num_detalle')->unsigned();
            $table->integer('id_orden')->unsigned();
            $table->integer('id_servicio')->unsigned();
            $table->integer('cantidad')->unsigned();
            $table->decimal('precio', 12, 2);
            $table->decimal('descuento', 12, 2);            
            
            $table->primary(['num_detalle', 'id_orden']);
            
            $table->foreign('id_orden')
                  ->references('id_orden')
                  ->on('ordenes');

            $table->foreign('id_servicio')
                  ->references('id_servicio')
                  ->on('servicios');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ordenes_trabajo_serv');
    }
}
