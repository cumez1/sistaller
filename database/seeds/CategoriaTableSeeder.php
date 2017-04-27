<?php

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
            ['nombre' => 'Aceites', 'descripcion' => 'Todos los productos de aceites'],
            ['nombre' => 'Repuestos', 'descripcion' => 'Candelas, discos de frenos, cadenas'],
            ['nombre' => 'Baterias', 'descripcion' => 'Toda marca de baterias'],
            ['nombre' => 'Llantas', 'descripcion' => 'Llantas de distinatos rieles'],
            ['nombre' => 'Cascos', 'descripcion' => 'Cascos de distinatas medidas'],
            ['nombre' => 'Equipos', 'descripcion' => 'Trajes de motoristas, guantes']
        ];


        foreach($categorias as $categoria){
            Categoria::create($categoria);
        }
    }
}
