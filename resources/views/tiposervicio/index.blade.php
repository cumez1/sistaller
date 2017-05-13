@extends('layouts.app')

@section('htmlheader_title','Tipo Servicio')


@section('main-content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tipo de Servicio
        <small>SistemasGT</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Tipo de Servicio</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            
        </div>         
        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12" align="right">
            <p class="pull-right">                         
                <button class="btn btn-success">Nuevo Tipo Servicio</button>
            </p>           
        </div>
    </div>
    <div class="table-responsive text-center">
        <table class="table table-borderless"  id="tiposervicio">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                </tr>
            </thead>                    
        </table>
    </div>  

    </section>
    <!-- /.content -->

<!-- Scripts -->
  @section('script_page')
      <script >
        
        $(document).ready(function(){
            $('#tiposervicio').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('tiposervicio.listado') }}",
                "columns" : [
                    {data: 'id_tiposervicio'},
                    {data: 'nombre'},
                    {data: 'descripcion'},
                    {data: 'activo'}
                ] 
            });
        }); 
      </script>

  @endsection

@endsection

