@extends('layouts.app')

@section('htmlheader_title','Producto')


@section('main-content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Orden de Trabajo
        <small>SistemasGT</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Orden de Trabajo</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        
        <!-- Modal Buscar Productos-->
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
        </div>
        <!-- Modal Buscar Productos -->
        
        <!-- Modal Buscar Servicios-->
        <div class="modal fade" id="modalServicio">
            <div class="modal-dialog">
              <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                
                            <input type="text" placeholder="Búsqueda Rápida" class="form-control" id="criterio2" name="criterio2" onkeyup="buscarCriterio2(event)">
                            <div class="input-group-addon">
                                <a id="btnBuscar" href="#" data-toggle="tooltip" title="Buscar"><i class="fa fa-search"></i></a>
                            </div>
                        </div>

                          <div class="modal-body">

                            <div class="outer_div" >
                                    <table class="table table-striped" id="listadoServicios">
                                        <thead>
                                        <tr class="warning">
                                            <th>Código</th>
                                            <th>Servicio</th>
                                            <th><span class="pull-right">Descripción</span></th>
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
        </div>
        <!-- Modal Buscar Servicios -->

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
                        @include('ordenes.formdatos')
                        
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
                                        <a id="btnGuardar" class="btn btn-success">
                                        <i class="fa fa-floppy-o" aria-hidden="true"> Guardar Orden</i>
                                        </a>
                                        <a href="{{ route('orden.vaciar' )}}" class="btn btn-danger">
                                        <i class="fa fa-undo" aria-hidden="true"> Vaciar</i>
                                        </a>
                                </div>
                            </div>  
                        </form> 


                    </div>
                </div>
            </div>
        </div>


    </section>
    <!-- /.content -->

<!-- Scripts -->
  @section('script_page')
        
        
    <link href="{{ asset('/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
    <script src="{{ asset('/js/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript">

        $(document).ready( function () {      
            listarProductos();
            listarServicios();
            recupearCliente();
            recupearRegistros();
            verificarDespues();

            

        });

        $('#fecha_entrega').datepicker({
            format: 'dd/mm/yyyy',
            startDate: '0d',
            autoclose: true,
            toggleActive: true
        });


        function listarProductos(){

            $('#listadoProductos').DataTable({
                columnDefs: [
                    { className: "dt-body-center", targets: [ 1 ]}
                ],            
                language: {
                    url: "{{ asset('/js/Spanish.json')}}"
                },
                lengthMenu: {{ config('constantes.datatableListRows') }},          
                bFilter : false, //oculta filtros            
                processing: true,
                serverSide: true,            
                ajax: {
                    url: "{{ route('producto.listar') }}",
                    type: 'POST',
                    data : function (d) {                    
                        d._token = $('input[name="_token"]').val()                   
                        d.criterio = $("#criterio").val();                        
                    }
                },
                columns: [
                    {data: 0, name: 'id_producto', searchable: true,width: "10%"},
                    {data: 1, name: 'nombre', searchable: true, width: "20%",className: "text-left"},
                    {data: 2, name: 'cantidad', width: "30%"},
                    {data: 3, name: 'precio', width: "10%"},
                    {data: 4, name: 'acciones',  orderable: false,width: "10%"}
                ],
                createdRow: function( row, data, dataIndex ) {
                   $( row ).find('td:eq(2)').attr('class', 'col-xs-1');
                }
            });
        }

        function listarServicios(){

            $('#listadoServicios').DataTable({
                columnDefs: [
                    { className: "dt-body-center", targets: [ 1 ]}
                ],            
                language: {
                    url: "{{ asset('/js/Spanish.json')}}"
                },
                lengthMenu: {{ config('constantes.datatableListRows') }},          
                bFilter : false, //oculta filtros            
                processing: true,
                serverSide: true,            
                ajax: {
                    url: "{{ route('servicio.listar') }}",
                    type: 'POST',
                    data : function (d) {                    
                        d._token = $('input[name="_token"]').val()                   
                        d.criterio = $("#criterio").val();                        
                    }
                },
                columns: [
                    {data: 0, name: 'id_servicio', searchable: true,width: "10%"},
                    {data: 1, name: 'nombre', searchable: true, width: "15%",className: "text-left"},
                    {data: 2, name: 'descripcion', width: "40%",className: "text-left"},
                    {data: 3, name: 'precio', width: "10%"},
                    {data: 4, name: 'acciones',  orderable: false,width: "10%"}
                ],
                createdRow: function( row, data, dataIndex ) {
                   $( row ).find('td:eq(2)').attr('class', 'col-xs-1');
                }
            });
        }

        function recupearCliente(){
            var URL ="{{ route('orden.cliente') }}";
            var token = $("input[name='_token']").val();
            var datos = {nit: $("#nit").val()};

            $.ajax({
                type: "POST",
                url: URL,
                dataType : 'json',
                headers: {'X-CSRF-TOKEN': token},
                data: datos,
                success: function(data){
                    $("#nit").val(data.nit);
                    $("#nombre").val(data.nombre +" "+data.apellido);
                    $("#direccion").val(data.direccion );
                    $("#telefono").val(data.telefono );
                },  
                error: function(data){
                    $("#nit").val('');
                    $("#nombre").val('');
                    $("#direccion").val('');
                    $("#telefono").val('');
                }          
            });
        }

        function recupearRegistros(){
            
            var URL ="{{ route('orden.recupear') }}";
            var token = $("input[name='_token']").val();

            $.ajax({
                    headers:{
                        'X-CSRF-Token': token
                    },
                    url: URL,
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
        }

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
                toastr['warning']("{{ session('vacioc') }}", "Sistemas  GT");
            @endif

             @if(session()->has('vaciop'))         
                toastr['warning']("{{ session('vaciop') }}", "Sistemas  GT");
            @endif


            @if(session()->has('exitoso'))         
                toastr['success']("{{ session('exitoso') }}", "Sistemas  GT");
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
            var URL ="{{ route('orden.agregar') }}";
            var token = $("input[name='_token']").val();
            var datos = {id_producto: id_producto};

            $.ajax({
                type: "POST",
                url: URL,
                dataType : 'json',
                headers: {'X-CSRF-TOKEN': token},
                data: datos,
                success: function(data){
                    $('#resultados').empty();
                    $('#resultados').html(data.response);
                },  
                error: function(data){

                }          
            });
        };

        href="{{ route('orden.guardar' )}}"


        function agregarServ(event, id_servicio){
            event.preventDefault();
            var rowCount = $('#detalle tr').length;
            var URL ="{{ route('orden.agregarserv') }}";
            var token = $("input[name='_token']").val();
            var datos = {id_servicio: id_servicio};

            $.ajax({
                type: "POST",
                url: URL,
                dataType : 'json',
                headers: {'X-CSRF-TOKEN': token},
                data: datos,
                success: function(data){
                    $('#resultados').empty();
                    $('#resultados').html(data.response);
                },  
                error: function(data){

                }          
            });
        };

        function eliminar(event, id_producto){
            event.preventDefault();
            var URL ="{{ route('orden.quitar') }}";
            var token = $("input[name='_token']").val();
            var datos = {id_producto: id_producto};
            
            $.ajax({
                type: "POST",
                url: URL,
                dataType : 'json',
                headers: {'X-CSRF-TOKEN': token},
                data: datos,
                success: function(data){
                    $('#resultados').empty();
                    $('#resultados').html(data.response);
                },  
                error: function(data){

                }          
            });
        }
        
        $("#nit").keypress(function(e) {
            if(e.which == 13) {
                var URL ="{{ route('cliente.buscar') }}";
                var token = $("input[name='_token']").val();
                var datos = {nit: $("#nit").val()};

                $.ajax({
                    type: "POST",
                    url: URL,
                    dataType : 'json',
                    headers: {'X-CSRF-TOKEN': token},
                    data: datos,
                    success: function(data){
                        
                        $("#nit").val(data.nit);
                        $("#nombre").val(data.nombre +" "+data.apellido);
                        $("#direccion").val(data.direccion );
                        $("#telefono").val(data.telefono );
                    },  
                    error: function(data){
                        error(1);
                        $("#nit").val('');
                        $("#nombre").val('');
                        $("#direccion").val('');
                        $("#telefono").val('');
                    }          
                });
                
            }
        });

        $("#btnBuscar").click(function () {            
            $('#listadoProductos').DataTable().ajax.reload();
        });

        $("#btnGuardar").click(function (event) {            
            event.preventDefault();
            var URL ="{{ route('orden.guardar' )}}";
            var token = $("input[name='_token']").val();
            var datos = $("#datos_orden" ).serializeArray();

            $.ajax({
                type: "POST",
                url: URL,
                dataType : 'json',
                headers: {'X-CSRF-TOKEN': token},
                data: datos,
                success: function(data){
                    if(data.status==200){
                        var url2 = "{{ url('ordenes') }}";
                        window.location.href = url2;
                            
                    }else if(data.status==422){
                        verificarDespues();
                    }
                    
                },  
                error: function(data){
                    
                }          
            });



        });

   </script>


  @endsection

@endsection

