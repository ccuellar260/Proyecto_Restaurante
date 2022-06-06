<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_producto';

    public function tipo_productos(){
        //belongsTo{perteneces a} //metodo para recibir la forieng key
      return $this->belongsTo(TipoProducto::class);
  }

  public function detalles_pedidos(){
    //belongsTo{perteneces a} //metodo para recibir la forieng key
  return $this->hasMany(DetallePedido::class);
}

}
