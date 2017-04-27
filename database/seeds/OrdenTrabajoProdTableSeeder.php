<?php

use Illuminate\Database\Seeder;
use App\Models\OrdenTrabajoProd;

class OrdenTrabajoProdTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ordenesProducto = [
            ['num_detalle' => 1, 
             'id_orden' => 1,
             'id_producto' => 1,
             'cantidad' => 1,
             'precio' => 100.00,
             'descuento' => 0.00
            ],
            ['num_detalle' => 2, 
             'id_orden' => 1,
             'id_producto' => 6,
             'cantidad' => 1,
             'precio' => 20.00,
             'descuento' => 0.00
            ],

            ['num_detalle' => 1, 
             'id_orden' => 2,
             'id_producto' => 2,
             'cantidad' => 1,
             'precio' => 120.00,
             'descuento' => 0.00
            ],

            ['num_detalle' => 1, 
             'id_orden' => 3,
             'id_producto' => 12,
             'cantidad' => 1,
             'precio' => 300.00,
             'descuento' => 0.00
            ],

            ['num_detalle' => 2, 
             'id_orden' => 3,
             'id_producto' => 14,
             'cantidad' => 1,
             'precio' => 200.00,
             'descuento' => 0.00
            ]
            
        ];

        foreach($ordenesProducto as $producto){
            OrdenTrabajoProd::create($producto);
        }
    }
}
