<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pedido'; //que variable sera la pk
  //  protected $keyType = 'string';  //establecer el tipo de dato de la pk
    public $timestamps = false;

  public function detalle_pedidos(){
       //hasMany{tien mucho} //metodo para dar la primari key
      return $this->hasMany(DetallePedido::class);
  }

  public function recibo(){
    //hasMany{tien mucho} //metodo para dar la primari key
   return $this->hasMany(Recibo::class);
}

  public function mesas(){
    //belongsTo{perteneces a} //metodo para recibir la forieng key
  return $this->belongsTo(Mesas::class);
 }

 public function empleados(){
    //belongsTo{perteneces a} //metodo para recibir la forieng key
  return $this->belongsTo(Empleado::class);
 }

 //SCOPE  , puede recibir de una a muchas varibles
 public function scopeName($query,$name){
 
 }
}
