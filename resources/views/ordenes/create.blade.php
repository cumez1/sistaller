

@extends('layouts.app')

@section('htmlheader_title', 'HOME')



@section('main-content')
    <!-- Modal Buscar Producto-->

    <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        
                    <input type="text" placeholder="Búsqueda Rápida" class="form-control" id="criterio" name="criterio" onkeyup="buscarCriterio(event)">
                    <div class="input-group-addon">
                        <a id="btnBuscar" href="#" data-toggle="tooltip" title="Buscar"><i class="fa fa-search"></i></a>
                    </div>
                </div>

                  <div class="modal-body">

                    <div class="outer_div" >
                            <table class="table table-striped" id="listadoProductos">
                                <thead>
                                <tr class="warning">
                                    <th>Código</th>
                                    <th>Producto</th>
                                    <th><span class="pull-right">Cant.</span></th>
                                    <th><span class="pull-right">Precio</span></th>
                                    <th style="width: 36px;">                                    
                                </th>
                                </thead>
                            </table>
                    </div>
                    <!-- Datos ajax Final -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    
                  </div>
                
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


    
    <form class="form-horizontal" method="post" id="editar_item" name="editar_item">
    <!-- Modal Editar-->
        <div class="modal fade " id="editModalItem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class='fa fa-edit'></i> Editar </h4>
              </div>
              <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <label for="codigo_item" class="control-label">Código</label>
                        <input type="text" class="form-control" id="codigo_item" name="codigo_item" placeholder="" disabled required>
                        <input type="hidden" class="form-control" id="id_tmp" name="id_tmp" >
                    </div>
                    <div class="col-md-4">
                        <label for="cantidad_item" class="control-label">Cantidad</label>
                        <input type="text" class="form-control" id="cantidad_item" name="cantidad_item" placeholder="" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="descripcion_item" class="control-label">Descripción</label>
                        <input type="text" class="form-control" name="descripcion_item" id="descripcion_item" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="precio_item" class="control-label">Precio</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                            <input type="text" class="form-control" name="precio_item" id="precio_item" required>
                        </div>  
                    </div>
                    <div class="col-md-6">
                        <label for="descuento_item" class="control-label">Descuento</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-percent"></i></div>
                            <input type="text" class="form-control" name="descuento_item" id="descuento_item" >
                        </div>  
                    </div>

                </div>          
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Actualizar datos</button>
              </div>
            </div>
          </div>
        </div>
    </form>  

    
        <div class="row">
            
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class='glyphicon glyphicon-edit'></i> Nueva Venta</h4>
                    </div>
                    <div class="panel-body">
                    
                        <form class="form-horizontal" role="form" id="datos_cotizacion">
                            {{ csrf_field() }}
                            

                            <div class="form-group row">
	                            <label  class="col-md-3 control-label">Selecciona el cliente:</label>
	                            <div class="col-md-5">
	                                <input type="text" class="form-control input-sm" id="nit" placeholder="Ingresa el nombre del cliente" required>
	                            </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-md-3 control-label">Nombre Completo:</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control input-sm" id="nombre" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-md-3 control-label">Dirección:</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control input-sm" id="direccion" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-md-3 control-label">Email:</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control input-sm" id="email" disabled>
                                </div>
                            </div>
                          
                            <div class="row">
                                <label  class="col-md-3 control-label"></label>
                                <div class="col-md-5">
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
                                        <span class="glyphicon glyphicon-plus"></span> Agregar producto
                                        </button>
                                        <button type="button" onclick="window.print()" class="btn btn-default">
                                        <span class="glyphicon glyphicon-print"></span> Imprimir
                                        </button>
                                </div>
                            </div>  
                        </form> 
                        <div class="row">
                            <div id="resultados" class="col-md-12" style="margin-top:10px">
                                <table class="table" id="detalle">
                                <tbody><tr>
                                    <th>CODIGO</th>
                                    <th class="text-center">CANT.</th>
                                    <th>DESCRIPCION</th>
                                    <th class="text-right">PRECIO UNIT.</th>
                                    <th class="text-right">SUB TOTAL</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td colspan="4"><span class="pull-right">PARCIAL Q</span></td>
                                    <td><span class="pull-right">0.00</span></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="4"><span class="pull-right">DESCUENTO Q</span></td>
                                    <td><span class="pull-right">0.00</span></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="4"><span class="pull-right">NETO Q</span></td>
                                    <td><span class="pull-right">0.00</span></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="4"><span class="pull-right">IVA 12% Q</span></td>
                                    <td><span class="pull-right">0.00</span></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="4"><span class="pull-right">TOTAL Q</span></td>
                                    <td><span class="pull-right">0.00</span></td>
                                    <td></td>
                                </tr>
                                </tbody></table>
                            </div>   
                            <!-- Carga los datos ajax -->
                        </div>

                        <form class="form-horizontal" role="form" id="datos_cotizacion">
                            {{ csrf_field() }}
                         
                            <div class="row">
                                <label  class="col-md-3 control-label"></label>
                                <div class="col-md-5">
                                        <a href="{{ route('factura.guardar' )}}" class="btn btn-success">
                                        <i class="fa fa-floppy-o" aria-hidden="true"> Guardar Factura</i>
                                        </a>
                                        <a href="{{ route('factura.vaciar' )}}" class="btn btn-danger">
                                        <i class="fa fa-undo" aria-hidden="true"> Vaciar</i>
                                        </a>
                                </div>
                            </div>  
                        </form> 


                    </div>
                </div>
            </div>
        </div>
        
