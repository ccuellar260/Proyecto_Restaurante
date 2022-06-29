<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use App\Models\Empleado;
use App\Models\EmpleadoTurno;
use App\Models\marcar_turno;

use Illuminate\Http\Request;


class TurnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turnos = Turno::get();


        return view('VistasTurno.index', compact('turnos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $turnos = Turno::get();
        return view('VistasTurno.create', compact('turnos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $turno = new Turno();
        $turno->descripcion = $request->descripcion;
        $turno->hora_entrada = $request->hora_entrada;
        $turno->hora_salida = $request->hora_salida;
        $turno->save();
        return redirect()->route('Turno.index');
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
    public function edit($id)
    {
        //

        $turno = Turno::find($id);
        return view('VistasTurno.edit', compact('turno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $turno = Turno::find($id);
        $turno->descripcion = $request->descripcion;
        $turno->hora_entrada = $request->hora_entrada;
        $turno->hora_salida = $request->hora_salida;
        $turno->save();
        return redirect()->route('Turno.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $turno = Turno::find($id);
        $turno->delete();
        return redirect()->route('Turno.index');

    }

    public function Asignar(){
        $turnos = Turno::get();
        $empleados = Empleado::get();
        return view('VistasTurno.asignar', compact('turnos', 'empleados'));

    }

    public function AsignarTurno(Request $request){
        //dd($request);
        $asignar = new EmpleadoTurno();
        $asignar->id_turno = $request->id_turno;
        $asignar->id_empleado = $request->id_empleado;
        $asignar->save();
        return redirect()->route('Turno.index');
    }
}
