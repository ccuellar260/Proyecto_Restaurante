<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\DetallePedido;
use App\Models\Pedido;

class PrecioTotalListener
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
        $detalle = DetallePedido::where('id_pedido',$event->pedido)->get();
        $suma = 0;
        foreach ($detalle as $d) {
            $suma = $suma + $d->precio;
        }
        $pedido = Pedido::where('id_pedido',$event->pedido)->first();
        $pedido->precio_total = $suma;
        $pedido->save();
    }
}
