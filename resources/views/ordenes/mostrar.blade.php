@extends('layouts.app')

@section('htmlheader_title','Producto')


@section('main-content')
<style >
    .invoice-title h2, .invoice-title h3 {
        display: inline-block;
    }

    .table > tbody > tr > .no-line {
        border-top: none;
    }

    .table > thead > tr > .no-line {
        border-bottom: none;
    }

    .table > tbody > tr > .thick-line {
        border-top: 2px solid;
    }
</style> 

	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Productos
        <small>SistemasGT</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Productos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
        <div class="col-xs-12">
            <div class="invoice-title">
                <h2>SISTEMAS GT</h2><h3 class="pull-right">ORDEN # {{$orden->id_orden}}</h3>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                    <strong>Orden de Trabjao:</strong><br>
                        NIT:{{$cliente->nit}}<br>
                        {{$cliente->nombre}} {{$cliente->apellido}}<br>
                        {{$cliente->direccion}}
                        {{$cliente->telefono}}
                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                    <strong>Enviado a:</strong><br>
                        {{$cliente->nombre}} {{$cliente->apellido}}<br>
                        {{$cliente->direccion}}
                        {{$cliente->telefono}}
                    </address>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-6">
                    <address>
                    <strong>Detalles del Vehículo:</strong><br>
                        Cliente contacto:<strong> <strong>{{$cliente->nombre}} {{$cliente->apellido}}</strong><br>
                        Tipo de vehículo:<strong> {{$orden->tipo_vehiculo}}</strong><br>
                        Modelo:<strong> {{$orden->vehiculo}}</strong><br>
                        Placa:<strong> {{$orden->modelo}}</strong><br>
                        Observaciones:<strong> {{$orden->observaciones}}</strong><br>

                    </address>
                </div>
                <div class="col-xs-6">
                    <address>
                        Mecanico responsable:<strong> {{$orden->usuario_responsable}}</strong><br>
                        <br>
                        <strong>Fecha Entrega:</strong> <h2>{{$orden->fecha_entrega}}</h2><br>

                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                        <strong>Método de Pago:</strong><br>
                        EFECTIVO<br>
                        Quetzales
                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                        <strong>Fecha orden de trabajo:</strong><br>
                       {{$orden->fecha_registro}}<br><br>
                    </address>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Detalle de la orden</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Codigo</strong></td>
                                    <td class="text-center"><strong>Descripcion</strong></td>
                                    <td class="text-center"><strong>Precio</strong></td>
                                    <td class="text-center"><strong>Cantidad</strong></td>
                                    <td class="text-right"><strong>Subtotal</strong></td>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($productos as $item)
                                    @if($item->id_producto !=null)
                                        <tr>
                                            <td>{{$item->id_producto}}</td>
                                            <td class="text-left">{{$item->nombre}}</td>
                                            <td class="text-right">{{$item->precio}}</td>
                                            <td class="text-center">{{$item->cantidad}}</td>
                                            <td class="text-right">{{number_format(($item->subtotal ),2) }}</td>
                                        </tr>
                                    @endif
                                @endforeach

                                @foreach($servicios as $item)
                                    @if($item->id_servicio!=null)
                                        <tr>
                                            <td>{{$item->id_servicio}}</td>
                                            <td class="text-left">{{$item->nombre}}</td>
                                            <td class="text-right">{{$item->precio}}</td>
                                            <td class="text-center">{{$item->cantidad}}</td>
                                            <td class="text-right">{{number_format(($item->subtotal ),2) }}</td>
                                        </tr>
                                    @endif
    
                                @endforeach
                                <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                    <td class="thick-line text-right">{{number_format($total,2)}}</td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>IVA 12%</strong></td>
                                    <td class="no-line text-right">{{number_format(($total*0),2)}}</td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Total</strong></td>
                                    <td class="no-line text-right">{{number_format((($total*0) + $total),2)}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
            <button type="button" onclick="window.print()" class="btn btn-info">
                <span class="glyphicon glyphicon-print"></span> Imprimir
            </button>
        </div>
    </div>

    </section>
    <!-- /.content -->

<!-- Scripts -->
  @section('script_page')
  
  @endsection

@endsection

