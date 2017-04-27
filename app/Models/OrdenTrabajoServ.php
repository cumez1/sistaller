<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdenTrabajoServ extends Model
{
    protected $table = 'ordenes_trabajo_serv';
    
    protected $primaryKey = ['num_detalle', 'id_orden'];
    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = ['num_detalle',
                           'id_orden'
                           'id_servicio',
                           'cantidad',
                           'precio',
                           'descuento'];

}
