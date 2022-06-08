<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    use HasFactory;


    protected $primaryKey = 'id_detalle'; //que variable sera la pk
    public $timestamps = false;
 // const CREATED_AT = 'fecha';
    //   protected $keyType = 'string';  //establecer el tipo de dato de la pk

  public function pedidos(){
       //belongsTo{pertenece a} //metodo para recibir la foreing key
      return $this->belongsTo(Pedidos::class);
  }

  public function producto(){
    //hasMany{tien mucho} //metodo para dar la primari key
   return $this->belongsTo(Producto::class);
}

}
