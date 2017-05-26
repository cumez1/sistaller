<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Servicio;
use App\Models\OrdenTrabajo;
use Alert;

class DashboardController extends Controller
{
        public function index(){

            $datos['clientesAll'] = Cliente::orderBy('id_cliente', 'DESC')->get();
            $datos['clientes'] = Cliente::limit(10)->orderBy('id_cliente', 'DESC')->get();
            $datos['productosAll'] = Producto::orderBy('id_producto', 'DESC')->get();
            $datos['productos'] = Producto::limit(5)->orderBy('id_producto', 'DESC')->get();
            $datos['servicios'] = Servicio::all();
            $datos['ordenes'] = OrdenTrabajo::orderBy('id_orden', 'DESC')->get();
            return view('dashboard', compact('datos'));

        }
}
