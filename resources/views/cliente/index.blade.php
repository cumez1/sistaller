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
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            
        </div>         
        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12" align="right">
            <p class="pull-right">                         
                <a href="{{ route('cliente.crear') }}" class="btn btn-success">Agregar Nuevo Cliente</a>
            </p>           
        </div>
    </div>
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
                    {data: 'nombre',className: "text-left" },
                    {data: 'apellido',className: "text-left" },
                    {data: 'direccion',className: "text-left" },
                    {data: 'fecha_nac'},
                    {data: 'telefono'}
                ] 
            });
        });  

      </script>

  @endsection

@endsection

