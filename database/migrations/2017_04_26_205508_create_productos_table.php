<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id_producto');
            //$table->string('codigo')->unique();
            $table->integer('id_categoria')->unsigned();
            $table->string('nombre');
            $table->decimal('precio', 12, 2);
            $table->integer('stock');
            $table->integer('activo');

            $table->foreign('id_categoria')
                  ->references('id_categoria')
                  ->on('categorias');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('productos');
    }
}
