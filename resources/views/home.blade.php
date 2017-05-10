@extends('layouts.app')

@section('htmlheader_title','Inicio')


@section('main-content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Hola Mundo
        <small>SistemasGT</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
      <!-- Cuadros de Información -->
      <div class="row">
        
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Clientes</span>
              <span class="info-box-number">{{count($datos['clientesAll'])}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Productos</span>
              <span class="info-box-number">{{count($datos['productosAll'])}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        
        

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>
        
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-android-settings"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Servicios</span>
              <span class="info-box-number">{{count($datos['servicios'])}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
       
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa ion-bag"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Ordenes</span>
              <span class="info-box-number">{{count($datos['ordenes'])}} <small>Ordenes</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </div>
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">

          <!-- TABLE: ORDENES DE TRABAJO -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Últimos Ordenes de Trabajo</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th># Orden</th>
                    <th>Cliente</th>
                    <th>Estado</th>
                    <th>Observaciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                    @foreach($datos['ordenes'] as $orden)
                      <tr>
                        <td>OR{{$orden->id_orden}}</td>
                        @php
                          $cliente = $orden->cliente;
                        @endphp
                        <td>{{$cliente->nombre}} {{$cliente->apellido}}</td>
                        <td>
                          @php
                            echo $orden->estado;
                          @endphp
                        </td>
                        <td>{{$orden->observaciones}}</td>
                      </tr>
                    @endforeach
                    
                  
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Nueva Orden de Trabajo</a>
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">Ver todos las ordenes</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->

          <!-- TABLE: ULTIMOS CLIENTES -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Últimos Clientes Registrados</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>ID Cliente</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Telefono</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                    @foreach($datos['clientes'] as $cliente)
                      <tr>
                        <td>CLI{{$cliente->id_cliente}}</td>                        
                        <td>{{$cliente->nombre}} {{$cliente->apellido}}</td>
                        <td>{{$cliente->direccion}}</td>
                        <td>{{$cliente->telefono}}</td>
                      </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Nuevo Cliente</a>
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">Ver Todos los clientes</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->


        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <!-- SIDEBAR DERECHA INVENTARIOS -->
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
            @php
              $inventario = 0;
              foreach ($datos['productos'] as $producto) {
                 $inventario += $producto->stock;
              }
            @endphp
            <div class="info-box-content">
              <span class="info-box-text">Inventario</span>
              <span class="info-box-number">{{$inventario}}</span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
                  <span class="progress-description">
                    Productos y Respuestos
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
            @php
              $tProductos = 0;
              $tServicios = 0;
              foreach ($datos['ordenes'] as $orden) {
                  $det_productos = $orden->det_productos;
                  $det_servicios = $orden->det_servicios;

                  foreach ($det_productos as $producto) {                    
                      $tProductos += $producto->cantidad * $producto->precio;
                      
                  }
                  foreach ($det_servicios as $servicio) {                    
                      $tServicios += $servicio->cantidad * $servicio->precio;
                  }
              }

              $tProductos = number_format($tProductos,2);
              $tServicios = number_format($tServicios,2);
            @endphp

            <div class="info-box-content">
              <span class="info-box-text">Ventas servicio</span>
              <span class="info-box-number">Q {{$tServicios}}</span>

              <div class="progress">
                <div class="progress-bar" style="width: 20%"></div>
              </div>
                  <span class="progress-description">
                    Ventas de servicios
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-cash"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Ventas productos</span>
              <span class="info-box-number">Q {{$tProductos}}</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    Ventas por productos
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion ion-person-add"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Clientes nuevos al mes</span>
              <span class="info-box-number">{{count($datos['clientesAll'])}}</span>

              <div class="progress">
                <div class="progress-bar" style="width: 40%"></div>
              </div>
                  <span class="progress-description">
                    Clientes nuevos +
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->

          <!-- PRODUCT LIST -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Productos Agregados Recientemente</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                @foreach($datos['productos'] as $producto)
                  <li class="item">
                    <div class="product-img">
                      <img src="{{ asset('/img/default-50x50.gif') }}" alt="Imagen del producto">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">{{$producto->nombre}}
                        @php
                          
                          if ($producto->precio <= 100) {
                              echo '<span class="label label-danger pull-right">Q '.$producto->precio.'</span>';
                          }elseif ($producto->precio > 100 && $producto->precio <= 200) {
                              echo '<span class="label label-warning pull-right">Q '.$producto->precio.'</span>';
                          }elseif ($producto->precio > 200 && $producto->precio <= 300) {
                              echo '<span class="label label-info pull-right">Q '.$producto->precio.'</span>';
                          }elseif ($producto->precio > 300 ) {
                              echo '<span class="label label-success pull-right">Q '.$producto->precio.'</span>';
                          }
                        @endphp
                      </a>
                          <span class="product-description">
                            {{$producto->descripcion}}
                          </span>
                    </div>
                  </li>
                @endforeach

              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="javascript:void(0)" class="uppercase">Ver todo los productos</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
