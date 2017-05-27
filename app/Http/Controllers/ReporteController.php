<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class ReporteController extends Controller
{

    public function vRptGanancias(){

        return view('reportes.ganancias');
    }

    public function vRptOrdenes(){
        return view('reportes.ordenes');
    }

    public function vRptClientes(){
        return view('reportes.cliente');
    }

    public function vRptProductos(){
        return view('reportes.productos');
    }



    public function rptGanancias(Request $request){

        $fecha_ini = $request->fecha_ini;
        $fecha_fin = $request->fecha_fin;
        $cliente = $request->nit_cliente;

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
                         sum(p.costo*dp.cantidad) as costo,
                         sum(s.costo) as costoServicio,
                         sum(dp.precio*dp.cantidad) as total,
                         ds.precio as totalservicio'))
                ->whereRaw('o.fecha_registro BETWEEN \''.$fecha_ini.'\' AND \''.$fecha_fin.'\' AND c.nit like \'%'.$cliente.'%\'')
                ->groupBy('o.id_orden',
                         'o.fecha_registro',
                         'c.nit',
                         'c.nombre',
                         'c.apellido')
                ->orderBy('o.id_orden', 'ASC')
                ->get();

        if ($res) {
            if($cliente==''){
                $client['nombre'] = 'Varios';
                $client['apellido'] = 'Varios';
                $client['nit'] = 'Varios';
            }else{
                $client['nombre'] = $res[0]->nombre;
                $client['apellido'] = $res[0]->apellido;
                $client['nit'] = $res[0]->nit;
            }

            return view('reportes.response.ganancia',compact('res','client'));
            

        }
        //->whereRaw('o.fecha_registro BETWEEN '.$fecha_ini.' AND '.$fecha_fin.' AND c.nit like \'%'.$cliente.'%\'')
        return "<center>no se encontraron datos</center>";
    }
}
