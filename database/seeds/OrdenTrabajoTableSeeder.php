<?php

use Illuminate\Database\Seeder;
use App\Models\OrdenTrabajo;

class OrdenTrabajoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        $ordenes = [
            ['id_cliente' => 1, 
             'cliente_contacto' => '12345678',
             'fecha_registro' => '2017-01-01',
             'fecha_entrega' => '2017-01-10',
             'tipo_vehiculo' => 'Motocicleta',
             'vehiculo' => 'Motocicleta Pulsar 220',
             'modelo' => 'Pulsar 220',
             'placa' => 'MCR325',
             'usuario_registra' => 'Nicolas Cumez',
             'usuario_responsable' => 'Nicolas Cumez',
             'observaciones' => 'Servicio Completo, revisar aguja de la gasolina',
             'estado' => 0
            ],
            ['id_cliente' => 2, 
             'cliente_contacto' => '54675634',
             'fecha_registro' => '2017-01-01',
             'fecha_entrega' => '2017-01-11',
             'tipo_vehiculo' => 'Motocicleta',
             'vehiculo' => 'Motocicleta Pulsar 200',
             'modelo' => 'Pulsar 200',
             'placa' => 'MCR335',
             'usuario_registra' => 'Nicolas Cumez',
             'usuario_responsable' => 'Nicolas Cumez',
             'observaciones' => 'Cambio de aceite',
             'estado' => 0
            ],
            ['id_cliente' => 3, 
             'cliente_contacto' => '22445534',
             'fecha_registro' => '2017-01-01',
             'fecha_entrega' => '2017-01-12',
             'tipo_vehiculo' => 'vehiculo',
             'vehiculo' => 'KIA Rojo',
             'modelo' => 'KIA',
             'placa' => '112KSM',
             'usuario_registra' => 'Nicolas Cumez',
             'usuario_responsable' => 'Nicolas Cumez',
             'observaciones' => 'Servicio Completo',
             'estado' => 0
            ],
            ['id_cliente' => 4, 
             'cliente_contacto' => '22445534',
             'fecha_registro' => '2017-01-01',
             'fecha_entrega' => '2017-01-01',
             'tipo_vehiculo' => 'No Aplica',
             'vehiculo' => 'No Aplica',
             'modelo' => 'No Aplica',
             'placa' => 'No Aplica',
             'usuario_registra' => 'Nicolas Cumez',
             'usuario_responsable' => 'Nicolas Cumez',
             'observaciones' => 'Compras varias',
             'estado' => 0
            ]
            
        ];


        foreach($ordenes as $orden){
            OrdenTrabajo::create($orden);
        }

    }



}
