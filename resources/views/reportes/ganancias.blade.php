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
                    <input type="text" placeholder="Ingrese NIT" class="form-control" id="criterio" name="criterio" onkeyup="">
                    
                </div>
            </div>
        </div>   

    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <input type="text" placeholder="Fecha Inicial" class="fh_consulta form-control" id="fecha_ini" name="fecha_ini">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <input type="text" placeholder="Fecha Final" class="fh_consulta form-control" id="fecha_fin" name="fecha_fin">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div>
                <br>
                <a class="btn btn-success" id="btnBuscar" href="#" data-toggle="tooltip" title="Generar Reporte"><i class="fa fa-search"></i> Generar Reporte</a>
            </div>
        </div>
    </div>

    <div class="row resultado">
        
    </div>
    </section>
    <!-- /.content -->

<!-- Scripts -->
  @section('script_page')
      <script >
        
        $(document).ready(function(){
            $('.fh_consulta').datepicker({
                format: "yyyy/mm/dd"
            });

        });  

        $("#btnBuscar").click(function () {            
            var URL ="{{ route('reporte.ganancias') }}";
            var token = $("input[name='_token']").val();
            var datos = {
                fecha_ini: $("#fecha_ini").val(),
                fecha_fin: $("#fecha_fin").val(),
                nit_cliente: $("#criterio").val()
            };

            $.ajax({
                type: "POST",
                url: URL,
                dataType : 'json',
                headers: {'X-CSRF-TOKEN': token},
                data: datos,
                success: function(data){
                    
                    $('.resultado').empty();
                    $('.resultado').html(data.responseText);
                },  
                error: function(data){
                    $('.resultado').empty();
                    $('.resultado').html(data.responseText);
                }          
            });

        });

      </script>

  @endsection

@endsection