@endsection


@section('rutas_detalle')
    <ol class="breadcrumb">
        <li><a href="/facturas"><i class="fa fa-dashboard"></i> Ventas</a></li>
        <li class="active">Nueva Venta</li>
    </ol>
@endsection

@section('scripts_page')
    
    <script src="/libs/jquery/jquery-ui.js"></script>
    <script src="/libs/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/libs/datatables/js/dataTables.bootstrap.min.js"></script>


    <script type="text/javascript">

        $(document).ready( function () {      
            listarProductos();
            recupearCliente();
            recupearRegistros();
            verificarDespues();
        });

        function listarProductos(){

            $('#listadoProductos').DataTable({
                columnDefs: [
                    { className: "dt-body-center", targets: [ 1 ]}
                ],            
                language: {
                    url: "/libs/datatables/languages/Spanish.json"
                },
                             
                bFilter : false, //oculta filtros            
                processing: true,
                serverSide: true,            
                ajax: {
                    url: "/productos/listadoAjax",
                    type: 'POST',
                    data : function (d) {                    
                        d._token = $('input[name="_token"]').val()                   
                        d.criterio = $("#criterio").val();                        
                    }
                },
                columns: [
                    {data: 0, name: 'id_producto', searchable: true},
                    {data: 1, name: 'nombre', searchable: true},
                    {data: 2, name: 'cantidad'},
                    {data: 3, name: 'precio'},
                    {data: 4, name: 'acciones',  orderable: false}
                ],
                createdRow: function( row, data, dataIndex ) {
                   $( row ).find('td:eq(2)').attr('class', 'col-xs-1');
                }
            });
        }

        function recupearCliente(){
            $.ajax({
                headers:{
                    'X-CSRF-Token': $('input[name="_token"]').val()
                },
                url: '/facturas/recuperarCliente',
                type: 'post',
                dataType: 'json',
                success: function( data ){
                    $("#nit").val(data.nit);
                    $("#nombre").val(data.nombre +" "+data.apellido);
                    $("#direccion").val(data.direccion );
                    $("#email").val(data.email );

                },  
                error: function( data ){
                    
                    $("#nit").val('');
                    $("#nombre").val('');
                    $("#direccion").val('');
                    $("#email").val('');                    
                }
            });
        }

        function recupearRegistros(){
            $.ajax({
                    headers:{
                        'X-CSRF-Token': $('input[name="_token"]').val()
                    },
                    url: '/facturas/recuperar',
                    type: 'POST',
                    dataType: 'json',
                    success: function( data ){
                        //$('#detalle > tbody > tr').eq(rowCount-6).after(data.fila);
                        $('#resultados').empty();
                        $('#resultados').html(data.response);

                    },  
                    error: function( data ){

                    }
            });
        }

        function error(tipo){

            toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "newestOnTop": true,
                  "progressBar": true,
                  "positionClass": "toast-top-right",
                  "preventDuplicates": false,
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "timeOut": "2000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                };
            

            if(tipo==1){
                toastr['error']("No se encontro el cliente que busca", "MINGO FACTURACION")
            }
        };

        function verificarDespues(){
            toastr.options = {
                      "closeButton": true,
                      "debug": false,
                      "newestOnTop": true,
                      "progressBar": true,
                      "positionClass": "toast-top-right",
                      "preventDuplicates": false,
                      "showDuration": "300",
                      "hideDuration": "1000",
                      "timeOut": "4000",
                      "extendedTimeOut": "1000",
                      "showEasing": "swing",
                      "hideEasing": "linear",
                      "showMethod": "fadeIn",
                      "hideMethod": "fadeOut"
            };

            @if(session()->has('vacioc'))         
                toastr['warning']("{{ session('vacioc') }}", "MINGOB FACTURACION");
            @endif

             @if(session()->has('vaciop'))         
                toastr['warning']("{{ session('vaciop') }}", "MINGOB FACTURACION");
            @endif


            @if(session()->has('exitoso'))         
                toastr['success']("{{ session('exitoso') }}", "MINGOB FACTURACION");
            @endif
        }

        function buscarCriterio(event) {        
            if (event.which == 13 || event.keyCode == 13) {        
                $('#listadoProductos').DataTable().ajax.reload();
            }
        };

        function agregar(event, id_producto){
            event.preventDefault();
            var rowCount = $('#detalle tr').length;

            $.ajax({
                    headers:{
                        'X-CSRF-Token': $('input[name="_token"]').val()
                    },
                    url: '/facturas/agregar/'+id_producto,
                    type: 'POST',
                    dataType: 'json',
                    success: function( data ){
                        //$('#detalle > tbody > tr').eq(rowCount-6).after(data.fila);
                        $('#resultados').empty();
                        $('#resultados').html(data.response);

                    },  
                    error: function( data ){

                    }
            });
        };

        function eliminar(event, id_producto){
            event.preventDefault();
            
            $.ajax({
                    headers:{
                        'X-CSRF-Token': $('input[name="_token"]').val()
                    },
                    url: '/facturas/quitar/'+id_producto,
                    type: 'POST',
                    dataType: 'json',
                    success: function( data ){
                        //$('#detalle > tbody > tr').eq(rowCount-6).after(data.fila);
                        $('#resultados').empty();
                        $('#resultados').html(data.response);

                    },  
                    error: function( data ){

                    }
            });
        };
        
        $("#nit").keypress(function(e) {
            if(e.which == 13) {

                var nitBusqueda = $("#nit").val();

                $.ajax({
                    headers:{
                        'X-CSRF-Token': $('input[name="_token"]').val()
                    },
                    url: '/clientes/buscar/'+nitBusqueda,
                    type: 'post',
                    dataType: 'json',
                    success: function( data ){
                        $("#nombre").val(data.nombre +" "+data.apellido);
                        $("#direccion").val(data.direccion );
                        $("#email").val(data.email );

                    },  
                    error: function( data ){
                        error(1);
                        $("#nombre").val('');
                        $("#direccion").val('');
                        $("#email").val('');                    }
                });
            }
        });

        $("#btnBuscar").click(function () {            
            $('#listadoProductos').DataTable().ajax.reload();
        });







    </script>



@endsection


