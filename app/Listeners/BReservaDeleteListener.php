<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\BitacoraReserva;
use Illuminate\Support\Facades\Auth;

class BReservaDeleteListener
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
        $reserva->accion = 'eliminar';
        $reserva->fecha = now();
        $reserva->hora = now();
        $reserva->id_reserva = $event->breservadelete->id_reserva;
        $reserva->fecha_reserva= $event->breservadelete->fecha_reserva;
        $reserva->hora_reserva = $event->breservadelete->hora_reserva;
        $reserva->ci_cliente = $event->breservadelete->ci_cliente;
        $reserva->ci_empleado = $event->breservadelete->ci_empleado;
        $reserva->nro_mesa = $event->breservadelete->nro_mesa;
        $reserva->save();
    }
}
