<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignarMesa extends Model
{
    use HasFactory;

    public $timestamps = false;
  //  protected $primaryKey = 'id_ambi';

   public function mesas(){
        $this->belongsTo(Mesa::class);
    }

    public function empleados(){
        $this->belongsTo(Empleado::class);
    }
}
