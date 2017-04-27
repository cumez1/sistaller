<?php

use Illuminate\Database\Seeder;
use App\Models\OrdenTrabajoServ;

class OrdenTrabajoServTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ordenesServicios = [
            ['num_detalle' => 1, 
             'id_orden' => 1,
             'id_servicio' => 1,
             'cantidad' => 1,
             'precio' => 200.00,
             'descuento' => 0.00
            ],

            ['num_detalle' => 1, 
             'id_orden' => 2,
             'id_servicio' => 2,
             'cantidad' => 1,
             'precio' => 30.00,
             'descuento' => 0.00
            ],
            
        ];

        foreach($ordenesServicios as $servicio){
            OrdenTrabajo::create($servicio);
        }
    }
}
