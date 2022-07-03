<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\BitacoraCliente;
use Illuminate\Support\Facades\Auth;

class BClienteDeleteListener
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
        $cliente->accion = 'eliminar';
        $cliente->fecha = now();
        $cliente->hora = now();
        $cliente->ci = $event->bclientedelete->ci;
        $cliente->nombre_completo = $event->bclientedelete->nombre_completo;
        $cliente->telefono = $event->bclientedelete->telefono;
        $cliente->NIT = $event->bclientedelete->NIT;
        $cliente->save();
    }
}
