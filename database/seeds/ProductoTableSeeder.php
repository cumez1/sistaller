<?php

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $productos = [
            ['id_categoria' => 1, 
             'nombre' => 'Aceite de motor sintético', 
             'descripcion' => 'El aceite de motor sintético es el resultado de un proceso de ingeniería química.',
             'marca' => 'Penzoil',
             'precio' => 100.00,
             'stock' => 25,
             'activo' => 1],

            ['id_categoria' => 1, 
             'nombre' => 'Aceite de motor semi-sintético', 
             'descripcion' => 'El aceite de motor semi-sintético incorpora una mezcla de aceites base sintéticos y convencionales para ofrecer mayor resistencia a la oxidación',
             'marca' => 'Penzoil',
             'precio' => 120.00,
             'stock' => 25,
             'activo' => 1],

            ['id_categoria' => 1, 
             'nombre' => 'Aceite de motor de alto kilometraje', 
             'descripcion' => 'El aceite de motor de alto kilometraje está especialmente diseñado para vehículos más viejos o vehículos recientes con más de 120,000 kilómetros.',
             'marca' => 'Penzoil',
             'precio' => 150.00,
             'stock' => 25,
             'activo' => 1],

            ['id_categoria' => 2, 
             'nombre' => 'Candelas Categoria 1', 
             'descripcion' => 'Las bujías de encendido LPG LaserLine son bujías dobles de metal precioso especialmente desarrolladas para motores a gas.',
             'marca' => 'NGK',
             'precio' => 50.00,
             'stock' => 25,
             'activo' => 1],

            ['id_categoria' => 2, 
             'nombre' => 'Disco de freno', 
             'descripcion' => 'El freno de disco es un sistema de frenado normalmente para ruedas de vehículos, en el cual una parte móvil solidario con la rueda que gira es sometido al rozamiento',
             'marca' => 'Penzoil',
             'precio' => 60.00,
             'stock' => 25,
             'activo' => 1],

            ['id_categoria' => 2, 
             'nombre' => 'Filtro de combustible', 
             'descripcion' => 'Protegen eliminando las partículas más pequeñas.',
             'marca' => 'CAT',
             'precio' => 20.00,
             'stock' => 25,
             'activo' => 1],

             ['id_categoria' => 3, 
             'nombre' => 'Batería de celdas húmedas', 
             'descripcion' => 'Ésta es una de las baterías más comunes que existen. Es muy popular debido a que es la más económica',
             'marca' => 'MAGNUMX',
             'precio' => 500.00,
             'stock' => 5,
             'activo' => 1],

             ['id_categoria' => 3, 
             'nombre' => 'Baterías VRLA (Gel y AGM)', 
             'descripcion' => 'Las siglas significan: “Valve regulated lead acid”, Este nombre describe las válvulas de seguridad que se encuentran en la caja de la batería',
             'marca' => 'MAGNUMX',
             'precio' => 700.00,
             'stock' => 5,
             'activo' => 1],

             ['id_categoria' => 3, 
             'nombre' => 'Baterías de ciclo profundo', 
             'descripcion' => 'Las baterías de ciclo profundo proveen de energía durante un largo tiempo. Se usan habitualmente en los barcos pequeños, los carritos de golf',
             'marca' => 'MAGNUMX',
             'precio' => 600.00,
             'stock' => 5,
             'activo' => 1],

             ['id_categoria' => 4, 
             'nombre' => 'Llantas P', 
             'descripcion' => 'Indica que es una llanta para vehículos de pasajeros',
             'marca' => 'TERRA',
             'precio' => 600.00,
             'stock' => 5,
             'activo' => 1],

             ['id_categoria' => 4, 
             'nombre' => 'Llantas 205', 
             'descripcion' => 'Indica el ancho de la llanta en milímetro',
             'marca' => 'TERRA',
             'precio' => 600.00,
             'stock' => 5,
             'activo' => 1],

             ['id_categoria' => 4, 
             'nombre' => 'Llantas P205/60R15 85S', 
             'descripcion' => 'El 85S indica que es una llanta con índice de velocidad "S" con índice de carga de " 85 " (1,135 libras).',
             'marca' => 'TERRA',
             'precio' => 600.00,
             'stock' => 5,
             'activo' => 1],

             ['id_categoria' => 5, 
             'nombre' => 'Casco M', 
             'descripcion' => 'Casco para motorista tamaño Mediano.',
             'marca' => 'MASSESA',
             'precio' => 300.00,
             'stock' => 5,
             'activo' => 1],

             ['id_categoria' => 5, 
             'nombre' => 'Casco L', 
             'descripcion' => 'Casco para motorista tamaño Grande.',
             'marca' => 'MASSESA',
             'precio' => 400.00,
             'stock' => 5,
             'activo' => 1],

             ['id_categoria' => 6, 
             'nombre' => 'Traje completo M', 
             'descripcion' => 'Traje para motorista tamaño Mediano',
             'marca' => 'MASSESA',
             'precio' => 200.00,
             'stock' => 5,
             'activo' => 1],


             ['id_categoria' => 6, 
             'nombre' => 'Traje completo L', 
             'descripcion' => 'Traje para motorista tamaño Mediano.',
             'marca' => 'MASSESA',
             'precio' => 250.00,
             'stock' => 5,
             'activo' => 1]

             
        ];



        foreach($productos as $producto){
            Producto::create($producto);
        }
    }
}
