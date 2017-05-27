<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Models\Producto;
use App\Models\Servicio;
use App\Models\Cliente;
use App\Models\OrdenTrabajo;
use App\Models\OrdenTrabajoProd;
use App\Models\OrdenTrabajoServ;
use Carbon\Carbon;
use Session;
use DB;

class OrdenTrabajoController extends Controller
{
    public function __construct()
    {
        if(!Session::has('carrito')){
            
            Session::put('carrito', array(
                          'nit' => '',
                          'productos' => array(),
                          'servicios' => array())
            );
        }   
            
    }

    public function index()
    {
        return view('ordenes.index');
    }

    public function create()
    {
        return view('ordenes.crear');
    }

    public function show($id)
    {
        

        $orden = DB::table('ordenes')->where('id_orden','=',$id)->first();


        $sql = 'SELECT c.*,o.id_orden FROM ordenes as o 
                INNER JOIN clientes as c ON o.id_cliente = c.id_cliente
                WHERE o.id_orden= '.$id;
        $cliente = DB::select($sql);
        $cliente = $cliente[0];

        $sql = 'SELECT  op.id_producto,
                        nombre,
                        op.precio,
                        cantidad,
                        0 as subtotal FROM ordenes as o 
                INNER JOIN ordenes_trabajo_prod as op ON  o.id_orden = op.id_orden
                INNER JOIN productos as p ON op.id_producto = p.id_producto
                WHERE o.id_orden= '.$id;

        $productos = DB::select($sql);


        $sql = 'SELECT  os.id_servicio,
                        nombre,
                        os.precio,
                        cantidad,
                        0 as subtotal FROM ordenes as o 
                LEFT JOIN ordenes_trabajo_serv os ON o.id_orden = os.id_orden
                LEFT JOIN servicios s ON os.id_servicio = s.id_servicio
                WHERE o.id_orden= '.$id;
        
        $servicios = DB::select($sql);

        $total = 0;

        foreach ($productos as $key => $value) {
            
            $subtotal = ($productos[$key]->cantidad * $productos[$key]->precio);
            $productos[$key]->subtotal = $subtotal;
            $total += $subtotal;
           
        }
        foreach ($servicios as $key => $value) {
            
            $subtotal = ($servicios[$key]->cantidad * $servicios[$key]->precio);
            $servicios[$key]->subtotal = $subtotal;
            $total += $subtotal;
           
        }
        
        $now = Carbon::now()->format('d/m/Y H:i:s');
       
        return view('ordenes.mostrar', compact('orden','cliente','productos','total','servicios','now'));
    }


    public function recuperarCliente()
    {
        $carrito = Session::get('carrito');
        $id = $carrito['nit'];
        $cliente = null;

        if($id !=""){
            $cliente = Cliente::findOrFail($id); 
        }
        
        return $cliente;
    }

