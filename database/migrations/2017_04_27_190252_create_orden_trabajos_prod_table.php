<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenTrabajosProdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes_trabajo_prod', function (Blueprint $table) {
            $table->integer('num_detalle')->unsigned();
            $table->integer('id_orden')->unsigned();
            $table->integer('id_producto')->unsigned();
            $table->integer('cantidad')->unsigned();
            $table->decimal('precio', 12, 2);
            $table->decimal('descuento', 12, 2);            
            
            $table->primary(['num_detalle', 'id_orden']);
            
            $table->foreign('id_orden')
                  ->references('id_orden')
                  ->on('ordenes');

            $table->foreign('id_producto')
                  ->references('id_producto')
                  ->on('productos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ordenes_trabajo_prod');
    }
}
