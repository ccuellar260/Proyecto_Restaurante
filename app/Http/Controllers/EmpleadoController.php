<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\User;
use App\Models\Rol;
use Illuminate\Support\Str;

class EmpleadoController extends Controller
{

    public function index(){
        $tabla = Empleado::get(); //mostrame los datos de la tabla Empleado

        return view('VistasEmpleado.index',['tabla'=>$tabla]);
    }


    public function create(){
        $Rol = Rol::get();
        return view('VistasEmpleado.create',['Rol'=>$Rol]);
    }

    public function store(Request $request){
        //validacion, sino cumple retorna a la vista anterior
        $request->validate([
            'usuario' => 'required',
            'Rol'     => 'required',
            'correo'  => 'required',
            'contrasena'=> 'required',
            'ci'        => 'required',
            'nombre_completo'=> 'required',
            'telefono' => 'required',
        ]);


        $us = new User;
        $us->nombre_usuario= $request->usuario;
        $us->correo_electronico = $request->correo;
        $us->password = $request->contrasena;
        $us->remember_token = Str::random(10);
        $us->id_rol = $request->Rol;
        $us->save();

        $table =new Empleado;
        $table->ci = $request->ci;
        $table->nombre_completo = $request->nombre_completo;
        $table->telefono = $request->telefono;
        $table->nombre_usuario = $request->usuario;
        $table->save();
        return redirect()->Route('Empleado.index');
    }


    public function edit(Empleado $Empleado){
      //  $fila=Empleado::findOrFail($Empleado);

        return view('VistasEmpleado.edit',['fila'=>$Empleado] );

    }

    public function update(Request $request,Empleado $Empleado){
      /*  $Empleado->update([
            'ci' => $request->ci,
            'nombre_completo' => $request->nombre_completo,
            'telefono' => $request->telefono,

        ]);
        return redirect()->Route('VistasEmpleado.edit',$Empleado->ci);
    } */

    //2da forma de cambiar los datos
    $Empleado->ci = $request->ci;
    $Empleado->nombre_completo = $request->nombre_completo;
    $Empleado->telefono = $request->telefono;

    $Empleado->save();
    return redirect()->Route('Empleado.index');
}


    public function destroy(Empleado $Empleado){
        $Empleado->delete();
        return back();
    }
}