    public function recuperarRegistros()
    {
        
        
        $carrito = Session::get('carrito');
        $productos = $carrito['productos'];
        $servicios = $carrito['servicios'];

        $resp = '<table class="table" id="detalle">
                        <tbody><tr>
                            <th>CODIGO</th>
                            <th class="text-center">CANT.</th>
                            <th>DESCRIPCION</th>
                            <th class="text-right">PRECIO UNIT.</th>
                            <th class="text-right">SUB TOTAL</th>
                            <th></th>
                        </tr>';

        $total = 0;
        foreach($productos as $producto){
            $total += ($producto->precio * $producto->cantidad);
            $resp .='<tr>
                        <td>PROD '.$producto->id_producto.'</td>
                        <td>'.$producto->cantidad.'</td>
                        <td>'.$producto->nombre.'</td>
                        <td><span class="pull-right">'.number_format($producto->precio,2).'</span></td>
                        <td><span class="pull-right">'.number_format(($producto->precio * $producto->cantidad),2).'</span></td>
                        <td class="text-right">
                            <a href="#editModalItem" data-toggle="modal" 
                              data-codigo="'.$producto->id_producto.'" 
                              data-cantidad="'.$producto->cantidad.'" 
                              data-descripcion="'.$producto->nombre.'" 
                              data-precio="'.number_format($producto->precio,2).'" 
                              data-id="'.$producto->id_producto.'">
                              <i class="fa fa-edit"></i></a> 
                            <a href="" onclick="eliminar(event, '.$producto->id_producto.')">
                            <i class="glyphicon glyphicon-trash"></i></a>
                        </td>
                    </tr>' ; 

        }

        foreach($servicios as $servicio){
            $total += ($servicio->precio * 1);
            $resp .='<tr>
                        <td>SERV '.$servicio->id_servicio.'</td>
                        <td>1</td>
                        <td>'.$servicio->nombre.'</td>
                        <td><span class="pull-right">'.number_format($servicio->precio,2).'</span></td>
                        <td><span class="pull-right">'.number_format(($servicio->precio * 1),2).'</span></td>
                        <td class="text-right">
                            <a href="#editModalItem" data-toggle="modal" 
                              data-codigo="'.$servicio->id_servicio.'" 
                              data-cantidad="'.$servicio->cantidad.'" 
                              data-descripcion="'.$servicio->nombre.'" 
                              data-precio="'.number_format($servicio->precio,2).'" 
                              data-id="'.$servicio->id_servicio.'">
                              <i class="fa fa-edit"></i></a> 
                            <a href="" onclick="eliminar(event, '.$servicio->id_servicio.')">
                            <i class="glyphicon glyphicon-trash"></i></a>
                        </td>
                    </tr>' ; 

        }

        

        $resp .= '<tr>
            <td colspan="4"><span class="pull-right">PARCIAL Q</span></td>
            <td><span class="pull-right">'.number_format($total,2).'</span></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="4"><span class="pull-right">DESCUENTO Q</span></td>
            <td><span class="pull-right">0.00</span></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="4"><span class="pull-right">NETO Q</span></td>
            <td><span class="pull-right">'.number_format($total,2).'</span></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="4"><span class="pull-right">IVA 12% Q</span></td>
            <td><span class="pull-right">'.number_format(($total * 0),2).'</span></td>
                                    <td></td>
        </tr>
        <tr>
            <td colspan="4"><span class="pull-right">TOTAL Q</span></td>
            <td><span class="pull-right">'.number_format(($total + ($total*0)),2).'</span></td>
            <td></td>
        </tr>
        </tbody>
        </table>';
        $tabla['response'] = $resp; 


        return $tabla; 
    }

    public function agregar(Request $request)
    {
        
        $producto = Producto::findOrFail($request->id_producto);

        //dd($producto);
        $carrito = Session::get('carrito');
        
        $cantidad = 1;
        $resultado = count($carrito['productos']);

        if($resultado > 0){
            foreach ($carrito['productos'] as $item) {
                if($item->id_producto === $producto->id_producto){
                    $producto->cantidad = $item->cantidad + 1 ;
                    $carrito['productos'][$producto->id_producto] = $producto;
                    break;

                }else{
                    $producto->cantidad = $cantidad;
                    $carrito['productos'][$producto->id_producto] = $producto;
                }
            }  
        }else{
            $producto->cantidad = $cantidad;
            $carrito['productos'][$producto->id_producto] = $producto;
        }


        Session::put('carrito', $carrito);

        $productos = $carrito['productos'];

        $tabla = $this->recuperarRegistros();

        return $tabla;
    }

