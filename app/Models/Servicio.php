<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios';
    protected $primaryKey = 'id_servicio';

    public $timestamps = false;

    protected $fillable = ['id_tiposervicio','nombre','descripcion','costo','precio','activo'];

    public function tipo()
    {
        return $this->belongsTo(TipoServicio::class,'id_tiposervicio', 'id_tiposervicio');
    }

    public function getIdTiposervicioAttribute($value)
    {
        $categoria = TipoServicio::select('nombre')->where('id_tiposervicio','=',$value)->first();

        return $categoria->nombre;
    }

    public function getActivoAttribute($value)
    {
        if ($value == 1) {
            return '<span class="label label-success pull-right">Activo</span>';
        }else{
            return '<span class="label label-danger pull-right">Inactivo</span>';
        }
    }
    
}
