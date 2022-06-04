<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'ci';

    public function usuarios(){
        //hasMany{tien mucho} //metodo para dar la primari key
        return $this->hasMany(Usuario::class);
    }
}
