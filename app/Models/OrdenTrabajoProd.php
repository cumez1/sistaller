<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdenTrabajoProd extends Model
{   


    protected $table = 'ordenes_trabajo_prod';
    
    protected $primaryKey = ['num_detalle', 'id_orden'];
    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = ['num_detalle',
                           'id_orden'
                           'id_producto',
                           'cantidad',
                           'precio',
                           'descuento'];



}
