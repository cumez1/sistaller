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

    <!-- Main content -->
    <section class="content">
        <div class="row">
        <div class="col-xs-12">
            <div class="invoice-title">
                <h2>SISTEMAS GT</h2><h3 class="pull-right">ORDENES</h3>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-6 text-left">
                    <address>
                    <strong>Orden de Trabajos:</strong><br>
                        NIT:{{$client['nit']}}<br>
                    <strong>Datos Generales:</strong><br>
                        {{$client['nombre']}} {{$client['apellido']}}<br>
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
                                    <td class="text-center"><strong>Codigo Orden</strong></td>
                                    <td class="text-center"><strong>Fecha</strong></td>
                                    <td class="text-center"><strong>Cliente</strong></td>
                                    <td class="text-center"><strong>Precio</strong></td>
                                    <td class="text-center"><strong>Costo</strong></td>
                                    <td class="text-center"><strong>Ganancia</strong></td>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($res as $item)
                                    <tr>
                                        <td>{{$item->id_orden}}</td>
                                        <td class="text-left">{{$item->fecha_registro}}</td>
                                        <td class="text-left">{{$item->nombre}} {{$item->apellido}}</td>
                                        @php
                                            $costo = $item->costo+$item->costoServicio;
                                            $precio = $item->total+$item->totalservicio;
                                            $ganancia = $costo-$precio;

                                            if($ganancia < 0){
                                                $ganancia = $ganancia*-1;
                                            }
                                        @endphp
                                        <td class="text-right">{{number_format(($costo),2) }}</td>
                                        <td class="text-right">{{number_format(($precio),2) }}</td>
                                        <td class="text-right">{{number_format(($ganancia),2) }}</td>
                                    </tr>

                                @endforeach
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

