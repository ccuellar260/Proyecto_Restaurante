<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallesReserva extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_detalle';

    public function reservas(){

        return $this->belongsTo(Reserva::class);
    }


    public function mesas(){

        return $this->belongsTo(Mesa::class);
    }
}
