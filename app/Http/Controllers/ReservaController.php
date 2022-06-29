<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\DetallesReserva;
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
    public function index()
    {

        $reservas = DB::table('reservas')
        ->join('clientes','reservas.ci_cliente','=','clientes.ci')->get();

        $detalles = DB::table('detalles_reservas')
        ->join('mesas','detalles_reservas.nro_mesa','=','mesas.nro_mesa')->get();

        return view('VistasReservas.index', compact('reservas','detalles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mesas = DB::table('mesas')
                    ->join('tipo_mesas','mesas.id_tipo_mesa','=','tipo_mesas.id_tipo_mesa')
                    ->where('estado','Disponible')->get();
     //   $empleados = Empleado::get();
        $clientes = Cliente::get();
        $reservas = DB::table('reservas')
        ->join('clientes','reservas.ci_cliente','=','clientes.ci')
        ->join('empleados','reservas.ci_empleado','=','empleados.ci')
        ->join('detalles_reservas','reservas.id_reserva','=','detalles_reservas.id_reserva')
        ->select('detalles_reservas.cantidad',
        'reservas.id_reserva','reservas.fecha_reserva as fecha','reservas.hora_reserva as hora',
        'clientes.nombre_completo as nombre_cliente','clientes.ci as ci_cliente',
        'empleados.nombre_completo as nombre_empleado','empleados.ci as ci_empleado')
        ->get();
        return view('VistasReservas.create', compact('reservas','mesas','clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $reserva = new Reserva();
        $reserva->fecha_reserva = $request->fecha;
        $reserva->hora_reserva = $request->hora;
        $reserva->ci_cliente = $request->ci_cliente;
        $reserva->ci_empleado = 8994432;
        $reserva->save();

        foreach ($request->nro_mesa as $r) {
            $detalles = new DetallesReserva();
            $detalles->id_reserva = $reserva->id_reserva;
            $detalles->nro_mesa = $r;
            $detalles->cantidad = $request->cantidad;
            $detalles->save();
            $mesa = Mesa::where('nro_mesa',$r)->first();
            $mesa->estado = 'Reserva';
            $mesa->save();
        }

        return redirect()->route('Reserva.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        //dd($Reserva);
        $todos = DB::table('reservas')
        ->join('clientes','reservas.ci_cliente','=','clientes.ci')
        ->join('empleados','reservas.ci_empleado','=','empleados.ci')
        ->select('reservas.id_reserva as id_reserva','reservas.fecha_reserva as fecha',
        'reservas.hora_reserva as hora','clientes.nombre_completo as nombre_cliente',
        'clientes.ci as ci_cliente',
        'empleados.nombre_completo as nombre_empleado')
        ->first();

        $mesas = Mesa::get();

        $detalles = DB::table('detalles_reservas')
        ->join('mesas','detalles_reservas.nro_mesa','=','mesas.nro_mesa')
        ->select('detalles_reservas.id_reserva',
                'detalles_reservas.nro_mesa',
                'detalles_reservas.cantidad')
        ->where('detalles_reservas.id_reserva','=',$Reserva->id_reserva)
        ->get();
        //dd($detalles);
        return view('VistasReservas.edit', compact('todos','mesas','detalles'));
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
        dd($request);
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
        $reserva->delete();
        return redirect()->route('Reserva.index');
    }




}
