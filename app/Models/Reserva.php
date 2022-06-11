<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_reserva';

    public function detalle_reservas(){
        return $this->hasMany(DetallesReserva::class);
    }

    public function clientes(){
        return $this->belongsTo(Cliente::class);
    }

    public function empleados(){
        return $this->belongsTo(Empleado::class);
    }
}
