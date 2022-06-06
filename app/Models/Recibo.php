<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recibo extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_recibo'; //que variable sera la pk
    public $timestamps = false;

    public function pedidos(){
        return $this->belongsTo(Pedidos::class);
    }

    public function clientes(){
        return $this->belongsTo(Cliente::class);
    }

}
