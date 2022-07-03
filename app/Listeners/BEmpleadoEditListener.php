<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\BitacoraEmpleado;
use Illuminate\Support\Facades\Auth;

class BEmpleadoEditListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $empleado = new BitacoraEmpleado();
        $empleado->user = Auth::user()->nombre_usuario;
        $empleado->accion = 'editar';
        $empleado->fecha = now();
        $empleado->hora = now();
        $empleado->ci = $event->bempleadoedit->ci;
        $empleado->nombre_completo = $event->bempleadoedit->nombre_completo;
        $empleado->telefono = $event->bempleadoedit->telefono;
        $empleado->foto = 'sin foto';
        $empleado->nombre_usuario = $event->bempleadoedit->nombre_usuario;
        $empleado->correo_electronico = $event->bempleadoedit->correo;
        $empleado->id_rol = $event->bempleadoedit->rol;
        $empleado->save();
    }
}
