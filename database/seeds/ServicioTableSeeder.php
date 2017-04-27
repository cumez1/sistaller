<?php

use Illuminate\Database\Seeder;
use App\Models\Servicio;

class ServicioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $servicios = [
            ['id_tiposervicio' => 1, 
             'nombre' => 'Servicio Completo', 
             'descripcion' => 'Cambio de aceite, limpieza en carburador engrasado de cadenas',
             'precio' => 200.00,
             'activo' => 1],

            ['id_tiposervicio' => 1, 
             'nombre' => 'Cambio de Aceite', 
             'descripcion' => 'Mano de obra en cambio de aceite',
             'precio' => 30.00,
             'activo' => 1],

            ['id_tiposervicio' => 1, 
             'nombre' => 'Servicios Varios', 
             'descripcion' => 'Servicios especiales',
             'precio' => 25.00,
             'activo' => 1],

            ['id_tiposervicio' => 2, 
             'nombre' => 'Servicio Completo', 
             'descripcion' => 'Cambio de aceite, limpieza en carburador engrasado de cadenas',
             'precio' => 230.00,
             'activo' => 1],

            ['id_tiposervicio' => 2, 
             'nombre' => 'Cambio de Aceite', 
             'descripcion' => 'Mano de obra en cambio de aceite',
             'precio' => 40.00,
             'activo' => 1],

            ['id_tiposervicio' => 2, 
             'nombre' => 'Servicios Varios', 
             'descripcion' => 'Servicios especiales',
             'precio' => 55.00,
             'activo' => 1],

            ['id_tiposervicio' => 3, 
             'nombre' => 'Servicio Completo', 
             'descripcion' => 'Cambio de aceite, limpieza en carburador engrasado de cadenas',
             'precio' => 330.00,
             'activo' => 1],

            ['id_tiposervicio' => 3, 
             'nombre' => 'Cambio de Aceite', 
             'descripcion' => 'Mano de obra en cambio de aceite',
             'precio' => 60.00,
             'activo' => 1],

            ['id_tiposervicio' => 3, 
             'nombre' => 'Servicios Varios', 
             'descripcion' => 'Servicios especiales',
             'precio' => 50.00,
             'activo' => 1]

             
        ];



        foreach($servicios as $servicio){
            Servicio::create($servicio);
        }
    }
   
}
