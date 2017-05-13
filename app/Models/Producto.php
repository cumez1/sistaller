<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class Producto extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id_producto';

    public $timestamps = false;

    protected $fillable = ['id_categoria','nombre','descripcion','marca','precio','stock','activo'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class,'id_categoria', 'id_categoria');
    }


    public function getIdCategoriaAttribute($value)
    {
        $categoria = Categoria::select('nombre')->where('id_categoria','=',$value)->first();

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
