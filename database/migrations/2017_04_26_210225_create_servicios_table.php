<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->increments('id_servicio');
            $table->integer('id_tiposervicio')->unsigned();
            $table->string('nombre');
            $table->string('descripcion');
            $table->decimal('costo', 12, 2);
            $table->decimal('precio', 12, 2);
            $table->integer('activo');

            $table->foreign('id_tiposervicio')
                  ->references('id_tiposervicio')
                  ->on('tipo_servicios');

        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('servicios');
    }
}
