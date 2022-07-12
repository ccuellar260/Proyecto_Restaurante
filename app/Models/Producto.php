<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;//para combetir en minuscula lso nombres

class Producto extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_producto';
    //public $timestamps = false;

    public function tipo_productos(){
        //belongsTo{perteneces a} //metodo para recibir la forieng key
      return $this->belongsTo(TipoProducto::class);
  }

    public function detalles_pedidos(){
        //belongsTo{perteneces a} //metodo para recibir la forieng key
    return $this->hasMany(DetallePedido::class);
    }


    // mutador / metodo para poner en minuscula todos los datos ingresados
    protected function nombre():Attribute{
        return new Attribute(
            get: function($value){
                return ucwords($value);
                },
            set: function($value){
                return strtolower($value);
                }
            );

    }

}
