<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; //para qeu era??
use App\Models\User;
use App\Models\Empleado;
use App\Models\Rol;

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
    //verificar contrasena
    /*
    if ( $user->password === md5($r->password)) {
        //hacer login
        Auth::login($user);
        //emcriptar contrasena con clases de laravel


        //generar el token csrf
        $r->session()->regenerate();
        $bienvenida = 'Bienvenido '.(Auth::user()->nombre_usuario);
        //redirecciona a dashboard con una variable status
        return //intended, por sin entra ua una url protegida
               redirect()->intended(Route('Dashboard'))
               ->with('status',$bienvenida);
    } */

    //usandon el Hash::check
    //Hash::check //recibe texo plano password, luego la encriptada en la Tabla
  if ($user != null and  Hash::check($r->password,$user->password)){
    //hacer login
    Auth::login($user);

    //generar el token csrf
    $r->session()->regenerate();



    $bienvenida = 'Bienvenido '.(Auth::user()->nombre_usuario);
    //redirecciona a dashboard con una variable status

     return //intended, por sin entra ua una url protegida
            redirect()->intended(Route('Dashboard'))
            ->with('status',$bienvenida);
 }//false, login incorrecto redireccionar devuelta login
  //distafar un error de validacion





/*
  //  Auth::attempt(['email' => $email, 'password' => $password],true o fals);
  // recibe credenciales y si desea recordar la contra, $recordar
    if (Auth::attempt($credenciales,$recordar)){//Es correcta la autentificacion
       //generar el token csrf
       $r->session()->regenerate();
       $bienvenida = 'Bienvenido '.(Auth::user()->nombre_usuario);
       //redirecciona a dashboard con una variable status
        return //intended, por sin entra ua una url protegida
               redirect()->intended(Route('Dashboard'))
               ->with('status',$bienvenida);
    }//false, login incorrecto redireccionar devuelta login
     //distafar un error de validacion
     */
     throw ValidationException::withMessages([
        //meustra el eeroror del correo
        'correo_electronico'=> __('auth.failed'),
     ]);
   }


   Public function dashboard(){
    $user = Auth::user()->nombre_usuario;
    $empleado = Empleado::where('nombre_usuario',$user)->first();

    $rol= Rol::where('id_rol',Auth::user()->id_rol)->first();

        return view('VistasAuth.dashboard',compact('empleado','rol'));
   }

   public function logout(Request $r){
        Auth::logout();

        //invalidacion la seccion
        $r->session()->invalidate();

        //token crsf
        $r->session()->regenerateToken();

        return redirect()->Route('Login')->with('statusLogout',"Haz cerrado session");
   }
}
