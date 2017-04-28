<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdenTrabajo extends Model
{
    protected $table = 'ordenes';
    protected $primaryKey = 'id_orden';

    public $timestamps = false;

    protected $fillable = ['id_cliente',
                           'cliente_contacto',
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

    
    public function cliente()
    {
        return $this->belongsTo(Cliente::class,'id_cliente', 'id_cliente');
    }

    public function det_productos()
    {
        return $this->hasMany(OrdenTrabajoProd::class,'id_orden', 'id_orden');
    }

    public function det_servicios()
    {
        return $this->hasMany(OrdenTrabajoServ::class,'id_orden', 'id_orden');
    }

    public function getEstadoAttribute($value){
        if ($value == 0) {
           return  '<span class="label label-warning">Registrado</span>';
        }elseif ($value == 1) {
           return  '<span class="label label-info">En Proceso</span>';
        }elseif($value == 2){
           return  '<td><span class="label label-success">Terminado</span></td>';
        }
       
    }


}
