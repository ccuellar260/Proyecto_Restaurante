<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'ci';

    public function reservas(){

        return $this->hasMany(Reserva::class);
    }
}
