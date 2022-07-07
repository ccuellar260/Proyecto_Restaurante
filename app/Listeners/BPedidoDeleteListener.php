<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\BitacoraPedido;
use Illuminate\Support\Facades\Auth;

class BPedidoDeleteListener
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
        $pedido = new BitacoraPedido();
        $pedido->user = Auth::user()->nombre_usuario;
        $pedido->accion = 'eliminar';
        $pedido->fecha_bpedido = now();
        $pedido->hora_bpedido = now();
        $pedido->id_pedido = $event->bpedidocreate->id_pedido;
        $pedido->nro_mesa = $event->bpedidocreate->nro_mesa;
        $pedido->ci_empleado = $event->bpedidocreate->ci_empleado;
        $pedido->estado = $event->bpedidocreate->estado;
        $pedido->fecha = $event->bpedidocreate->fecha;
        $pedido->hora= $event->bpedidocreate->hora;
        $pedido->save();
    }
}
