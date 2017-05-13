<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'id_categoria';

    public $timestamps = false;

    protected $fillable = ['nombre','descripcion','activo'];

    public function productos()
    {
        return $this->hasMany(Producto::class,'id_categoria', 'id_categoria');
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
