<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_tipo_plato';

    public function productos(){
        //hasMany{tien mucho} //metodo para dar la primari key
       return $this->hasMany(Producto::class);
   }
}
