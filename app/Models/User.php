<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'nombre_usuario'; //que variable sera la pk
    protected $keyType = 'string';  //establecer el tipo de dato de la pk
   // protected $table = 'usuaarios'; //para cambiar el nombre a la tabla

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    //lo que se debe rellenar
    protected $fillable = [
        'nombre_usuario',
        'correo_electronico',
        'password',
        'id_rol',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

     //ocualtar variables en el navegador
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    //para trabajr con la fecha
    //protected $casts = [
      //  'email_verified_at' => 'datetime',
    //];

    public function rols(){
          //belongsTo{perteneces a} //metodo para recibir la forieng key
        return $this->belongsTo(Rol::class);
    }

    public function empleados(){
         //hasMany{tien mucho} //metodo para dar la primari key
        return $this->hasMany(Empleado::class);
    }
}
