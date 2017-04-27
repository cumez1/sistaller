<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UserTableSeeder::class);
        //$this->call(ClienteTableSeeder::class);
        //$this->call(CategoriaTableSeeder::class);
        //$this->call(ProductoTableSeeder::class);
        //$this->call(TipoServicioTableSeeder::class);
        //$this->call(ServicioTableSeeder::class);
        $this->call(OrdenTrabajoTableSeeder::class);
        $this->call(OrdenTrabajoProdTableSeeder::class);
        $this->call(OrdenTrabajoServTableSeeder::class);

    }
}
