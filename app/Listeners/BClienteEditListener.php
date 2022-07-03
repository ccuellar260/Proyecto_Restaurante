<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\BitacoraCliente;
use Illuminate\Support\Facades\Auth;

class BClienteEditListener
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
        $cliente->accion = 'editar';
        $cliente->fecha = now();
        $cliente->hora = now();
        $cliente->ci = $event->bclienteedit->ci;
        $cliente->nombre_completo = $event->bclienteedit->nombre_completo;
        $cliente->telefono = $event->bclienteedit->telefono;
        $cliente->NIT = $event->bclienteedit->NIT;
        $cliente->save();
    }
}
