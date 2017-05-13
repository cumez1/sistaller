@extends('layouts.app')

@section('htmlheader_title','Clientes')


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
        
    </div>
    <div class="table-responsive text-center">
        <table class="table table-borderless"  id="productos">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Categoria</th>
                    <th>Marca</th>
                    <th>Precio</th>
                    <th>Stock</th>
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
            $('#productos').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('producto.listado') }}",
                "columns" : [
                    {data: 'id_producto'},
                    {data: 'nombre'},
                    {data: 'descripcion'},
                    {data: 'id_categoria'},
                    {data: 'marca'},
                    {data: 'precio'},
                    {data: 'stock'},
                    {data: 'activo'}

                ] 
            });
        });  
      </script>

  @endsection

@endsection

