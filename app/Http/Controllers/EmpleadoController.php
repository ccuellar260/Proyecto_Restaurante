<?php

namespace App\Http\Controllers;

use App\Events\BEmpleadoEditEvent;
use App\Events\BEmpleadoDeleteEvent;
use App\Events\BEmpleadoCreateEvent;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; //para ecriptar contra
use App\Models\Empleado;
use App\Models\User;
use App\Models\Mesa;
use App\Models\AsignarMesa;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\EmpleadoTurno;

use Spatie\Permission\Models\Role; //de spity

class EmpleadoController extends Controller
{

    public function index(){
        //$tabla = Empleado::get(); //mostrame los datos de la tabla Empleado
        $tabla = User::join('empleados as e','e.nombre_usuario','=','users.nombre_usuario')->get();

                $mesas = Mesa::get();
                //dd($mesas);
        return view('VistasEmpleado.index',compact('tabla','mesas'));
    }


    public function create(){
        $roles = Role::all()->pluck('name','id');
        return view('VistasEmpleado.create',['roles'=>$roles]);
    }

    public function store(Request $request,Empleado $Empleado){
        //dd($request);
        //validacion, sino cumple retorna a la vista anterior
        $request->validate([
            'telefono' => 'nullable|numeric'
        ]);
        $roles = $request->input('roles', []); //obtenemos los roles
        // dd($roles);
        $us = new User;
        $us->nombre_usuario= $request->usuario;
        $us->correo_electronico = $request->correo;
        $us->password = Hash::make($request->contrasena);
        $us->remember_token = Str::random(10);
        $us->syncRoles($roles); //asignamos los roles al usuario
        $us->fecha_cambio_contra = date('Y-m-d');
        $us->save();

        $table =new Empleado;
        $table->ci = $request->ci;
        $table->nombre_completo = $request->nombre_completo;
        $table->telefono = $request->telefono;
        //existe algun imagen en la fotoxd
        if($request->hasFile('fotoxd')){
            $file = $request->file('fotoxd'); //guardar toda la info la foto en file
            $capetaDestino = 'img/fotosEmpleados/';  //carpeta de destino
            $nombreArchivo = time().'-'.$file->getClientOriginalName();//de file sacame el nombre
            //mover la foto a la capeta de destino y su nombre
            //dd($nombreArchivo);
            $subirImagen = $request->file('fotoxd')->move($capetaDestino,$nombreArchivo);
         }else{
             $nombreArchivo = "perfil_falso.png";
         }
         $table->foto = $nombreArchivo;
        $table->nombre_usuario = $request->usuario;
        $table->save();


        $asignar = new EmpleadoTurno();
        $asignar->id_turno = 1;
        $asignar->id_empleado = $table->ci;
        $asignar->save();



        event(new BEmpleadoCreateEvent($request));

        return redirect()->Route('Empleado.index');
    }

    public function edit(Empleado $Empleado){
        $fila = User::join('empleados as e','e.nombre_usuario','=','users.nombre_usuario')
        ->where('e.ci',$Empleado->ci)->first()->load('roles');
       // dd($fila->roles[0]->name);
    //    $user_roles = User::where('nombre_usuario',$fila->nombre_usuario)
    //    ->first()->load('roles');
    //  dd($user_roles);

        $roles = Role::all()->pluck('name','id');
     //    dd($roles);

        return view('VistasEmpleado.edit',compact('fila','roles'));
    }

    public function update(Request $request,Empleado $Empleado){

        //bitacora
        event(new BEmpleadoEditEvent($request));


        //dd($request);
        $roles = $request->input('roles', []);
        $user = User::where('nombre_usuario',$Empleado->nombre_usuario)->first();
        $user->correo_electronico = $request->correo;
        $user->syncRoles($roles);
        //falta hacer pa las contras o nose xd xd xd
        $user->save();

        if($request->hasFile('foto')){
            $file = $request->file('foto'); //guardar toda la info la foto en file
            $capetaDestino = 'img/fotosEmpleados/';  //carpeta de destino
            $nombreArchivo = time().'-'.$file->getClientOriginalName();//de file sacame el nombre
            $subirImagen = $request->file('foto')->move($capetaDestino,$nombreArchivo);
            $Empleado->foto = $nombreArchivo;
        }
        $Empleado->nombre_completo = $request->nombre_completo;
        $Empleado->telefono = $request->telefono;
        $Empleado->save();
        return redirect()->Route('Empleado.index');
}

    public function destroy(Empleado $Empleado){

      $user =  $tabla = User::join('empleados as e','e.nombre_usuario','=','users.nombre_usuario')
                        ->where('e.nombre_usuario', $Empleado->nombre_usuario)->first();

        // bitacora
        event(new BEmpleadoDeleteEvent($user));

        $user->delete();

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
                        ->get();

           return view('VistasEmpleado.bitacoraEmpleados',compact('empleado'));

        }
}
