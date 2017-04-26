<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->increments('id_vehiculo');
            $table->integer('id_tipovehiculo')->unsigned();
            $table->string('alias');
            $table->string('chasis');
            $table->string('placa');

            $table->integer('activo');

            $table->foreign('id_tipovehiculo')
                  ->references('id_tipovehiculo')
                  ->on('tipo_vehiculos');

        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vehiculos');
    }
}
