<?php

namespace Any;

use Illuminate\Database\Eloquent\Model;

class Fabrica extends Model
{
    protected $table  = "fabrica";


    protected $fillable = [
       'estado', 'fabricante'
   ];
}
