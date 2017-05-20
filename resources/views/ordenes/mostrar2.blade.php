

@extends('layouts.app')

@section('css-page')
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
@endsection

@section('main-content')

    <div class="row">
        <div class="col-xs-12">
            <div class="invoice-title">
                <h2>FACTURA</h2><h3 class="pull-right">ORDEN # {{$orden[0]->noorden}}</h3>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                    <strong>Orden de Trabjao:</strong><br>
                        {{$orden[0]->nombre}} {{$orden[0]->apellido}}<br>
                        {{$orden[0]->direccion}}
                        {{$orden[0]->telefono}}
                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                    <strong>Enviado a:</strong><br>
                        {{$orden[0]->nombre}} {{$orden[0]->apellido}}<br>
                        {{$orden[0]->direccion}}<br>
                        {{$orden[0]->direccion}}<br>
                        {{$orden[0]->telefono}}
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
                       {{$orden[0]->fecha_registro}}<br><br>
                    </address>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Detalle de la factura</strong></h3>
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

                                @foreach($orden as $item)
                                <tr>
                                    <td>{{$item->id_producto}}</td>
                                    <td class="text-left">{{$item->nombre}}</td>
                                    <td class="text-right">{{$item->precio}}</td>
                                    <td class="text-center">{{$item->cantidad}}</td>
                                    <td class="text-right">{{number_format(($item->precio * $item->cantidad ),2) }}</td>
                                </tr>
    
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
                                    <td class="no-line text-right">{{number_format(($total*0.12),2)}}</td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Total</strong></td>
                                    <td class="no-line text-right">{{number_format((($total*0.12) + $total),2)}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
        

@endsection


