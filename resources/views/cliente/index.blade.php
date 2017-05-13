@extends('layouts.app')

@section('htmlheader_title','Clientes')


@section('main-content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cliente
        <small>SistemasGT</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Clientes</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="table-responsive text-center">
        <table class="table table-borderless"  id="clientes">
            <thead>
            
                <tr>
                    <th>#</th>
                    <th>Nit</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Dirección</th>
                    <th>Fecha Nacimiento</th>
                    <th>Telefono</th>
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
            $('#clientes').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('cliente.listado') }}",
                "columns" : [
                    {data: 'id_cliente'},
                    {data: 'nit'},
                    {data: 'nombre'},
                    {data: 'apellido'},
                    {data: 'direccion'},
                    {data: 'fecha_nac'},
                    {data: 'telefono'}
                ] 
            });
        });  
      </script>

  @endsection

@endsection

