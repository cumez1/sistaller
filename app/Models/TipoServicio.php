<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoServicio extends Model
{
    protected $table = 'tipo_servicios';
    protected $primaryKey = 'id_tiposervicio';

    public $timestamps = false;

    protected $fillable = ['nombre','descripcion','activo'];

    public function servicios()
    {
        return $this->hasMany(Servicio::class,'id_tiposervicio', 'id_tiposervicio');
    }

    public function getActivoAttribute($value)
    {
        if ($value == 0) {
            return '<span class="label label-success pull-right">Activo</span>';
        }else{
            return '<span class="label label-danger pull-right">Inactivo</span>';
        }
    }


}
