<?php

namespace App\Http\Controllers;

use App\Events\BReservaEditEvent;
use App\Events\BReservaDeleteEvent;
use App\Events\BReservaCreateEvent;

use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Mesa;
use App\Models\Reserva;
use Illuminate\Support\Facades\DB;




use Illuminate\Http\Request;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $reservas = DB::table('reservas')
        ->join('clientes','reservas.ci_cliente','=','clientes.ci')->get();


        return view('VistasReservas.index', compact('reservas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $mesas = DB::table('mesas')
                    ->join('tipo_mesas','mesas.id_tipo_mesa','=','tipo_mesas.id_tipo_mesa')->get();
                  //  ->where('estado','Disponible')->get();

     //  $empleados = Empleado::get();
        $clientes = Cliente::get();
        $reservas = DB::table('reservas')
        ->join('clientes','reservas.ci_cliente','=','clientes.ci')->get();
     //   dd($reservas);

        return view('VistasReservas.create', compact('reservas','mesas','clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
     //   dd('llegue a update');
        $reserva = new Reserva();
        $reserva->fecha_reserva = $request->fecha;
        $reserva->hora_reserva = $request->hora;
        $reserva->ci_cliente = $request->ci_cliente;
        $reserva->ci_empleado = 8994432;
        $reserva->nro_mesa = $request->mesa;
        $reserva->save();

        // bitacora
        event(new BReservaCreateEvent($reserva));

        // foreach ($request->nro_mesa as $r) {
        //     $detalles = new DetallesReserva();
        //     $detalles->id_reserva = $reserva->id_reserva;
        //     $detalles->nro_mesa = $r;
        //     $detalles->save();
            $mesa = Mesa::where('nro_mesa',$reserva->nro_mesa)->first();
            $mesa->estado = 'Reserva';
            $mesa->save();
        // }

        return redirect()->route('Reserva.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Reserva $Reserva)
    {
        // bitacora
        event(new BReservaEditEvent($Reserva));

       // dd($Reserva);
        $todos = DB::table('reservas as r')
         ->join('clientes as c','r.ci_cliente','=','c.ci')
         ->join('empleados','r.ci_empleado','=','empleados.ci')
         ->select('r.*','c.nombre_completo as nombre_cliente',
         'empleados.nombre_completo as nombre_empleado')
        ->where('id_reserva',$Reserva->id_reserva)
        ->first();
      //  dd($todos);

      $mesas = DB::table('mesas')
      ->join('tipo_mesas','mesas.id_tipo_mesa','=','tipo_mesas.id_tipo_mesa')
      ->where('estado','Disponible')->get();


    //     $detalles = DB::table('detalles_reservas')
    //     //->join('mesas','detalles_reservas.nro_mesa','=','mesas.nro_mesa')
    //    ->select('detalles_reservas.id_reserva',
    //            'detalles_reservas.nro_mesa')
    //     ->where('detalles_reservas.id_reserva','=',$Reserva->id_reserva)
    //     ->get();
     //  dd($detalles);
        return view('VistasReservas.edit', compact('todos','mesas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reserva $Reserva)
    {
      //  dd($request);
        $Reserva->fecha_reserva = $request->fecha;
        $Reserva->hora_reserva = $request->hora;
        $Reserva->nro_mesa = $request->mesa;
      //  $Reserva->ci_cliente = $request->hora;
        //$Reserva->ci_empleado = $request->;
        $Reserva->save();

        return redirect()->route('Reserva.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reserva = Reserva::find($id);
        $mesa = Mesa::where('nro_mesa',$reserva->nro_mesa)->first();
        $mesa->estado = 'Disponible';
        $mesa->save();

        //bitacora
        event(new BReservaDeleteEvent($reserva));

        $reserva->delete();
        return redirect()->route('Reserva.index');
    }

    //-- BITACORA RESERVAS -----------------------------------------------------------//
    public function bitacoraReservas(){

        $reserva = DB::table('bitacora_reservas as br')
                        // ->when(Request('id'),function($q){
                        //     return $q->where('br.id',Request('id'));
                        // })
                        ->when(Request('user'),function($q){
                            return $q->where('br.user',Request('user'));
                        })
                        ->when(Request('accion'),function($q){
                            return $q->where('br.accion',Request('accion'));
                        })
                        ->when(Request('fecha'),function($q){
                            return $q->where('br.fecha',Request('fecha'));
                        })
                        ->when(Request('hora'),function($q){
                            return $q->where('br.hora',Request('hora'));
                        })
                        ->when(Request('id_reserva'),function($q){
                            return $q->where('br.id_reserva',Request('id_reserva'));
                        })
                        ->when(Request('fecha_reserva'),function($q){
                            return $q->where('br.fecha_reserva',Request('fecha_reserva'));
                        })
                        ->when(Request('hora_reserva'),function($q){
                            return $q->where('br.hora_reserva',Request('hora_reserva'));
                        })
                        ->when(Request('ci_cliente'),function($q){
                            return $q->where('br.ci_cliente',Request('ci_cliente'));
                        })
                        ->when(Request('ci_empleado'),function($q){
                            return $q->where('br.ci_empleado',Request('ci_empleado'));
                        })
                        ->get();

           return view('VistasReservas.bitacoraReservas',compact('reserva'));

        }


}
