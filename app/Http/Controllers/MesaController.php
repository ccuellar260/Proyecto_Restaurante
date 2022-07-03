<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use App\Models\Ambiente;
use App\Models\TipoMesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MesaController extends Controller
{
    public function index(){

        $tabla = DB::table('mesas')
            ->join('ambientes','mesas.id_ambiente','=','ambientes.id_ambiente')
            ->join('tipo_mesas','mesas.id_tipo_mesa','=','tipo_mesas.id_tipo_mesa')
            ->select('mesas.nro_mesa','mesas.estado','ambientes.nombre as nombre','tipo_mesas.mesa as mesa')
            ->get();

        return view('VistasMesas.index',compact('tabla'));
        //['tabla'=>$tabla, 'ambiente'=>$ambiente]
    }

    public function listas(){

        $tabla = DB::table('mesas')
            ->join('ambientes','mesas.id_ambiente','=','ambientes.id_ambiente')
            ->join('tipo_mesas','mesas.id_tipo_mesa','=','tipo_mesas.id_tipo_mesa')
            ->select('mesas.nro_mesa','mesas.estado','ambientes.nombre as nombre','tipo_mesas.mesa as mesa')
            ->get();

        return view('VistasMesas.listaMesas',compact('tabla'));
    }


    public function create(){
        $tipo = DB::table('tipo_mesas')->get();
        $ambiente = DB::table('ambientes')->get();
        return view('VistasMesas.create',compact('tipo','ambiente'));
    }

    public function store(Request $request){
        //metodo yt
        $table = new Mesa();
        $table->estado = $request->estado;
        $table->id_tipo_mesa = $request->mesa;
        $table->id_ambiente = $request->Ubicacion;
    //    $table->ci_empleado = $request->empleado;
        $table->save();

        return redirect()->route('Mesas.index');
    }


    public function edit(Mesa $Mesa){

        $Mesa = Mesa::join('tipo_mesas',
                      'tipo_mesas.id_tipo_mesa','=','mesas.id_tipo_mesa')
                      ->join('ambientes as a','a.id_ambiente','=','mesas.id_ambiente')
                      ->where('nro_mesa',$Mesa->nro_mesa)->first();

        $tipo = DB::table('tipo_mesas')->get();
        $ambiente = DB::table('ambientes')->get();

        return view('VistasMesas.edit',['mesa'=>$Mesa,'tipo'=>$tipo,'ambiente'=>$ambiente]);
    }

    public function update(Request $request,Mesa $Mesa){
        $Mesa->estado = $request->estado;
        $Mesa->id_tipo_mesa = $request->mesa;
        $Mesa->id_ambiente = $request->Ubicacion;
        $Mesa->save();

        return redirect()->route('Mesas.index');
    }


    public function destroy(Mesa $Mesa){
        $Mesa->delete();
        return redirect()->route('Mesas.index');
    }
}
