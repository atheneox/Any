<?php

namespace Any;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = "producto";

    protected $fillable = [
       'producto', 'codigobarra', 'codigoproducto', 'descripcion', 'estado', 'fabrica_id',
    ];

    public function fabrica() {
        return $this->hasOne('Any\Fabrica', 'id', 'fabrica_id');
    }
}
