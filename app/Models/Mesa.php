<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'nro_mesa';

    public function tipo_mesas(){
        //belongsTo{perteneces a} //metodo para recibir la forieng key
      return $this->belongsTo(TipoMesa::class);
  }

  public function pedidos(){
    //hasMany{tien mucho} //metodo para dar la primari key
   return $this->hasMany(Pedido::class);
    }




    public function ambientes(){
        //belongsTo{perteneces a} //metodo para recibir la forieng key
    return $this->belongsTo(Ambiente::class);
    }

    public function empleados(){
        //belongsTo{perteneces a} //metodo para recibir la forieng key
    return $this->belongsTo(Empleado::class);
    }
}
