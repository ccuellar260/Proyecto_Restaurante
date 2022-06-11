<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambiente extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_ambiente';


    public function mesas(){

        return $this->hasMany(Mesa::class);
    }
}
