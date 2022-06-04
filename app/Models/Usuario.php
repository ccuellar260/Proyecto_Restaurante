<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory; //esta clase de laravel
    protected $primaryKey = 'nombre_usuario'; //que variable sera la pk
    protected $keyType = 'string';  //establecer el tipo de dato de la pk

    public function rols(){
        return $this->belongsTo(Rol::class);
    }

    public function empleados(){
        return $this->belongsTo(Empleado::class);
    }
}
