<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\BitacoraEmpleado;
use Illuminate\Support\Facades\Auth;

class BEmpleadoDeleteListener
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
        $empleado->accion = 'eliminar';
        $empleado->fecha = now();
        $empleado->hora = now();
        $empleado->ci = $event->bempleadodelete->ci;
        $empleado->nombre_completo = $event->bempleadodelete->nombre_completo;
        $empleado->telefono = $event->bempleadodelete->telefono;
        $empleado->foto = $event->bempleadodelete->foto;
        $empleado->nombre_usuario = $event->bempleadodelete->nombre_usuario;
        $empleado->correo_electronico = $event->bempleadodelete->correo_electronico;
        $empleado->id_rol = $event->bempleadodelete->id_rol;
        $empleado->save();
    }
}
