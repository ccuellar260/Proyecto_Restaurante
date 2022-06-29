<?php

namespace App\Http\Controllers;

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

                //dd($tabla);
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
        return redirect()->Route('Empleado.index');
    }

    public function edit(Empleado $Empleado){
        $fila = User::join('rols as r','r.id_rol','=','users.id_rol')
        ->join('empleados as e','e.nombre_usuario','=','users.nombre_usuario')
        ->where('e.ci',$Empleado->ci)->first();
        return view('VistasEmpleado.edit',compact('fila'));
    }

    public function update(Request $request,Empleado $Empleado){
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
       // $Empleado->delete();
        User::where('nombre_usuario',$Empleado->nombre_usuario)->delete();
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
}