    public function agregarserv(Request $request)
    {
        
        $servicio = Servicio::findOrFail($request->id_servicio);

        //dd($producto);
        $carrito = Session::get('carrito');
        
        $cantidad = 1;
        $resultado = count($carrito['servicios']);

        if($resultado > 0){
            foreach ($carrito['servicios'] as $item) {
                if($item->id_producto === $servicio->id_servicio){
                    $servicio->cantidad = $item->cantidad + 1 ;
                    $carrito['servicios'][$servicio->id_servicio] = $servicio;
                    break;

                }else{
                    $servicio->cantidad = $cantidad;
                    $carrito['servicios'][$servicio->id_servicio] = $servicio;
                }
            }  
        }else{
            $servicio->cantidad = $cantidad;
            $carrito['servicios'][$servicio->id_servicio] = $servicio;
        }


        Session::put('carrito', $carrito);

        $servicios = $carrito['servicios'];

        $tabla = $this->recuperarRegistros();

        return $tabla;
    }

    public function quitar(Request $request)
    {
        
        
        $carrito = Session::get('carrito');
        $productos = $carrito['productos'];

        unset($productos[$request->id_producto]);

        $carrito['productos'] = $productos;
        Session::put('carrito', $carrito);

        $tabla = $this->recuperarRegistros();

        return $tabla; 
    }

    public function guardar(Request $request){

        $carrito = Session::get('carrito');

        $orden = new OrdenTrabajo();
        $date = Carbon::now();
       // $date = $date->format('Y-m-d');

        $item_total = count($carrito['productos']);

        if($carrito['nit'] == ''){
            session()->flash('vacioc', 'Por favor seleccione un cliente');
            $ajaxData['status']= 422;        

            return $ajaxData;
        }

        if($item_total < 1){
            session()->flash('vaciop', 'Por favor ingrese un producto para completar la compra');
            $ajaxData['status']= 422;        

            return $ajaxData;
        }


        try {
            DB::beginTransaction();

            $orden->id_cliente = $carrito['nit'];        
            $orden->fecha_registro = Carbon::now();
            $orden->fecha_entrega = $request->fecha_entrega;

            $orden->cliente_contacto = $request->telefono;
            $orden->tipo_vehiculo = $request->tipovehiculo;
            $orden->vehiculo = $request->vehiculo;
            $orden->modelo = $request->placas;
            $orden->observaciones = $request->observaciones;
            $orden->usuario_responsable = $request->responsable;

            $user = Auth::user();
            $orden->usuario_registra = $user->name;
            $orden->estado = 0;
            $orden->save();





            $num_orden = $orden->id_orden;
            $linea = 0;

            foreach ($carrito['productos'] as $item) {
                $linea++;
                $detalle = new OrdenTrabajoProd();

                $detalle->num_detalle = $linea;
                $detalle->id_orden = $num_orden;
                $detalle->id_producto = $item->id_producto;
                $detalle->cantidad = $item->cantidad;
                $detalle->precio = $item->precio;
                $detalle->save();

            }

            $linea = 0;
            foreach ($carrito['servicios'] as $item) {
                $linea++;
                $detalle = new OrdenTrabajoServ();

                $detalle->num_detalle = $linea;
                $detalle->id_orden = $num_orden;
                $detalle->id_servicio = $item->id_servicio;
                $detalle->cantidad = $item->cantidad;
                $detalle->precio = $item->precio;
                $detalle->save();

            }


            DB::commit();
           

        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }


        session()->flash('exitoso', 'Se ha registrado con exito el orden de trabajo No. '.$num_orden);

        $this->vaciar();
        $ajaxData['status']= 200;        

        return $ajaxData;
    }

    public function vaciar()
    {
       Session::put('carrito', array('nit' => '','productos' => array(),'servicios' => array()));
       return view('ordenes.index');
    }

