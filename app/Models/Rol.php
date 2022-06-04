<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    public $timestamps = false; // desabilitar el time
    protected $primaryKey = 'id_rol'; //cambiar la primai key


    public function usuarios(){
        //hasMany{tien mucho} //metodo para dar la primari key
        return $this->hasMany(Usuario::class);
    }
}
