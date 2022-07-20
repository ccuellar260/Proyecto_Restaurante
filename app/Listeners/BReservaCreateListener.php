<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\BitacoraReserva;
use Illuminate\Support\Facades\Auth;

class BReservaCreateListener
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
        $reserva = new BitacoraReserva();
        $reserva->user = Auth::user()->nombre_usuario;
        $reserva->accion = 'insertar';
        $reserva->fecha = now();
        $reserva->hora = now();
        $reserva->id_reserva = $event->breservacreate->id_reserva;
        $reserva->fecha_reserva= $event->breservacreate->fecha_reserva;
        $reserva->hora_reserva = $event->breservacreate->hora_reserva;
        $reserva->ci_cliente = $event->breservacreate->ci_cliente;
        $reserva->ci_empleado = $event->breservacreate->ci_empleado;
        $reserva->nro_mesa = $event->breservacreate->nro_mesa;
        $reserva->save();
    }
}
