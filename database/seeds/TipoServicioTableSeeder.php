<?php

use Illuminate\Database\Seeder;
use App\Models\TipoServicio;

class TipoServicioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipoServicio = [
            ['nombre' => 'Mantenimineto Motocicletas', 'descripcion' => 'Mantenimineto Motocicletas'],
            ['nombre' => 'Mantenimineto Tuc Tuc', 'descripcion' => 'Mantenimineto Tuc Tuc'],
            ['nombre' => 'Mantenimineto Vehículos', 'descripcion' => 'Mantenimineto Vehículos']
        ];

        foreach($tipoServicio as $tipo){
            TipoServicio::create($tipo);
        }
    }
}
