<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_turno';

    public function empleado_turnos(){
        //hasMany{tien mucho} //metodo para dar la primari key
        return $this->hasMany(EmpleadoTurno::class);
    }
}
