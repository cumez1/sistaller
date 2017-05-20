<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Servicio;
use Yajra\Datatables\Facades\Datatables;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('servicio.index');
    }

    public function listado(){
        return Datatables::eloquent(Servicio::query())->make(true);
    }
    public function listadoAjax(Request $request)
    {   
       //DataTable contador de renderizacion
        $dataTablesResponse['draw'] = intval($request->draw);

        //obtengo datos de paginacion
        $limit = ($request->length != '') ? $request->length : false;
        $offset = $request->start;
        $order = $request->order;

        //limit
        if (!$limit) {
            $limit = 20;
        }

        //offeset
        if (!$offset){
            $offset = 0;
        }

        $columns = array(
                'id_servicio',
                'nombre',
                'descripcion',
                'precio',
                'acciones'
            );
  

        $modelo = new Servicio();
        
        //filtros  
        if (isset($request->criterio) && $request->criterio != '') {            
            $modelo = $modelo->where('nombre','like','%'.$request->criterio.'%');
        } 
        
        $total = $modelo->count();

         //ordenamiento
        if ($order){
            if (is_array($order) && array_key_exists($order[0]['column'], $columns)) {
                $modelo = $modelo->orderBy($columns[$order[0]['column']],$order[0]['dir']);
            }
            $modelo =  $modelo->skip($offset)->take($limit);

        } else {
            $modelo = $modelo->orderBy('nombre','DESC');
        }
        
        $modelo = $modelo->get();

       

        if(count($modelo) != 0){
            $fila = 1;
            if($offset != 0)
                $fila = $offset+1;
            foreach ($modelo as $item) {

                $acciones = '<span class="pull-right"> 
                            <a href=""  onclick="agregarServ(event, '.$item->id_servicio.')"> 
                            <i class="glyphicon glyphicon-shopping-cart" 
                            style="font-size:24px;color: #5CB85C;">
                            </i>
                            </a></span>';
                
                
                $results[] = array(
                   $item->id_servicio,
                   $item->nombre,
                   $item->descripcion,
                   $item->precio,                
                   $acciones
                );
                


               $fila++;
            }
        }else{
            $results = array();
        }

        $dataTablesResponse['recordsTotal'] = $total;
        $dataTablesResponse['recordsFiltered'] = $total;
        $dataTablesResponse['data'] = $results;
        echo json_encode($dataTablesResponse);
        exit();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
