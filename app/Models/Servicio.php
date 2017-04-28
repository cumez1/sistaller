<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios';
    protected $primaryKey = 'id_servicio';

    public $timestamps = false;

    protected $fillable = ['id_tiposervicio','nombre','descripcion','precio','activo'];

    public function tipo()
    {
        return $this->belongsTo(TipoServicio::class,'id_tiposervicio', 'id_tiposervicio');
    }
}
