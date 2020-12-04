<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = ['Nombre','Apellido','Telefono', 'Mail','Direccion'];
}
