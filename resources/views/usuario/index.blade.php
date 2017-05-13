@extends('layouts.app')

@section('htmlheader_title','Usuarios')


@section('main-content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Usuarios
        <small>SistemasGT</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Usuario</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            
        </div>         
        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12" align="right">
            <p class="pull-right">                         
                <a href="{{ route('usuario.crear') }}" class="btn btn-success">Agregar Nuevo Usuario</a>
            </p>           
        </div>
    </div>
    <div class="table-responsive text-center">
        <table class="table table-borderless"  id="clientes">
            <thead>
            
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Fecha Registro</th>
                    <th>Fecha Actualización</th>
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
                "ajax": "{{ route('usuario.listado') }}",
                "order": [[ 0, "desc" ]],
                "columns" : [
                    {data: 'id',},
                    {data: 'name',className: "text-left" },
                    {data: 'email',className: "text-left" },
                    {data: 'created_at'},
                    {data: 'updated_at'}
                ] 
            });
        });  

      </script>

  @endsection

@endsection

