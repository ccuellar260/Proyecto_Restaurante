<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; //para encriptar contrasenas
use App\Models\User;
use App\Models\Empleado;

use App\Models\marcar_turno;
use App\Models\EmpleadoTurno;
use App\Models\Turno;
use App\Models\BitacoraSesion;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;

use App\Events\ResetearProductosEvent;
use App\Events\ResetProductosEvent;
use App\Events\CambioContrasenaEvent;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;


class AuthController extends Controller
{

    public function login(){
        return view('VistasAuth.login');
    }

   public function loginStore(Request $r){
       //del request solo sacame correo y contrasena
    $credenciales = $r->validate([
        'correo_electronico' =>['required','email','string'],
        'password'=>['required','string']
        ]);

    //filled, devuelve V o F si se dio click al inout recordar
    $recordar = $r->filled('recordar');

    //sacar la tabla donde este esee correo
    $user = User::where('correo_electronico',$r->correo_electronico)
                  ->first();

    //usandon el Hash::check
    //Hash::check //recibe texo plano password, luego la encriptada en la Tabla
  if ($user != null and Hash::check($r->password,$user->password)){
      //hacer login
      Auth::login($user);

      //generar el token csrf
      $r->session()->regenerate();

    // se esta registrando la bitacora de inicio de sesion del usuario
    $usuario = Auth::user()->nombre_usuario;
    $usuario = User::where('nombre_usuario', $usuario)->first();

    $bUser = new BitacoraSesion();
    $bUser->estado = 'login';
    $bUser->nombre_usuario = $usuario->nombre_usuario;
    $bUser->fecha = now();
    $bUser->hora = now();
    $bUser->correo_electronico = $usuario->correo_electronico;
    $bUser->save();
    // resetear automaticamente la cantidad disponible de los productos
    //now())->get() Producto::whereDate('updated_at', '<>',"now")
    //event(new ResetProductosEvent());

    $bienvenida = 'Bienvenido '.(Auth::user()->nombre_usuario);
    //redirecciona a dashboard con una variable status

     return //intended, por sin entra ua una url protegida
            redirect()->intended(Route('Dashboard'))
            ->with('status',$bienvenida);
 }//false, login incorrecto redireccionar devuelta login
  //distafar un error de validacion
     if ($user == null){ //si es nulo, significa que no encontro el correo
        throw ValidationException::withMessages([
            //meustra el eeroror del correo
            'correo'=> 'Correo no encontrado',
         ]);
    }else {
        throw ValidationException::withMessages([
            //meustra el eeroror del correo
            'password'=> 'Contrasena Incorrecta',
        ]);
    }
   }


   Public function dashboard(){

    // $user = User::where('nombre_usuario',$event->user)->first();
    //     $fecha1= $user->fecha_cambio_contra;
    //   //  $fecha2 = date('Y-m-d');
    //     $fecha2 = "2022-09-19";

    //     $diferencia = date_diff(date_create($fecha1), date_create($fecha2))->format('%R%a');
    //   //  dd($diferencia);
    //     if(intval($diferencia) > 15){
    //         dd('entre');
    //     }dd('no entre');

 //   event(new CambioContrasenaEvent($user));
    event(new ResetProductosEvent());
    $user = Auth::user()->nombre_usuario;
    $empleado = Empleado::where('nombre_usuario',$user)->first();
    $marcaciones = marcar_turno::where('id_empleado',$empleado->ci)->get();
    $empleado_turno = EmpleadoTurno::where('id_empleado',$empleado->ci)->first();

    $turno = Turno::where('id_turno',$empleado_turno->id_turno)->first();

    $rol= User::where('nombre_usuario',$user)->first()->load('roles');


   $fecha1= Auth::user()->fecha_cambio_contra;
    //  $fecha2 = date('Y-m-d');
    $fecha2 = "2022-12-19";
    $diferencia = date_diff(date_create($fecha1), date_create($fecha2))->format('%R%a');


    return view('VistasAuth.dashboard',compact('empleado','rol','marcaciones','turno','diferencia'));
  }

   public function logout(Request $r){

        //ta registrando la bitacora de cerrando seccion del usuario
        $usuario = Auth::user()->nombre_usuario;
        $usuario = User::where('nombre_usuario', $usuario)->first();

        $bUser = new BitacoraSesion();
        $bUser->estado = 'logout';
        $bUser->nombre_usuario = $usuario->nombre_usuario;
        $bUser->fecha = now();
        $bUser->hora = now();
        $bUser->correo_electronico = $usuario->correo_electronico;
        $bUser->save();
        //////////////////////////////////////////////////////////////////

        Auth::logout();

        //invalidacion la seccion
        $r->session()->invalidate();

        //token crsf
        $r->session()->regenerateToken();

        return redirect()->Route('Login')->with('statusLogout',"Haz cerrado session");
   }

   public function resertContrasena(Request $r){
        //correo contrasena
        $user = User::where('correo_electronico',$r->emailRestore)->first();
        if(is_null($user)){
            throw ValidationException::withMessages([
                //meustra el eeroror del correo
                'correoRestore'=> 'Correo no encontrado',
             ]);
        }
        return view('VistasAuth.resertContrasena',compact('user'));
   }

    public function updateContrasena(Request $r,User $user){

        //verificar si las contrasena son correctas
        if($r->password == $r->password1){
            $user->password = Hash::make($r->password);
            $user->save();
            return redirect()->Route('Login')->with('statusContra','CONTRASENA RESTABLECIDA');
        }
        throw ValidationException::withMessages([
            //meustra el eeroror del correo
            'passwordxd'=> 'Las contrasenas no coinciden!!',
         ]);
         return view('VistasAuth.resertContrasena',compact('user'));
    }


   public function marcarEntrada(marcar_turno $marcar_turno){
    $user = Auth::user()->nombre_usuario;
    $empleado = Empleado::where('nombre_usuario',$user)->first();
    $marcar_turno->id_empleado = $empleado->ci;
    $marcar_turno->fecha = date('Y-m-d');
    $marcar_turno->marcar_entrada = date('H:i:s');
    $marcar_turno->save();
    return redirect()->Route('Dashboard')->with('status',"Has marcado tu entrada");
   }

   public function marcarSalida(Request $r,marcar_turno $marcado){
    //dd($marcado);
    $marcado->marcar_salida = date('H:i:s');
    $marcado->save();
    return redirect()->Route('Dashboard')->with('status',"Has marcado tu salida");
   }

    //-- BITACORA SECIONES -----------------------------------------------------------//
    public function bitacoraSeciones(){

      $sesion = DB::table('bitacora_sesions as bs')
                      // ->when(Request('id'),function($q){
                      //     return $q->where('bs.id',Request('id'));
                      // })
                      ->when(Request('estado'),function($q){
                          return $q->where('bs.estado',Request('estado'));
                      })
                      ->when(Request('nombre_usuario'),function($q){
                          return $q->where('bs.nombre_usuario',Request('nombre_usuario'));
                      })
                      ->when(Request('fecha'),function($q){
                          return $q->where('bs.fecha',Request('fecha'));
                      })
                      ->when(Request('hora'),function($q){
                          return $q->where('bs.hora',Request('hora'));
                      })
                      ->when(Request('correo_electronico'),function($q){
                          return $q->where('bs.correo_electronico',Request('correo_electronico'));
                      })
                      ->get();

         return view('VistasAuth.bitacoraSeciones',compact('sesion'));

      }

}
