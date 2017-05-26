@extends('layouts.app')

@section('htmlheader_title','Inicio')


@section('main-content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small>SistemasGT</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">SistemasGT</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <center>
                <img src="{{ asset('img/logo.png') }}" style="width: 40%;">
            </center>            
        </div>
    </div>

    </section>
    <!-- /.content -->
@endsection