    public function getAll($columna, $criterio, $orden){
        $busqueda = explode(" ", trim($criterio));

        if(count($busqueda)< 2){
            $busqueda[1] = $busqueda[0];
        }

        $res = DB::table('ordenes as o')
                ->join('clientes as c', 'o.id_cliente', '=', 'c.id_cliente')
                ->leftJoin('ordenes_trabajo_prod as dp', 'o.id_orden', '=', 'dp.id_orden')
                ->leftJoin('productos as p', 'dp.id_producto', '=', 'p.id_producto')
                ->leftJoin('ordenes_trabajo_serv as ds', 'o.id_orden', '=', 'ds.id_orden')
                ->leftJoin('servicios as s', 'ds.id_servicio', '=', 'ds.id_servicio')
                
                ->select(DB::raw('o.id_orden,
                         o.fecha_registro,
                         c.nit, 
                         c.nombre, 
                         c.apellido, 
                         sum(dp.precio*dp.cantidad) as total,
                         ds.precio as totalservicio'))
                ->where('c.nombre', 'like', '%'.$busqueda[0].'%')
                ->orWhere('c.apellido', 'like', '%'.$busqueda[1].'%')
                ->groupBy('o.id_orden',
                         'o.fecha_registro',
                         'c.nit',
                         'c.nombre',
                         'c.apellido')
                ->orderBy($columna, $orden)
                ->get();

        //dd($res);
        return $res;
    }

    public function getFacturas($columna, $criterio, $orden, $offset,$limit){
        $busqueda = explode(" ", trim($criterio));

        if(count($busqueda)< 2){
            $busqueda[1] = $busqueda[0];
        }

        return DB::table('ordenes as o')
                ->join('clientes as c', 'o.id_cliente', '=', 'c.id_cliente')
                ->leftJoin('ordenes_trabajo_prod as dp', 'o.id_orden', '=', 'dp.id_orden')
                ->leftJoin('productos as p', 'dp.id_producto', '=', 'p.id_producto')
                ->leftJoin('ordenes_trabajo_serv as ds', 'o.id_orden', '=', 'ds.id_orden')
                ->leftJoin('servicios as s', 'ds.id_servicio', '=', 's.id_servicio')
                ->select(DB::raw('o.id_orden,
                         o.fecha_registro,
                         c.nit, 
                         c.nombre, 
                         c.apellido, 
                         sum(dp.precio*dp.cantidad) as total,
                         ds.precio as totalservicio'))
                ->where('c.nombre', 'like', '%'.$busqueda[0].'%')
                ->orWhere('c.apellido', 'like', '%'.$busqueda[1].'%')
                ->groupBy('o.id_orden',
                         'o.fecha_registro',
                         'c.nit',
                         'c.nombre',
                         'c.apellido')
                ->orderBy($columna, $orden)
                ->skip($offset)
                ->take($limit)
                ->get();


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
            $limit = config('constantes.datatableListRows');
        }

        //offeset
        if (!$offset){
            $offset = 0;
        }

        $columns = array(
                'id_orden',
                'fecha',
                'nit',
                'nombre',
                'total',
                'totalservicio',
                'acciones'
        );

        
        //Busqueda  
        if (isset($request->criterio) && $request->criterio != '') {        
            $ordenes = $this->getAll('id_orden',$request->criterio, 'DESC');
        }else{
            $ordenes = $this->getAll('id_orden','', 'DESC');
        }

        $total = count($ordenes);

        //ordenamiento
        if ($order){
            if (is_array($order) && array_key_exists($order[0]['column'], $columns)) {   
                $columna = $columns[$order[0]['column']];
                $orden = $order[0]['dir'];
                $ordenes = $this->getFacturas($columna,$request->criterio, $orden,$offset, $limit);
            }

        } else {
            $ordenes = $this->getAll('nombre',$request->criterio, 'DESC');
        }


        

        if(count($ordenes) > 0){
            $fila = 1;
            if($offset != 0)
                $fila = $offset+1;
            foreach ($ordenes as $orden) {
                
                $acciones  = '<a href="ordenes/edit/'.$orden->id_orden.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i></a>';

                $acciones .= '<a href="ordenes/show/'.$orden->id_orden.'" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-eye-open"></i></a>';

                $results[] = array(
                   $orden->id_orden,
                   $orden->fecha_registro,
                   $orden->nit,
                   $orden->nombre.' '.$orden->apellido,
                   number_format(($orden->total+($orden->total*0)),2),  
                   number_format(($orden->totalservicio+($orden->totalservicio*0)),2),                  
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

}
