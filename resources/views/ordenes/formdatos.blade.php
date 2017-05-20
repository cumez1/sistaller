<form class="form-horizontal" role="form" id="datos_orden">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-lg-6 col-md-6 form-group row">
            <label  class="col-md-3 control-label">Ingrese NIT</label>
            <div class="col-md-9">
                <input type="text" class="form-control input-sm" name="nit" id="nit" placeholder="Ingresa el nit del cliente (presione enter)" required>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 form-group row">
            <label  class="col-md-3 control-label"></label>
            <div class="col-md-9">
                
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 form-group row">
            <label  class="col-md-3 control-label">Nombre Completo:</label>
            <div class="col-md-9">
                <input type="text" class="form-control input-sm" name= "nombre" id="nombre" readonly>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 form-group row">
            <label  class="col-md-3 control-label">Dirección:</label>
            <div class="col-md-9">
                <input type="text" class="form-control input-sm" name="direccion" n id="direccion" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 form-group row">
            <label  class="col-md-3 control-label">Telefono:</label>
            <div class="col-md-9">
                <input type="text" class="form-control input-sm" name= "telefono" id="telefono">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6  form-group row">
            <label  class="col-md-3 control-label">Tipo Vehículo:</label>
            <div class="col-md-9">
                <input type="text" class="form-control input-sm" name="tipovehiculo" id="tipovehiculo" >
            </div>
        </div>

        <div class="col-lg-6 col-md-6  form-group row">
            <label  class="col-md-3 control-label">Modelo:</label>
            <div class="col-md-9">
                <input type="text" class="form-control input-sm" name="vehiculo" id="vehiculo" >
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-6 col-md-6  form-group row">
            <label  class="col-md-3 control-label">Placas:</label>
            <div class="col-md-9">
                <input type="text" class="form-control input-sm" name="placas" id="placas" >
            </div>
        </div>

        <div class="col-lg-6 col-md-6  form-group row">
            <label  class="col-md-3 control-label">Responsable Mantenimiento:</label>
            <div class="col-md-9">
                <input type="text" class="form-control input-sm" name="responsable" id="responsable" >
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-6  form-group row">
            <label  class="col-md-3 control-label">Observaciones:</label>
            <div class="col-md-9">
                <textarea class="form-control" rows="5" id="comment" name="observaciones" id="observaciones"></textarea>
            </div>
        </div>
        <div class="col-lg-6 col-md-6  form-group row">
            <label  class="col-md-3 control-label">Fecha Entrega:</label>
            <div class="col-md-9">
                <input type="text" class="form-control input-sm" name="fecha_entrega" id="fecha_entrega" >
            </div>
        </div>
    </div>


    
    
  
    <div class="row">
        <label  class="col-md-3 control-label"></label>
        <div class="col-md-5">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
                <span class="glyphicon glyphicon-plus"></span> Agregar producto
                </button>
                 <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalServicio">
                <span class="glyphicon glyphicon-plus"></span> Agregar Servicio
                </button>
                <button type="button" onclick="window.print()" class="btn btn-default">
                <span class="glyphicon glyphicon-print"></span> Imprimir
                </button>
        </div>
    </div>  
</form> 