<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdenTrabajo extends Model
{
    protected $table = 'ordenes';
    protected $primaryKey = 'id_orden';

    public $timestamps = false;

    protected $fillable = ['id_cliente',
                           'cliente_contacto'
                           'fecha_registro',
                           'fecha_entrega',
                           'tipo_vehiculo',
                           'vehiculo',
                           'modelo',
                           'placa',
                           'usuario_registra',
                           'usuario_responsable',
                           'observaciones',
                           'estado'];

    

}
