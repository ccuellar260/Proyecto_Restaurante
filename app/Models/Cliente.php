<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;//para combetir en minuscula lso nombres

class Cliente extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'ci';

    public function reservas(){

        return $this->hasMany(Reserva::class);
    }

    protected function nombreCompleto(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucwords($value),
            set: fn ($value) => strtolower($value),
        );
    }
}
