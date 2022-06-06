<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpleadoTurno extends Model
{
    use HasFactory;

    public $timestamps = false;
 //   protected $primaryKey = 'id';


    public function empleados(){
        return $this->belongsTo(Empleado::class);
    }


    public function turnos(){
        return $this->belongsTo(Turno::class);
    }


}
