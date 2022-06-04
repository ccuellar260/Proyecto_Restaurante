<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;

class RolController extends Controller
{
    public function index(){
        $tabla = Rol::get(); //mostrame los datos de la tabla rol

        return view('VistasRol.indexd',['tabla'=>$tabla]);
    }


    public function create(){
        return view('VistasRol.create');
    }

    public function store(Request $request){
        //metodo yt
        $table =new Rol;
        $table->id_rol = $request->id_rol;
        $table->nombre = $request->nombre;
        $table->descripcion = $request->descripcion;
        $table->save();
        return redirect()->Route('Rol.index');
    }


    public function edit(Rol $Rol){
      //  $fila=Rol::findOrFail($Rol);

        return view('VistasRol.edit',['fila'=>$Rol] );

    }

    public function update(Request $request,Rol $Rol){
        //forma platzi
     /*   $Rol->update([
            'id_rol' => $request->id_rol,
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,

        ]);
        return redirect()->Route('Rol.edit',$Rol->id_rol);
    }*/

    //2da forma de cambiar los datos

    $Rol->id_rol = $request->id_rol;
    $Rol->nombre = $request->nombre;
    $Rol->descripcion = $request->descripcion;

    $Rol->save();
    return redirect()->Route('Rol.index');
    }


    public function destroy(Rol $Rol){
        $Rol->delete();
        return back();
    }
}
