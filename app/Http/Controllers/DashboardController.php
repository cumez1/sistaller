<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DashboardController extends Controller
{
        public function index(){

        DB::enableQueryLog();
        
        $clientes = Cliente::all();
        foreach ($clientes as $cliente) {
            $ordenes = $cliente->ordenes;
            foreach ($ordenes as $orden) {
                $det_productos = $orden->det_productos;
                $det_servicios = $orden->det_servicios;

                foreach ($det_productos as $producto) {                    
                    $productos = $producto->productos;
                    foreach ($productos as $producto) {
                        $producto->categoria;
                    }
                }
                foreach ($det_servicios as $servicio) {                    
                    $servicios = $servicio->servicios;
                    foreach ($servicios as $servicio) {
                        $servicio->tipo;
                    }
                }


            }
        }


        return view ('prueba.index', compact('clientes'));
    }
}
