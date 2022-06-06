<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMesa extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_tipo_mesa';

    public function mesas(){
        //hasMany{tien mucho} //metodo para dar la primari key
       return $this->hasMany(Mesa::class);
   }
}
