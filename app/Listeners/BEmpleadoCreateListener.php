<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\BitacoraEmpleado;
use Illuminate\Support\Facades\Auth;

class BEmpleadoCreateListener
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
        $empleado->accion = 'insertar';
        $empleado->fecha = now();
        $empleado->hora = now();
        $empleado->ci = $event->bempleadocreate->ci;
        $empleado->nombre_completo = $event->bempleadocreate->nombre_completo;
        $empleado->telefono = $event->bempleadocreate->telefono;
        $empleado->foto = $event->bempleadocreate->foto;
        $empleado->nombre_usuario = $event->bempleadocreate->usuario;
        $empleado->correo_electronico = $event->bempleadocreate->correo;
        $empleado->save();
    }
}
