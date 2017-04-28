<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.2/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Servicio;
use App\Models\OrdenTrabajo;
use Alert;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        //Alert::info('Info Message', 'Optional Title');
        $datos['clientesAll'] = Cliente::orderBy('id_cliente', 'DESC')->get();
        $datos['clientes'] = Cliente::limit(10)->orderBy('id_cliente', 'DESC')->get();
        $datos['productosAll'] = Producto::orderBy('id_producto', 'DESC')->get();
        $datos['productos'] = Producto::limit(5)->orderBy('id_producto', 'DESC')->get();
        $datos['servicios'] = Servicio::all();
        $datos['ordenes'] = OrdenTrabajo::orderBy('id_orden', 'DESC')->get();
        return view('home', compact('datos'));

    }
}