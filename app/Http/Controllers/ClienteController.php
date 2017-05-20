<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Cliente;
use Yajra\Datatables\Facades\Datatables;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('cliente.index');
    }

    public function listado(){
        return Datatables::eloquent(Cliente::query())->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http $cliente = Cliente::findOrFail($id); \Response
     */
    public function create()
    {
        return view('cliente.create');
    }

    public function buscar(Request $request){

        $cliente = Cliente::where('nit', '=', $request->nit)->firstOrFail();        
        
        $carrito = \Session::get('carrito');

        $carrito['nit'] = $cliente->id_cliente;
        \Session::put('carrito', $carrito);
        
        return $cliente;
    }

    public function recuperar(Request $request){


         $cliente = Cliente::where('nit','=',$request->nit)->first(); 

         return $cliente;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
