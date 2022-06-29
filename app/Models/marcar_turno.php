<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class marcar_turno extends Model
{
    use HasFactory;


    public $timestamps = false;
    protected $primaryKey = 'id_turno';


    public function empleados(){
        return $this->belongsTo(Empleado::class);
    }

}
