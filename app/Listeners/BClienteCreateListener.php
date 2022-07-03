<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\BitacoraCliente;
use Illuminate\Support\Facades\Auth;

class BClienteCreateListener
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
        $cliente = new BitacoraCliente();
        $cliente->user = Auth::user()->nombre_usuario;
        $cliente->accion = 'insertar';
        $cliente->fecha = now();
        $cliente->hora = now();
        $cliente->ci = $event->bclientecreate->ci;
        $cliente->nombre_completo = $event->bclientecreate->nombre_completo;
        $cliente->telefono = $event->bclientecreate->telefono;
        $cliente->NIT = $event->bclientecreate->NIT;
        $cliente->save();
    }
}
