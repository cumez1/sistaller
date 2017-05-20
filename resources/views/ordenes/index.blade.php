@extends('layouts.app')

@section('htmlheader_title','Producto')


@section('main-content')
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
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">            
            <div class="form-group">                
                <div class="input-group">  
                    {{ csrf_field() }}                  
                    <input type="text" placeholder="Buscar por nombre cliente" class="form-control" id="criterio" name="criterio" onkeyup="buscarCriterio(event)">
                    <div class="input-group-addon">
                        <a id="btnBuscar" href="#" data-toggle="tooltip" title="Buscar"><i class="fa fa-search"></i></a>
                    </div>
                </div>
            </div>
        </div>         
        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
            <p class="pull-right">                         
                <a href="{{ route('orden.create') }}" class="btn btn-success">Nueva Orden</a>
            </p> 
        </div>

    </div>


    <div class="row">
        <div class="table-responsive">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <table class="table table-bordered table-striped" id="listadoTabla">
                    <thead>
                        <th>No. Orden</th>
                        <th>Fecha</th>
                        <th>Nit </th>
                        <th>Nombre Cliente</th>                        
                        <th>Total Productos</th>
                        <th>Total Servicios</th>
                        <th>Acciones&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    </section>
    <!-- /.content -->

<!-- Scripts -->
  @section('script_page')
        

    <script type="text/javascript">

        $(document).ready( function () {      
            listarOrdenes();
        });

        function listarOrdenes(){

            $('#listadoTabla').DataTable({
                columnDefs: [
                    { className: "dt-body-center", targets: [ 1 ]}
                ],            
                language: {
                    url: "{{asset('/js/Spanish.json')}}"
                },
                lengthMenu: {{ config('constantes.datatableListRows') }},        
                bFilter : false, //oculta filtros            
                processing: true,
                serverSide: true,      
                order: [[ 0, "desc" ]],    
                ajax: {
                    url: "{{ route('orden.listar') }}",
                    type: 'POST',
                    data : function (d) {                    
                        d._token = $('input[name="_token"]').val()                   
                        d.criterio = $("#criterio").val();                        
                    }
                },
                columns: [
                    {data: 0, name: 'id_orden', searchable: false, width: "10%"},
                    {data: 1, name: 'fecha_registro', searchable: false, width: "15%"},
                    {data: 2, name: 'nit', searchable: false, width: "10%"},
                    {data: 3, name: 'nombre',searchable: true, width: "25%"},
                    {data: 4, name: 'total', width: "15%", className: "text-right"},
                    {data: 5, name: 'totalservicio', width: "15%", className: "text-right"},
                    {data: 6, name: 'acciones',  orderable: false, width: "15%"}
                ]
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
                toastr['error']("No se encontro el cliente que busca", "sistemasGT")
            }
        };

        function buscarCriterio(event) {        
            if (event.which == 13 || event.keyCode == 13) {        
                $('#listadoTabla').DataTable().ajax.reload();
            }
        };

        $("#btnBuscar").click(function () {            
            $('#listadoTabla').DataTable().ajax.reload();
        });

        

   </script>


  @endsection

@endsection

