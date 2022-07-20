<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\BitacoraPedido;
use Illuminate\Support\Facades\Auth;

class BPedidoEditListener
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
        $pedido->accion = 'editar';
        $pedido->fecha_bpedido = now();
        $pedido->hora_bpedido = now();
        $pedido->id_pedido = $event->bpedidoedit->id_pedido;
        $pedido->nro_mesa = $event->bpedidoedit->nro_mesa;
        $pedido->ci_empleado = $event->bpedidoedit->ci_empleado;
        $pedido->estado = $event->bpedidoedit->estado;
        $pedido->fecha = $event->bpedidoedit->fecha;
        $pedido->hora= $event->bpedidoedit->hora;
        $pedido->precio_total= $event->bpedidoedit->precio_total;
        $pedido->save();
    }
}
