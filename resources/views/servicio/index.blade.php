@extends('layouts.app')

@section('htmlheader_title','Clientes')


@section('main-content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Servicios
        <small>SistemasGT</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Servicios</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        
    </div>
    <div class="table-responsive text-center">
        <table class="table table-borderless"  id="servicio">
            <thead>
                <tr>                
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Tipo de Servicio</th>
                    <th>Precio</th>
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
            $('#servicio').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('servicio.listado') }}",
                "columns" : [
                    {data: 'id_servicio'},
                    {data: 'nombre'},
                    {data: 'descripcion'},
                    {data: 'id_tiposervicio'},
                    {data: 'precio'},
                    {data: 'activo'}
                ] 
            });
        });  
      </script>

  @endsection

@endsection

