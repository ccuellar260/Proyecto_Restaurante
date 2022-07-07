<?php

namespace App\Http\Controllers;

use App\Events\BEmpleadoEditEvent;
use App\Events\BEmpleadoDeleteEvent;
use App\Events\BEmpleadoCreateEvent;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; //para ecriptar contra
use App\Models\Empleado;
use App\Models\User;
use App\Models\Rol;
use App\Models\Mesa;
use App\Models\AsignarMesa;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class EmpleadoController extends Controller
{

    public function index(){
        //$tabla = Empleado::get(); //mostrame los datos de la tabla Empleado
        $tabla = User::join('rols as r','r.id_rol','=','users.id_rol')
                ->join('empleados as e','e.nombre_usuario','=','users.nombre_usuario')->get();

                $mesas = Mesa::get();
                //dd($mesas);
        return view('VistasEmpleado.index',compact('tabla','mesas'));
    }


    public function create(){
        $Rol = Rol::get();
        return view('VistasEmpleado.create',['Rol'=>$Rol]);
    }

    public function store(Request $request,Empleado $Empleado){

        //validacion, sino cumple retorna a la vista anterior
        // $request->validate([
        //     'usuario' => 'required',
        //     'Rol'     => 'required',
        //     'correo'  => 'required',
        //     'contrasena'=> 'required',
        //     'ci'        => 'required',
        //     'nombre_completo'=> 'required',
        //     'telefono' => 'required',
        // ]);

        $us = new User;
        $us->nombre_usuario= $request->usuario;
        $us->correo_electronico = $request->correo;
        $us->password = Hash::make($request->contrasena);
        $us->remember_token = Str::random(10);
        $us->id_rol = $request->Rol;
        $us->save();

        $table =new Empleado;
        $table->ci = $request->ci;
        $table->nombre_completo = $request->nombre_completo;
        $table->telefono = $request->telefono;
        $table->foto = $request->foto;
        $table->nombre_usuario = $request->usuario;
        $table->save();

        event(new BEmpleadoCreateEvent($request));

        return redirect()->Route('Empleado.index');
    }

    public function edit(Empleado $Empleado){
        $fila = User::join('rols as r','r.id_rol','=','users.id_rol')
        ->join('empleados as e','e.nombre_usuario','=','users.nombre_usuario')
        ->where('e.ci',$Empleado->ci)->first();
        return view('VistasEmpleado.edit',compact('fila'));
    }

    public function update(Request $request,Empleado $Empleado){

        event(new BEmpleadoEditEvent($request));


        // Probando una validacion atte: Julico
        // Aqui dice lo siguiente:
        // El campo correo_electronico es requerido con el formato email y es unico de la tabla usuario en el campo correo_electronico
        // lo ultimo es una condicion para que al actualizar el correo no podamos poner el correo existente de otro usuario.

        /*
        $request->validate([
            'correo_electronico'   =>  'required|email|unique:User,correo_electronico,'.$user->nombre_usuario.',nombre_usuario',
        ]);
        */

        $user = User::where('nombre_usuario',$Empleado->nombre_usuario)->first();
        $user->correo_electronico = $request->correo;
        $user->save();

        // $Empleado->ci = $request->ci;
        $Empleado->nombre_completo = $request->nombre_completo;
        $Empleado->telefono = $request->telefono;
        $Empleado->save();
        return redirect()->Route('Empleado.index');
}

    public function destroy(Empleado $Empleado){

      $user =  $tabla = User::join('empleados as e','e.nombre_usuario','=','users.nombre_usuario')
                        ->where('e.nombre_usuario', $Empleado->nombre_usuario)->first();

        event(new BEmpleadoDeleteEvent($user));
        $Empleado->delete();

        return back();
    }

    public function asignarMesa(Empleado $ci){
        //mostrar mesas igual a null, que no tengan empleado
        $mesas = Mesa::whereNull('ci_empleado')->get();
        return view('VistasEmpleado.asignarMesa',['empleado'=> $ci,
                    'mesas'=>$mesas
                    ]);
    }

    public function StoreAsignarMesa($ci,Request $r){
        foreach ($r->mesa as $m) {
            $mesa = Mesa::where('nro_mesa',$m)->first();
            $mesa->ci_empleado = $ci;
            $mesa->save();
        }
        return  redirect()->Route('Empleado.index',$ci);

    }

    public function MesasAsignadas(){
        $user = User::where('nombre_usuario',auth()->user()->nombre_usuario)->first();
        $empleado = Empleado::where('nombre_usuario',$user->nombre_usuario)->first();
        $mesas = Mesa::where('ci_empleado',$empleado->ci)->get();
        return view('VistasEmpleado.index',compact('mesas'));
    }

    public function bitacoraEmpleados(){

        $empleado = DB::table('bitacora_empleados as be')
                        // ->when(Request('id'),function($q){
                        //     return $q->where('be.id',Request('id'));
                        // })
                        ->when(Request('user'),function($q){
                            return $q->where('be.user',Request('user'));
                        })
                        ->when(Request('accion'),function($q){
                            return $q->where('be.accion',Request('accion'));
                        })
                        ->when(Request('fecha'),function($q){
                            return $q->where('be.fecha',Request('fecha'));
                        })
                        ->when(Request('hora'),function($q){
                            return $q->where('be.hora',Request('hora'));
                        })
                        ->when(Request('ci'),function($q){
                            return $q->where('be.ci',Request('ci'));
                        })
                        ->when(Request('nombre_completo'),function($q){
                            return $q->where('be.nombre_completo',Request('nombre_completo'));
                        })
                        ->when(Request('telefono'),function($q){
                            return $q->where('be.telefono',Request('telefono'));
                        })
                        ->when(Request('foto'),function($q){
                            return $q->where('be.foto',Request('foto'));
                        })
                        ->when(Request('nombre_usuario'),function($q){
                            return $q->where('be.nombre_usuario',Request('nombre_usuario'));
                        })
                        ->when(Request('correo_electronico'),function($q){
                            return $q->where('be.correo_electronico',Request('correo_electronico'));
                        })
                        ->when(Request('id_rol'),function($q){
                            return $q->where('be.id_rol',Request('id_rol'));
                        })
                        ->get();

           return view('VistasEmpleado.bitacoraEmpleados',compact('empleado'));

        }
}
