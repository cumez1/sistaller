<?php

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Cliente::class, 20)->create();

        $clientes = [
            [
            'nit' => 12345,
            'nombre' => 'Nicolas',            
            'apellido' => 'Cumez',
            'direccion' => '32 calle, zona 3 Guatemala GT',
            'fecha_nac' => '1991-07-1',
            'telefono' => '30024995',        
            'activo' => 1  
            ]
        ];


        foreach($clientes as $cliente){
            Cliente::create($cliente);
        }
    }
}
