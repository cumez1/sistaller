@extends('layouts.app')

@section('htmlheader_title','Nuevo Cliente')


@section('main-content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Nuevo Cliente
        <small>SistemasGT</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Nuevo Cliente</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">

          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Datos generales del cliente</h3>
            </div>

            <div class="box-body">
              
              <div class="row col-lg-12 col-md-12" >
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                      <label>NIT:</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-sort-numeric-asc"></i>
                        </div>
                        <input id="nit" name="nit" type="text" class="form-control">
                      </div>
                    </div>
                </div>
              </div>

              <div class="row col-lg-12 col-md-12" >
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                      <label>Nombre:</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-user-o"></i>
                        </div>
                        <input id="nombre" name="nombre" type="text" class="form-control">
                      </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                      <label>Apellidos:</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-user"></i>
                        </div>
                        <input id="apellido" name="apellido" type="text" class="form-control">
                      </div>
                    </div>
                </div>
              </div>

              <div class="row col-lg-12 col-md-12" >
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                      <label>Dirección:</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-map-marker"></i>
                        </div>
                        <input id="direccion" name="direccion" type="text" class="form-control">
                      </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                      <label>Fecha Nacimiento:</label>

                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input id="fecha_nac" name="fecha_nac" type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                      </div>
                    </div>
                </div>
              </div>

              <div class="row col-lg-12 col-md-12" >
                <div class="col-lg-6 col-md-6 col-sm-12">                    
                    <div class="form-group">
                      <label>Telefono:</label>

                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-phone"></i>
                        </div>
                        <input id="telefono" name="telefono" type="text" class="form-control" >
                      </div>
                    </div>
                </div>

              </div>

            </div>
          </div>
        </div>
      </div>   

    </section>
    <!-- /.content -->

<!-- Scripts -->
  @section('script_page')
    
  @endsection

@endsection

