<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'ci';

    public function users(){

        return $this->belongsTo(User::class);
    }


    public function empleado_turnos(){
        //hasMany{tien mucho} //metodo para dar la primari key
        return $this->hasMany(EmpleadoTurno::class);
    }

    public function pedidos(){
        //hasMany{tien mucho} //metodo para dar la primari key
       return $this->hasMany(Pedido::class);
   }

   public function mesas(){
    //hasMany{tien mucho} //metodo para dar la primari key
   return $this->hasMany(Mesa::class);
}

}
