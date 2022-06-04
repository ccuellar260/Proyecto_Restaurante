<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{

    public function index(){
        $tabla = Empleado::get(); //mostrame los datos de la tabla Empleado

        return view('VistasEmpleado.index',['tabla'=>$tabla]);
    }


    public function create(){
        return view('VistasEmpleado.create');
    }

    public function store(Request $request){
        //metodo yt
        $table =new Empleado;
        $table->ci = $request->ci;
        $table->nombre_completo = $request->nombre_completo;
        $table->telefono = $request->telefono;
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
